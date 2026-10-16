<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
 public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        // 1. Ambil kategori HANYA dari lowongan yang AKTIF
        $categories = Job::where('is_active', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->pluck('category');

        // 2. Query lowongan HANYA yang AKTIF
        $jobs = Job::query()
            ->where('is_active', true) // Filter wajib untuk menyembunyikan lowongan non-aktif
            ->when($category && $category !== 'Semua', function ($query, $category) {
                return $query->where('category', $category);
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('department', 'like', "%{$search}%")
                      ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('jobs.index', compact('jobs', 'categories', 'search', 'category'));
    }
public function show($id)
{
    $job = Job::where('is_active', true)->findOrFail($id);

    $requirements = is_array($job->requirements) 
        ? $job->requirements 
        : json_decode($job->requirements ?? '[]', true);

    // Cek apakah pelamar yang sedang login sudah pernah melamar lowongan ini
    $userApplication = null;
    if (Auth::check()) {
        $userApplication = Application::where('user_id', Auth::id())
            ->where('job_id', $job->id)
            ->first();
    }

    return view('jobs.show', compact('job', 'requirements', 'userApplication'));
}
    public function showApplication($id)
{
    // Mengambil data lamaran milik pelamar yang sedang login
    $application = Application::with('job')
        ->where('user_id', Auth::id())
        ->findOrFail($id);

    // Mengolah berkas lampiran (JSON / Array)
    $attachments = is_array($application->attachments) 
        ? $application->attachments 
        : json_decode($application->attachments ?? '[]', true);

    return view('jobs.application_detail', compact('application', 'attachments'));
}

    public function myApplications()
{
    $applications = Application::with('job')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('jobs.my_applications', compact('applications'));
}

    public function apply(Request $request, $id)
{
    $job = Job::findOrFail($id);

    // 1. Cek apakah pelamar sudah pernah melamar posisi ini
    $existing = Application::where('user_id', Auth::id())
        ->where('job_id', $id)
        ->exists();

    if ($existing) {
        return back()->with('error', 'Anda sudah pernah mengirimkan lamaran untuk posisi pekerjaan ini.');
    }

    // 2. Validasi berkas lampiran
    $request->validate([
        'attachments' => ['required', 'array'],
        'attachments.*' => ['required', 'file', 'mimes:pdf,doc,docx,jpg,png', 'max:5048'],
    ]);

    // 3. Simpan berkas dokumen ke folder storage
    $attachmentPaths = [];
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $key => $file) {
            $path = $file->store('applications', 'public');
            $attachmentPaths[$key] = $path;
        }
    }

    // 4. Simpan data lamaran ke database
    Application::create([
        'user_id' => Auth::id(),
        'job_id' => $job->id,
        'attachments' => $attachmentPaths,
        'status' => 'pending',
    ]);

    // 5. Kembalikan pelamar ke halaman lowongan beserta notifikasi sukses
    return back()->with('success', 'Lamaran Anda berhasil dikirimkan!');
}
}