<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Patrang - Portal Karier & Rekrutmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f2f7fb] text-slate-800 min-h-screen flex flex-col antialiased">

    <!-- FLOATING NAVBAR -->
    <div class="pt-6 px-4 max-w-7xl mx-auto w-full">
        <header class="bg-white rounded-2xl shadow-sm border border-slate-100/80 px-6 py-3.5 flex items-center justify-between">
            
            <!-- Logo Universitas Patrang -->
            <a href="{{ route('jobs.index') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#2596be] text-white rounded-xl flex items-center justify-center shadow-md shadow-sky-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="font-bold text-slate-900 leading-tight text-base">Universitas Patrang</h1>
                    <p class="text-[10px] font-bold tracking-wider text-slate-400 uppercase">PORTAL KARIER & REKRUTMEN</p>
                </div>
            </a>

            <!-- Menu Navigasi Tengah -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="{{ route('jobs.index') }}" class="hover:text-[#2596be] transition-colors">Lowongan</a>
                <a href="#" class="hover:text-[#2596be] transition-colors">Kehidupan Kampus</a>
                <a href="#" class="hover:text-[#2596be] transition-colors">Tahapan Seleksi</a>
                 <!-- Menu Status Lamaran (Hanya muncul jika akun sudah login) -->
                @auth
                    <a href="{{ route('my_applications') }}" class="hover:text-[#2596be] transition-colors flex items-center gap-1.5 {{ request()->routeIs('my-applications') ? 'text-[#2596be] font-bold' : '' }}">
                        📋 Status Lamaran
                    </a>
                @endauth
            </nav>
        
            <!-- Tombol Aksi Kanan -->
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-xs font-bold text-slate-700 bg-slate-100 px-3.5 py-2 rounded-xl">
                        👤 {{ auth()->user()->name }}
                    </span>
                    
                    <!-- Form Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-bold px-3.5 py-2 rounded-xl transition-all">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 hover:text-[#2596be] px-3 py-2 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#1e3a5f] hover:bg-[#152a45] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all inline-flex items-center gap-2 shadow-sm">
                        Daftar <span>&rarr;</span>
                    </a>
                @endauth
            </div>
        </header>
    </div>

    <!-- KONTEN DINAMIS -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-100 py-6 mt-0">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-[#2596be] text-white rounded-lg flex items-center justify-center font-bold text-xs">
                    🎓
                </div>
                <span class="font-bold text-slate-700">Universitas Patrang</span>
            </div>

            <div>
                &copy; {{ date('Y') }} Universitas Patrang. Seluruh hak cipta dilindungi undang-undang.
            </div>

            <div class="flex items-center gap-4 text-slate-500 font-medium">
                <a href="#" class="hover:text-[#2596be] transition-colors">Privasi</a>
                <a href="#" class="hover:text-[#2596be] transition-colors">FAQ</a>
                <a href="#" class="hover:text-[#2596be] transition-colors">Aksesibilitas</a>
            </div>
        </div>
    </footer>
</body>
</html>