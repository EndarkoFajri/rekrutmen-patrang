@extends('layouts.app')

@section('content')
<div class="py-10 px-4 max-w-6xl mx-auto">
    
    <!-- HEADER HALAMAN -->
    <div class="mb-8">
        <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block mb-1">
            PORTAL PELAMAR
        </span>
        <h1 class="text-3xl font-extrabold text-[#0f2942] tracking-tight">
            Status Lamaran Saya
        </h1>
        <p class="text-xs text-slate-500 mt-1">
            Pantau perkembangan dan status riwayat lamaran kerja yang telah Anda kirimkan.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-xs text-emerald-700 font-medium flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- DAFTAR LAMARAN -->
    @if($applications->count() > 0)
        <div class="space-y-4">
            @foreach($applications as $application)
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6 hover:border-slate-200 transition-all">
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-sky-50 text-[#2596be] rounded-2xl flex items-center justify-center font-bold text-lg shrink-0">
                            💼
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-900 text-base mb-1">
                                {{ $application->job->title ?? 'Posisi Tidak Ditemukan' }}
                            </h2>
                            <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                <span class="flex items-center gap-1">
                                    🏢 {{ $application->job->department ?? 'Universitas Patrang' }}
                                </span>
                                <span>&bull;</span>
                                <span class="flex items-center gap-1">
                                    📅 Dikirim: {{ $application->created_at->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- BADGE STATUS & DETAIL -->
                    <div class="flex items-center justify-between md:justify-end gap-4 border-t md:border-t-0 pt-4 md:pt-0 border-slate-100">
                        <div>
                            @php
                                $status = strtolower($application->status ?? 'pending');
                            @endphp

                            @if($status === 'accepted' || $status === 'diterima')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    Diterima
                                </span>
                            @elseif($status === 'rejected' || $status === 'ditolak')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                    <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                                    Ditolak
                                </span>
                            @elseif($status === 'interview' || $status === 'wawancara')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                    Tahap Wawancara
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-sky-50 text-[#2596be] border border-sky-200">
                                    <span class="w-2 h-2 rounded-full bg-[#2596be] animate-pulse"></span>
                                    Seleksi Administrasi
                                </span>
                            @endif
                        </div>

                      <a href="{{ route('my-applications.show', $application->id) }}" class="text-xs font-bold text-white bg-[#2596be] hover:bg-[#1d7da0] px-4 py-2.5 rounded-xl transition-all shadow-md shadow-sky-500/20">
        Lihat Data Diri &amp; Berkas &rarr;
    </a>
                    </div>

                </div>
            @endforeach
        </div>
    @else
        <!-- TAMPILAN JIKA BELUM ADA LAMARAN -->
        <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 shadow-sm max-w-lg mx-auto my-12">
            <div class="w-16 h-16 bg-sky-50 text-[#2596be] rounded-2xl flex items-center justify-center font-bold text-2xl mx-auto mb-4">
                📂
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-2">Belum Ada Lamaran</h3>
            <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                Anda belum pernah mengirimkan lamaran pekerjaan di Universitas Patrang. Temukan posisi yang sesuai dan mulai kirim lamaran Anda.
            </p>
            <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold py-3 px-6 rounded-xl text-xs transition-all shadow-md shadow-sky-500/20">
                Cari Lowongan Kerja <span>&rarr;</span>
            </a>
        </div>
    @endif

</div>
@endsection