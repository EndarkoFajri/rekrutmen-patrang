@extends('layouts.app')

@section('content')
<div class="py-10 px-4 max-w-4xl mx-auto">
    
    <!-- NAVIGATION & HEADER -->
    <a href="{{ url('/my-applications') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-[#2596be] transition-colors mb-6">
        &larr; Kembali ke daftar lamaran
    </a>
@if($application->interview_date)
<div class="p-4 mb-6 border-l-4 border-blue-500 rounded-r-lg bg-blue-50 shadow-sm">
    <h4 class="flex items-center text-lg font-bold text-blue-900">
        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        Jadwal Wawancara & Seleksi
    </h4>
    <div class="mt-3 space-y-1.5 text-sm text-blue-800">
        <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($application->interview_date)->translatedFormat('l, d F Y - H:i') }} WIB</p>
        <p><strong>Lokasi / Link:</strong> {{ $application->interview_location ?? '-' }}</p>
        @if($application->interview_notes)
            <p><strong>Catatan:</strong> {{ $application->interview_notes }}</p>
        @endif
    </div>
</div>
@endif
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
            <div>
                <span class="text-[10px] font-bold tracking-widest text-[#2596be] uppercase block mb-1">
                    RINCIAN DATA LAMARAN
                </span>
                <h1 class="text-2xl font-extrabold text-[#0f2942]">
                    {{ $application->job->title ?? 'Posisi Pekerjaan' }}
                </h1>
                <p class="text-xs text-slate-400 mt-1">
                    Dikirim pada {{ $application->created_at->translatedFormat('d F Y, H:i') }} WIB
                </p>
            </div>

            <div>
                @php
                    $status = strtolower($application->status ?? 'pending');
                @endphp
                @if($status === 'accepted' || $status === 'diterima')
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        🟢 Diterima
                    </span>
                @elseif($status === 'rejected' || $status === 'ditolak')
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                        🔴 Ditolak
                    </span>
                @elseif($status === 'interview' || $status === 'wawancara')
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                        🟡 Tahap Wawancara
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full text-xs font-bold bg-sky-50 text-[#2596be] border border-sky-200">
                        🔵 Seleksi Administrasi
                    </span>
                @endif
            </div>
        </div>

        <!-- INFORMASI DATA DIRI PELAMAR -->
        <div class="py-6 border-b border-slate-100">
            <h2 class="text-xs font-bold tracking-wider text-slate-400 uppercase mb-4">
                Informasi Pelamar
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div class="bg-slate-50/70 p-4 rounded-2xl border border-slate-100">
                    <span class="text-slate-400 block mb-1 font-medium">Nama Lengkap</span>
                    <strong class="text-slate-800 text-sm font-bold">{{ auth()->user()->name }}</strong>
                </div>
                <div class="bg-slate-50/70 p-4 rounded-2xl border border-slate-100">
                    <span class="text-slate-400 block mb-1 font-medium">Alamat Email</span>
                    <strong class="text-slate-800 text-sm font-bold">{{ auth()->user()->email }}</strong>
                </div>
            </div>
        </div>

        <!-- BERKAS & DOKUMEN YANG DIUNGGAH -->
        <div class="pt-6">
            <h2 class="text-xs font-bold tracking-wider text-slate-400 uppercase mb-4">
                Dokumen & Berkas Persyaratan
            </h2>

            @if(!empty($attachments))
                <div class="space-y-3">
                    @foreach($attachments as $key => $filePath)
                        <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-200/80 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-lg shadow-sm border border-slate-100">
                                    📄
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-800 capitalize">
                                        {{ str_replace('_', ' ', $key) }}
                                    </p>
                                    <p class="text-[10px] text-slate-400">Dokumen PDF/Berkas Terlampir</p>
                                </div>
                            </div>

                            <a href="{{ Storage::url($filePath) }}" target="_blank" class="inline-flex items-center gap-1.5 bg-white hover:bg-sky-50 text-[#2596be] border border-sky-200 font-bold px-4 py-2 rounded-xl text-xs transition-all shadow-sm">
                                👁 Lihat Berkas
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xs text-slate-400 italic">Tidak ada berkas tambahan terlampir.</p>
            @endif
        </div>
    </div>

</div>
@endsection