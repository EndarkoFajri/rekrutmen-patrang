@extends('layouts.app')

@section('content')
<!-- HERO SECTION (Tampilan Persis Figma) -->
<section class="max-w-7xl mx-auto px-6 pt-12 pb-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        
        <!-- Kolom Kiri: Teks & Aksi -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Badge Posisi Baru Dinamis -->
            <div class="inline-flex items-center gap-2 bg-sky-100/70 border border-sky-200/50 px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#2596be]">
                <span class="w-2 h-2 rounded-full bg-[#2596be] animate-pulse"></span>
                {{ $jobs->count() }} posisi baru tersedia
            </div>

            <!-- Headline Utama -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-[#0f2942] tracking-tight leading-[1.15]">
                Bertumbuh bersama para <span class="text-[#2596be]">pemikir masa depan.</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-slate-500 text-base sm:text-lg leading-relaxed max-w-xl">
                Bergabunglah dengan komunitas akademik yang mendorong ilmu pengetahuan, inovasi, dan perubahan nyata bagi Indonesia.
            </p>

            <!-- Tombol CTA -->
            <div class="pt-2 flex flex-wrap items-center gap-4">
                <a href="#lowongan" class="bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold px-7 py-3.5 rounded-2xl text-sm shadow-lg shadow-sky-500/25 transition-all inline-flex items-center gap-2">
                    Cari lowongan <span>&rarr;</span>
                </a>
                <a href="#" class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-bold px-7 py-3.5 rounded-2xl text-sm transition-all shadow-sm">
                    Kenali kami
                </a>
            </div>
        </div>

        <!-- Kolom Kanan: Card Gambar & Badge Persentase -->
        <div class="lg:col-span-5 relative">
            <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white bg-slate-200">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1000&auto=format&fit=crop" 
                     alt="Kegiatan Civitas Akademika" 
                     class="w-full h-[420px] object-cover">

                <!-- Overlay Gradient & Kutipan di Atas Gambar -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent flex flex-col justify-end p-6 text-white">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-sky-300 mb-1">Cerita Civitas</span>
                    
                </div>
            </div>

            <!-- Floating Badge Persentase (Kiri Bawah Gambar) -->
            <div class="absolute -bottom-6 -left-6 bg-white/95 backdrop-blur-md p-5 rounded-2xl shadow-xl border border-slate-100 max-w-[200px]">
                <h3 class="text-3xl font-extrabold text-[#2596be]">94%</h3>
                <p class="text-xs font-semibold text-slate-500 mt-1 leading-tight">
                    pegawai bangga berkarya di sini
                </p>
            </div>
        </div>

    </div>
</section>

<!-- SECTION: MENGAPA UNIVERSITAS CAKRAWALA (BACKGROUND PUTIH) -->
<section class="bg-white py-16 my-8">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <!-- Tag & Judul Utama -->
        <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block mb-2">
            Mengapa Universitas Patrang
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f2942] tracking-tight mb-3">
            Lebih dari tempat bekerja
        </h2>
        <p class="text-slate-500 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed mb-12">
            Lingkungan akademik yang memberi ruang untuk mengajar, meneliti, melayani, dan terus berkembang.
        </p>

        <!-- Grid 3 Kartu Keunggulan -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            
            <!-- Kartu 01 -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200/70 shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
                <span class="absolute top-8 right-8 text-xs font-bold text-slate-300">01</span>
                <div>
                    <div class="w-12 h-12 bg-sky-100/70 text-[#2596be] rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon Topi Toga -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0f2942] mb-2">
                        Budaya akademik unggul
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Akses pengembangan kompetensi, studi lanjut, dan forum ilmiah untuk memperluas keahlianmu.
                    </p>
                </div>
            </div>

            <!-- Kartu 02 -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200/70 shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
                <span class="absolute top-8 right-8 text-xs font-bold text-slate-300">02</span>
                <div>
                    <div class="w-12 h-12 bg-sky-100/70 text-[#2596be] rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon Kolaborasi / Komunitas -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0f2942] mb-2">
                        Komunitas kolaboratif
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Bekerja bersama dosen, peneliti, tenaga kependidikan, dan mahasiswa lintas disiplin.
                    </p>
                </div>
            </div>

            <!-- Kartu 03 -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200/70 shadow-sm relative flex flex-col justify-between hover:shadow-md transition-shadow">
                <span class="absolute top-8 right-8 text-xs font-bold text-slate-300">03</span>
                <div>
                    <div class="w-12 h-12 bg-sky-100/70 text-[#2596be] rounded-2xl flex items-center justify-center mb-6">
                        <!-- Icon Perisai Dampak -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#0f2942] mb-2">
                        Dampak yang meluas
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Kontribusimu ikut membentuk pembelajar dan menghadirkan solusi untuk masyarakat.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION: PELUANG KARIER (Persis Desain Figma) -->
<section id="lowongan" class="max-w-7xl mx-auto px-6 py-16">
    <!-- Header Section & Bar Pencarian -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
        <div>
            <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block mb-2">
                Peluang Karier
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f2942] tracking-tight">
                Temukan peranmu di kampus
            </h2>
        </div>
    </div>

   <!-- GRID KARTU LOWONGAN -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($jobs as $job)
        <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md hover:border-slate-200 transition-all">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 bg-sky-50 text-[#2596be] rounded-2xl flex items-center justify-center font-bold">
                        💼
                    </div>
                    <span class="px-3 py-1 bg-sky-50 text-[#2596be] font-extrabold text-[10px] tracking-wider rounded-full uppercase">
                        {{ $job->category ?? 'UMUM' }}
                    </span>
                </div>
                <h3 class="font-extrabold text-slate-900 text-lg mb-1">
                    {{ $job->title }}
                </h3>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <div class="text-[11px] text-slate-500 space-y-1 font-medium">
                    <div class="flex items-center gap-1.5">
                        📍 {{ $job->location ?? 'Bandung - On-site' }}
                    </div>
                    <div class="flex items-center gap-1.5">
                        💼 {{ $job->type ?? 'Penuh Waktu' }}
                    </div>
                </div>
                <a href="{{ route('jobs.show', $job->id) }}" class="w-9 h-9 bg-sky-50 text-[#2596be] rounded-full flex items-center justify-center hover:bg-[#2596be] hover:text-white transition-all">
                    &rarr;
                </a>
            </div>
        </div>
    @empty
        <!-- Tampilan jika tidak ada lowongan pada kategori yang diklik -->
        <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-sky-50 text-[#2596be] rounded-2xl flex items-center justify-center font-bold text-xl mx-auto mb-3">
                📂
            </div>
            <p class="text-sm font-bold text-slate-800 mb-1">Belum ada lowongan untuk kategori ini</p>
            <p class="text-xs text-slate-400">Pilih kategori lain atau klik "Semua" untuk melihat seluruh lowongan.</p>
        </div>
    @endforelse
</div>

    <!-- Tombol Lihat Semua Posisi -->
    <div class="mt-12 text-center">
        <button class="bg-white hover:bg-slate-50 text-slate-700 font-bold border border-slate-200/80 px-8 py-3.5 rounded-2xl text-xs transition-all shadow-sm">
            Lihat semua posisi
        </button>
    </div>
</section>


<!-- SECTION: PROSES REKRUTMEN & BANNER CTA (BACKGROUND PUTIH & LEBAR PAS) -->
<section class="bg-white py-16 border-t border-slate-100">
    <div class="max-w-6xl mx-auto px-6">
        
        <!-- Grid Proses Rekrutmen -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Kolom Kiri: Judul & Keterangan -->
            <div class="lg:col-span-5 space-y-4">
                <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block">
                    PROSES REKRUTMEN
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#0f2942] tracking-tight leading-tight">
                    Sederhana, jelas, dan transparan.
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
                    Kami mencari talenta berdasarkan kompetensi, integritas, dan semangat belajar. Seluruh proses seleksi tidak dipungut biaya.
                </p>
            </div>

            <!-- Kolom Kanan: 4 Tahapan (Cards 01 - 04) -->
            <div class="lg:col-span-7 space-y-3">
                
                <!-- Langkah 01 -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                    <span class="w-10 h-10 rounded-xl bg-sky-50 text-[#2596be] font-bold text-xs flex items-center justify-center shrink-0">
                        01
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-[#0f2942]">Kirim lamaran</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Pilih posisi dan lengkapi profilmu secara daring.</p>
                    </div>
                </div>

                <!-- Langkah 02 -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                    <span class="w-10 h-10 rounded-xl bg-sky-50 text-[#2596be] font-bold text-xs flex items-center justify-center shrink-0">
                        02
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-[#0f2942]">Seleksi administrasi</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Tim kami meninjau kualifikasi dan kesesuaian pengalamanmu.</p>
                    </div>
                </div>

                <!-- Langkah 03 -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                    <span class="w-10 h-10 rounded-xl bg-sky-50 text-[#2596be] font-bold text-xs flex items-center justify-center shrink-0">
                        03
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-[#0f2942]">Asesmen & wawancara</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Untuk posisi akademik, proses dapat mencakup microteaching.</p>
                    </div>
                </div>

                <!-- Langkah 04 -->
                <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/70 shadow-sm hover:shadow-md transition-shadow flex items-center gap-4">
                    <span class="w-10 h-10 rounded-xl bg-sky-50 text-[#2596be] font-bold text-xs flex items-center justify-center shrink-0">
                        04
                    </span>
                    <div>
                        <h3 class="text-sm font-bold text-[#0f2942]">Bergabung di kampus</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Terima penawaran dan mulai perjalanan bersama civitas akademika.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- BANNER CTA: MASA DEPAN MENUNGGUMU (Ukuran Pas & Ringkas) -->
        <div class="mt-8 pb-6">
            <div class="bg-[#12395b] rounded-[2rem] p-8 sm:p-10 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6 shadow-lg">
                
                <!-- Lingkaran Ornamen Latar Belakang -->
                <div class="absolute -right-8 -bottom-8 w-56 h-56 bg-sky-400/10 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute right-36 -top-10 w-40 h-40 bg-blue-400/10 rounded-full blur-xl pointer-events-none"></div>

                <!-- Teks Banner -->
                <div class="relative z-10 space-y-2 text-center md:text-left max-w-xl">
                    <span class="text-[10px] font-bold tracking-widest text-sky-300 uppercase block">
                        MASA DEPAN MENUNGGUMU
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight leading-snug">
                        Mari membentuk masa depan pendidikan.
                    </h2>
                    <p class="text-xs text-sky-100/80 font-normal">
                        Ambil langkah pertamamu untuk berkarya bersama komunitas akademik kami.
                    </p>
                </div>

                <!-- Tombol CTA -->
                <div class="relative z-10 shrink-0">
                    <a href="#lowongan" class="bg-white hover:bg-slate-100 text-[#0f2942] font-bold px-6 py-3 rounded-xl text-xs transition-all shadow-md inline-flex items-center gap-2">
                        Temukan peluangmu <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection