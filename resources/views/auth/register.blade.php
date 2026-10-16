<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelamar - Universitas Patrang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen flex text-slate-800 antialiased">

    <!-- KIRI: FORM REGISTER -->
    <div class="w-full lg:w-1/2 flex flex-col justify-between p-8 sm:p-12 min-h-screen">
        <div>
            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('jobs.index') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#2596be] text-white rounded-xl flex items-center justify-center font-bold shadow-md shadow-sky-500/20">
                        🎓
                    </div>
                    <div>
                        <h1 class="font-bold text-slate-900 leading-tight text-sm">Universitas Cakrawala</h1>
                        <p class="text-[9px] font-bold tracking-wider text-slate-400 uppercase">PORTAL KARIER & REKRUTMEN</p>
                    </div>
                </a>
            </div>

            <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-[#2596be] transition-colors mb-6">
                &larr; Kembali ke beranda
            </a>

            <div class="max-w-md mx-auto lg:mx-0 my-auto py-6">
                <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block mb-1">
                    PENDAFTARAN AKUN
                </span>
                <h2 class="text-3xl font-extrabold text-[#0f2942] tracking-tight mb-2">
                    Buat akun pelamar baru.
                </h2>
                <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                    Lengkapi data dirimu untuk mulai melamar berbagai posisi kerja di Universitas Cakrawala.
                </p>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl text-xs text-rose-700 font-medium">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Ahmad Fauzi" 
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 px-4 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" 
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 px-4 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Kata sandi</label>
                        <input type="password" name="password" required placeholder="Minimal 8 karakter" 
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 px-4 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Konfirmasi kata sandi</label>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi" 
                               class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 px-4 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                    </div>

                    <button type="submit" class="w-full bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold py-3 px-6 rounded-xl text-xs transition-all shadow-md shadow-sky-500/20 flex items-center justify-center gap-2 mt-2">
                        Daftar Akun Sekarang <span>&rarr;</span>
                    </button>
                </form>

                <div class="mt-6 text-center text-xs text-slate-500">
                    Sudah memiliki akun? <a href="{{ route('login') }}" class="text-[#2596be] font-bold hover:underline">Masuk di sini</a>
                </div>
            </div>
        </div>

        <div class="text-[11px] text-slate-400 mt-8">
            &copy; {{ date('Y') }} Universitas Cakrawala &middot; Pusat Bantuan
        </div>
    </div>

    <!-- KANAN: GAMBAR DEKORATIF -->
    <div class="hidden lg:block lg:w-1/2 p-6">
        <div class="relative h-full w-full rounded-[2.5rem] overflow-hidden shadow-2xl bg-slate-900">
            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1200&auto=format&fit=crop" 
                 alt="Civitas Akademika" 
                 class="absolute inset-0 w-full h-full object-cover opacity-65">
            
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f2942]/90 via-[#0f2942]/30 to-transparent flex flex-col justify-end p-12 text-white">
                <blockquote class="text-2xl font-extrabold leading-snug mb-4 max-w-lg tracking-tight">
                    "Bergabunglah bersama kami dan wujudkan potensi terbaikmu dalam dunia pendidikan."
                </blockquote>
                <p class="text-xs text-sky-200 font-semibold">Universitas Patrang</p>
            </div>
        </div>
    </div>
</body>
</html>