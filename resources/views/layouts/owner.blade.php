<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Owner Dashboard | BT Industrial Automation')</title>
    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen antialiased">

    <!-- Top Mobile Header -->
    <header class="bg-brand-blue-dark border-b border-brand-blue-light/50 lg:hidden sticky top-0 z-50">
        <div class="px-4 py-3 flex items-center justify-between">
            <a href="{{ route('owner.dashboard') }}" class="flex items-center gap-2">
                <img src="{{ asset('logo-monogram.png') }}" alt="BT Logo" class="w-8 h-8 object-contain">
                <span class="font-serif font-bold text-sm tracking-wide text-white">Owner Portal</span>
            </a>
            <button onclick="toggleSidebar()" class="p-2 text-slate-400 hover:text-brand-gold focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </header>

    <!-- Sidebar Navigation -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-brand-blue-dark border-r border-brand-blue-light/40 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col justify-between pt-16 lg:pt-0">
        <div class="p-6">
            <div class="hidden lg:flex items-center gap-3 mb-8">
                <img src="{{ asset('logo-monogram.png') }}" alt="BT Logo" class="w-10 h-10 object-contain">
                <div class="flex flex-col">
                    <h2 class="font-serif font-bold text-sm tracking-wider text-white">BT INDUSTRIAL</h2>
                    <span class="text-[8px] font-sans tracking-[0.15em] text-slate-400 font-semibold uppercase">Owner Admin</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1">
                <a href="{{ route('owner.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.dashboard') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                    </svg>
                    Dashboard
                </a>
                
                <a href="{{ route('owner.products.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.products.*') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Products
                </a>

                <a href="{{ route('owner.categories.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.categories.*') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Categories
                </a>

                <a href="{{ route('owner.testimonials.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.testimonials.*') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Testimonials
                </a>

                <a href="{{ route('owner.inquiries.index') }}" 
                   class="flex items-center justify-between px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.inquiries.*') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Inquiries</span>
                    </div>
                    @php
                        $unreadInquiriesCount = \App\Models\Inquiry::where('is_read', false)->count();
                    @endphp
                    @if($unreadInquiriesCount > 0)
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full {{ request()->routeIs('owner.inquiries.*') ? 'bg-slate-950 text-brand-gold' : 'bg-brand-gold text-slate-950' }}">
                            {{ $unreadInquiriesCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('owner.settings') }}" 
                   class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl transition-all duration-300 {{ request()->routeIs('owner.settings') ? 'text-slate-950 bg-brand-gold font-bold shadow-lg shadow-brand-gold/10' : 'text-slate-400 hover:bg-brand-blue-light/30 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Security Settings
                </a>
            </nav>
        </div>

        <!-- Bottom Actions -->
        <div class="p-6 border-t border-brand-blue-light/20 bg-brand-blue-dark/50">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-full bg-brand-gold/20 flex items-center justify-center text-brand-gold font-bold text-sm">
                    A
                </div>
                <div class="flex flex-col">
                    <span class="text-xs text-white font-medium">{{ Auth::user()->name }}</span>
                    <span class="text-[10px] text-slate-500">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xs text-slate-400 hover:text-brand-gold transition-colors py-2 mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Public Website
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-2 px-4 rounded-lg bg-red-950/20 border border-red-900/50 hover:bg-red-900 text-red-300 hover:text-white text-xs font-semibold transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Wrapper (lg:pl-64 offsets content from the fixed sidebar on large displays) -->
    <div class="lg:pl-64 min-h-screen flex flex-col">
        <!-- Main Content Area -->
        <main class="flex-grow p-4 md:p-8 lg:p-10 bg-slate-950 min-h-0">
            <!-- Breadcrumbs / Top header info -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-brand-blue-light/10 pb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-serif font-bold text-white tracking-wide">
                        @yield('header_title', 'Owner Dashboard')
                    </h1>
                    <p class="text-slate-400 text-xs mt-1">@yield('header_subtitle', 'Manage catalog products & configuration parameters')</p>
                </div>
                <div>
                    @yield('header_actions')
                </div>
            </div>

            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 bg-emerald-950/30 border border-emerald-800 text-emerald-200 px-4 py-3.5 rounded-xl text-sm">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 flex items-center gap-3 bg-red-950/30 border border-red-800 text-red-200 px-4 py-3.5 rounded-xl text-sm">
                    <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Backdrop for mobile sidebar -->
    <div id="sidebar-backdrop" onclick="toggleSidebar()" class="fixed inset-0 z-30 bg-black/60 backdrop-blur-sm hidden lg:hidden"></div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
