@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <!-- Tombol Kembali -->
    <a href="{{ route('jobs.index') }}" class="inline-flex items-center text-sm text-blue-600 font-semibold hover:underline mb-6">
        &larr; Kembali ke Daftar Lowongan
    </a>

    <!-- Card Detail Pekerjaan -->
    <div class="bg-white rounded-2xl border border-gray-200/80 shadow-sm overflow-hidden mb-8">
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">{{ $job->title }}</h1>
            <p class="text-xs text-gray-400">Diterbitkan {{ $job->created_at->diffForHumans() }}</p>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-xl text-sm font-medium">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <!-- Deskripsi -->
            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Deskripsi Pekerjaan</h3>
                <div class="prose max-w-none text-gray-600 text-sm leading-relaxed">{!! $job->description !!}</div>
            </div>

            <!-- Persyaratan -->
            @if($job->requirements)
                <div class="pt-4 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Persyaratan</h3>
                    <div class="prose max-w-none text-gray-600 text-sm leading-relaxed">{!! $job->requirements !!}</div>
                </div>
            @endif
        </div>
    </div>

   <!-- KARTU FORM / STATUS LAMARAN -->
<div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-100 shadow-sm mt-6">

    @if($userApplication)
        <!-- TAMPILAN JIKA PELAMAR SUDAH PERNAH MELAMAR -->
        <div class="text-center py-6">
            <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center font-bold text-2xl mx-auto mb-4 border border-emerald-100">
                ✅
            </div>
            <h3 class="text-xl font-extrabold text-slate-900 mb-2">
                Anda Sudah Melamar Posisi Ini
            </h3>
            <p class="text-xs text-slate-500 max-w-md mx-auto mb-6 leading-relaxed">
                Lamaran Anda telah kami terima pada tanggal 
                <strong>{{ $userApplication->created_at->translatedFormat('d F Y, H:i') }} WIB</strong>. 
                Anda tidak perlu mengirimkan lamaran ulang.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-3">
                <a href="{{ url('/my-applications/' . $userApplication->id) }}" class="bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold py-3 px-6 rounded-xl text-xs transition-all shadow-md shadow-sky-500/20">
                    Lihat Berkas &amp; Status Lamaran &rarr;
                </a>
                <a href="{{ url('/') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 px-6 rounded-xl text-xs transition-all">
                    Cari Lowongan Lain
                </a>
            </div>
        </div>

    @else
        <!-- TAMPILAN FORM JIKA BELUM PERNAH MELAMAR -->
        <h3 class="text-lg font-bold text-slate-900 mb-1">
            Kirim Lamaran Pekerjaan
        </h3>
        <p class="text-xs text-slate-500 mb-6">
            Lengkapi seluruh berkas dokumen yang dibutuhkan di bawah ini.
        </p>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-xs text-emerald-700 font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl text-xs text-rose-700 font-medium">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            @if(!empty($requirements))
                @foreach($requirements as $req)
                    <div class="bg-slate-50/70 p-4 rounded-2xl border border-slate-100">
                        <label class="block text-xs font-semibold text-slate-700 mb-2 capitalize">
                            Unggah {{ str_replace('_', ' ', $req) }} <span class="text-rose-500">*</span>
                        </label>
                        <input type="file" name="attachments[{{ $req }}]" required
                               class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#2596be] file:text-white hover:file:bg-[#1d7da0] transition-all cursor-pointer">
                    </div>
                @endforeach
            @else
                <div class="bg-slate-50/70 p-4 rounded-2xl border border-slate-100">
                    <label class="block text-xs font-semibold text-slate-700 mb-2">
                        Unggah Berkas CV / Resume <span class="text-rose-500">*</span>
                    </label>
                    <input type="file" name="attachments[cv]" required
                           class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#2596be] file:text-white hover:file:bg-[#1d7da0] transition-all cursor-pointer">
                </div>
            @endif

            <button type="submit" class="w-full bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold py-3.5 px-6 rounded-xl text-xs transition-all shadow-md shadow-sky-500/20 flex items-center justify-center gap-2 mt-4">
                Kirim Lamaran Sekarang <span>&rarr;</span>
            </button>
        </form>
    @endif

</div>
</div>
@endsection