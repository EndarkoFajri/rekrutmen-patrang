<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Universitas Patrang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen flex text-slate-800 antialiased">

    <!-- KIRI: FORM LOGIN -->
    <div class="w-full lg:w-1/2 flex flex-col justify-between p-8 sm:p-12 min-h-screen">
        
        <div>
            <!-- Header Logo -->
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

            <!-- Tombol Kembali -->
            <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-[#2596be] transition-colors mb-8">
                &larr; Kembali ke beranda
            </a>

            <!-- Konten Form -->
            <div class="max-w-md mx-auto lg:mx-0 my-auto py-16">
                <span class="text-[11px] font-bold tracking-widest text-[#2596be] uppercase block mb-1">
                    PORTAL PELAMAR
                </span>
                <h2 class="text-3xl font-extrabold text-[#0f2942] tracking-tight mb-2">
                    Selamat datang kembali.
                </h2>
                <p class="text-xs text-slate-500 mb-8 leading-relaxed">
                    Masuk untuk melanjutkan proses lamaran dan melihat status seleksimu.
                </p>

                <!-- Pesan Error Validasi -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-2xl text-xs text-rose-700 font-medium">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Input Email -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Alamat email</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" 
                                   class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 pl-10 pr-4 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Kata sandi</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi" 
                                   class="w-full bg-slate-50/60 border border-slate-200 rounded-xl py-3 pl-10 pr-10 text-xs font-medium text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#2596be] focus:bg-white transition-all">
                            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                👁
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Lupa Password -->
                    <div class="flex items-center justify-between text-xs pt-1">
                        <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                            <input type="checkbox" name="remember" class="rounded border-slate-300 text-[#2596be] focus:ring-[#2596be]">
                            Ingat saya
                        </label>
                        <a href="#" class="text-[#2596be] font-semibold hover:underline">Lupa kata sandi?</a>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="w-full bg-[#2596be] hover:bg-[#1d7da0] text-white font-bold py-3 px-6 rounded-xl text-xs transition-all shadow-md shadow-sky-500/20 flex items-center justify-center gap-2 mt-2">
                        Masuk ke akun <span>&rarr;</span>
                    </button>
                </form>

                <div class="mt-8 text-center text-xs text-slate-500">
                    Belum memiliki akun? <a href="{{ route('register') }}" class="text-[#2596be] font-bold hover:underline">Daftar sebagai pelamar</a>
                </div>
            </div>
        </div>

        <!-- Footer Kiri -->
        <div class="text-[11px] text-slate-400 mt-8">
            &copy; {{ date('Y') }} Universitas Cakrawala &middot; Pusat Bantuan
        </div>
    </div>

    <!-- KANAN: KARTU GAMBAR & KUTIPAN (Persis Figma) -->
    <div class="hidden lg:block lg:w-1/2 p-6">
        <div class="relative h-full w-full rounded-[2.5rem] overflow-hidden shadow-2xl bg-slate-900">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200&auto=format&fit=crop" 
                 alt="Gedung Universitas" 
                 class="absolute inset-0 w-full h-full object-cover opacity-65">
            
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f2942]/90 via-[#0f2942]/30 to-transparent flex flex-col justify-end p-12 text-white">
                <span class="inline-block px-3.5 py-1.5 bg-white/20 backdrop-blur-md rounded-full text-[11px] font-bold text-sky-200 mb-4 w-max border border-white/20">
                    Karier yang memberi arti
                </span>
                
                <blockquote class="text-2xl sm:text-3xl font-extrabold leading-snug mb-8 max-w-lg tracking-tight">
                    "Di kampus ini, setiap gagasan memiliki ruang untuk tumbuh dan memberi dampak."
                </blockquote>

                <div class="pt-4 border-t border-white/10">
                    <p class="font-bold text-sm text-white">Dr. Ratih Prameswari</p>
                    <p class="text-xs text-slate-300 mt-0.5">Ketua Pusat Riset dan Inovasi</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>