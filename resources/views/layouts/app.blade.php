<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BT Industrial Automation | Sri Lanka')</title>
    <!-- Google Fonts: Inter and Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        (function() {
            const savedTheme = localStorage.getItem('bt_theme') || 'dark';
            if (savedTheme === 'light') {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen flex flex-col antialiased">

    <!-- Header Navigation -->
    <header class="bg-brand-blue-dark/95 backdrop-blur-md border-b border-brand-blue-light/50 sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row md:items-center justify-between gap-3 md:gap-4">
            
            <!-- Top Row: Logo & Mobile Burger Toggle -->
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('logo-monogram.png') }}" alt="BT Logo" class="w-10 h-10 object-contain">
                    <div class="flex flex-col">
                        <h1 class="font-serif font-bold text-lg tracking-wide text-white leading-tight">BT INDUSTRIAL</h1>
                        <p class="text-[10px] font-sans tracking-[0.2em] text-slate-400 font-semibold uppercase leading-none">Automation Sri Lanka</p>
                    </div>
                </a>

                <!-- Mobile Hamburger Toggle Button -->
                <button type="button" id="mobile-menu-toggle" class="md:hidden p-2 rounded-xl bg-brand-blue-light/20 text-slate-300 hover:text-white border border-brand-blue-light/40 focus:outline-none transition-all duration-300" aria-label="Toggle Navigation Menu">
                    <svg id="hamburger-open-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="hamburger-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Collapsible Menu Container -->
            <div id="mobile-menu-container" class="hidden md:flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 w-full md:w-auto transition-all duration-300">
                <!-- Search Bar inside menu -->
                <div class="w-full md:w-80 relative mt-2 md:mt-0">
                    <form action="{{ route('products.index') }}" method="GET" class="relative">
                        <input id="header-search-input" type="text" name="search" placeholder="Search components (PLC, Solar, Sensor)..." 
                               value="{{ request('search') }}" autocomplete="off"
                               class="w-full bg-brand-blue-light/30 border border-brand-blue-light/80 rounded-full py-2 pl-4 pr-10 text-sm text-slate-100 placeholder-slate-400 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-all duration-300">
                        <button type="submit" class="absolute right-3 top-2.5 text-slate-400 hover:text-brand-gold transition-colors duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>
                    
                    <!-- Autocomplete Dropdown Container -->
                    <div id="search-suggestions" class="hidden absolute top-full left-0 right-0 mt-2 bg-[#0A1224]/95 backdrop-blur-md border border-brand-blue-light/50 rounded-2xl shadow-2xl z-50 overflow-hidden divide-y divide-brand-blue-light/20 max-h-96 overflow-y-auto">
                        <!-- Dynamic suggestions go here -->
                    </div>
                </div>

                <!-- Nav Menu Links -->
                <nav class="flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6 mt-3 md:mt-0 border-t border-brand-blue-light/20 md:border-none pt-3 md:pt-0">
                    <a href="{{ route('home') }}" class="w-full md:w-auto py-2 md:py-0 text-sm font-medium tracking-wide gold-underline {{ request()->routeIs('home') ? 'text-brand-gold font-semibold' : 'text-slate-300' }}">Home</a>
                    <a href="{{ route('products.index') }}" class="w-full md:w-auto py-2 md:py-0 text-sm font-medium tracking-wide gold-underline {{ request()->routeIs('products.index') ? 'text-brand-gold font-semibold' : 'text-slate-300' }}">Products Catalog</a>
                    <a href="{{ route('contact') }}" class="w-full md:w-auto py-2 md:py-0 text-sm font-medium tracking-wide gold-underline {{ request()->routeIs('contact') ? 'text-brand-gold font-semibold' : 'text-slate-300' }}">Contact Us</a>
                </nav>
            </div>

        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-brand-blue-dark border-t border-brand-blue-light/30 text-slate-400 pt-12 pb-6 mt-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            
            <!-- Column 1: Brand Info -->
            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo-monogram.png') }}" alt="BT Logo" class="w-10 h-10 object-contain">
                    <span class="font-serif font-bold text-lg text-white">BT Industrial Automation</span>
                </a>
                <p class="text-sm leading-relaxed text-slate-400 mt-2">
                    Your premier engineering partner in Sri Lanka for advanced PLCs, industrial sensors, solar power configurations, inverters, and custom robotic automation solutions.
                </p>
                <!-- Social Links -->
                <div class="flex items-center gap-4 mt-3">
                    <a href="https://www.facebook.com/share/1PATJveuuY/" target="_blank" class="w-8 h-8 rounded-full bg-brand-blue-light/50 flex items-center justify-center text-slate-300 hover:bg-brand-gold hover:text-slate-950 transition-all duration-300" aria-label="Facebook">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="flex flex-col gap-4 md:pl-12">
                <h3 class="text-white font-serif font-semibold text-lg">Quick Navigation</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-brand-gold transition-colors duration-300 flex items-center gap-2"><span>&rsaquo;</span> Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-brand-gold transition-colors duration-300 flex items-center gap-2"><span>&rsaquo;</span> Products Catalog</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-brand-gold transition-colors duration-300 flex items-center gap-2"><span>&rsaquo;</span> Contact Us</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'plcs-controllers']) }}" class="hover:text-brand-gold transition-colors duration-300 flex items-center gap-2"><span>&rsaquo;</span> PLCs & HMIs</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'solar-solutions']) }}" class="hover:text-brand-gold transition-colors duration-300 flex items-center gap-2"><span>&rsaquo;</span> Solar Systems</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="flex flex-col gap-4">
                <h3 class="text-white font-serif font-semibold text-lg">Contact & Location</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>67, 23rd lane, Dikhenapura Horana, Sri Lanka.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+94 70 385 0140</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>buddikatharindujp@gmail.com</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="container mx-auto px-4 border-t border-brand-blue-light/20 pt-6 mt-6 flex flex-col md:flex-row items-center justify-between text-xs">
            <p>&copy; {{ date('Y') }} BT Industrial Automation. All Rights Reserved.</p>
            <p class="mt-2 md:mt-0 text-slate-500">Designed with passion for premium engineering. &bull; <a href="{{ route('login') }}" class="hover:text-brand-gold transition-colors duration-300">Owner Portal</a></p>
        </div>
    </footer>

    <!-- Floating WhatsApp Bubble -->
    <a href="https://wa.me/94703850140?text=Hi%20BT%20Industrial%20Automation,%20I%20have%20an%20inquiry%20about%20your%20services." 
       target="_blank" 
       rel="noopener noreferrer" 
       class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 bg-[#25D366] hover:bg-[#20BA56] text-white rounded-full shadow-2xl hover:shadow-[0_0_20px_rgba(37,211,102,0.6)] hover:scale-110 active:scale-95 transition-all duration-300 group"
       aria-label="Chat on WhatsApp">
        <!-- Pulse effect waves -->
        <span class="absolute inline-flex h-full w-full rounded-full bg-[#25D366] opacity-75 animate-ping -z-10"></span>
        
        <!-- SVG Icon -->
        <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.717-1.456L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.42 9.864-9.864.002-2.637-1.03-5.114-2.905-6.99C16.486 1.876 14.015.845 11.38.845c-5.441 0-9.868 4.423-9.872 9.869-.001 1.77.469 3.493 1.365 5.01L1.879 21.65l6.002-1.574-1.234-.731zm9.306-7.391c-.244-.122-1.45-.715-1.674-.798-.225-.082-.388-.122-.55.122-.162.245-.631.797-.773.959-.143.162-.285.183-.53.061-.243-.122-1.029-.379-1.96-1.211-.724-.646-1.213-1.444-1.355-1.689-.143-.244-.015-.376.107-.497.111-.11.244-.286.367-.428.122-.143.163-.245.244-.408.082-.162.041-.306-.02-.428-.061-.122-.55-1.326-.753-1.814-.197-.478-.397-.413-.55-.42-.143-.007-.306-.008-.469-.008-.162 0-.428.061-.653.306-.224.245-.856.837-.856 2.041 0 1.204.877 2.367 1.001 2.531.122.163 1.725 2.635 4.179 3.692.584.253 1.039.403 1.394.516.587.186 1.12.16 1.542.097.47-.071 1.45-.592 1.653-1.163.204-.572.204-1.061.142-1.163-.061-.102-.224-.163-.468-.285z"/>
        </svg>
        
        <!-- Hover Text Overlay -->
        <span class="absolute right-16 bg-slate-900 border border-brand-blue-light/50 text-white text-xs font-semibold px-3 py-1.5 rounded-lg opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-xl">
            Chat with us
        </span>
    </a>

    <!-- Floating Light/Dark Mode Switcher -->
    <button id="theme-toggle-btn" 
            onclick="toggleTheme()"
            class="fixed bottom-6 left-6 z-50 w-14 h-14 bg-slate-900/90 backdrop-blur-md border border-brand-blue-light/80 text-brand-gold rounded-full shadow-2xl hover:border-brand-gold hover:shadow-[0_0_20px_rgba(255,178,0,0.3)] hover:scale-110 active:scale-95 transition-all duration-300 flex items-center justify-center group"
            aria-label="Toggle Light / Dark Mode">
        <!-- Sun Icon (shows in dark mode) -->
        <svg id="theme-sun-icon" class="w-6 h-6 block [html[data-theme='light']_&]:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
        </svg>
        <!-- Moon Icon (shows in light mode) -->
        <svg id="theme-moon-icon" class="w-6 h-6 hidden [html[data-theme='light']_&]:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
        
        <!-- Tooltip -->
        <span class="absolute left-16 bg-slate-900 border border-brand-blue-light/50 text-white text-[10px] font-semibold px-2 py-1 rounded-md opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-xl">
            Toggle Light/Dark Mode
        </span>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('header-search-input');
            const suggestionsDiv = document.getElementById('search-suggestions');
            let debounceTimer;

            if (!searchInput || !suggestionsDiv) return;

            // Handle typing event
            searchInput.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                const query = searchInput.value.trim();

                if (query.length < 2) {
                    suggestionsDiv.innerHTML = '';
                    suggestionsDiv.classList.add('hidden');
                    return;
                }

                // Debounce network requests by 250ms
                debounceTimer = setTimeout(() => {
                    fetch(`/api/search-suggestions?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.length === 0) {
                                suggestionsDiv.innerHTML = `
                                    <div class="p-4 text-xs text-slate-500 text-center">
                                        No products found for "${query}"
                                    </div>
                                `;
                                suggestionsDiv.classList.remove('hidden');
                                return;
                            }

                            let html = '';
                            data.forEach(item => {
                                const imageHtml = item.image 
                                    ? `<img src="${item.image}" alt="${item.name}" class="w-10 h-10 object-contain rounded bg-slate-900 border border-brand-blue-light/40 shrink-0">`
                                    : `<div class="w-10 h-10 rounded bg-slate-950 border border-brand-blue-light/40 flex items-center justify-center text-brand-gold shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg></div>`;

                                html += `
                                    <a href="${item.url}" class="flex items-center gap-3 p-3 text-left hover:bg-brand-blue-light/20 transition-all duration-300 group">
                                        ${imageHtml}
                                        <div class="flex-grow min-w-0">
                                            <h4 class="text-sm font-semibold text-white truncate group-hover:text-brand-gold transition-colors">${item.name}</h4>
                                            <span class="text-[10px] text-slate-500 uppercase tracking-wider">${item.category}</span>
                                        </div>
                                        <div class="text-right shrink-0">
                                            <span class="text-xs font-bold text-brand-gold">LKR ${item.price}</span>
                                        </div>
                                    </a>
                                `;
                            });

                            // Add a "view all" link at the bottom
                            html += `
                                <a href="/products?search=${encodeURIComponent(query)}" class="block p-3 text-center text-xs font-bold text-slate-400 hover:text-brand-gold bg-brand-blue-dark/50 hover:bg-brand-blue-light/10 transition-all duration-300 border-t border-brand-blue-light/20">
                                    View All Search Results &rarr;
                                </a>
                            `;

                            suggestionsDiv.innerHTML = html;
                            suggestionsDiv.classList.remove('hidden');
                        })
                        .catch(err => console.error('Error fetching suggestions:', err));
                }, 250);
            });

            // Close suggestions when clicking outside
            document.addEventListener('click', function (e) {
                if (!searchInput.contains(e.target) && !suggestionsDiv.contains(e.target)) {
                    suggestionsDiv.classList.add('hidden');
                }
            });

            // Show suggestions when clicking back inside if query exists
            searchInput.addEventListener('click', function () {
                if (searchInput.value.trim().length >= 2 && suggestionsDiv.innerHTML !== '') {
                    suggestionsDiv.classList.remove('hidden');
                }
            });
        });
    </script>

    <!-- Theme Switcher Script & Mobile Menu Script -->
    <script>
        function toggleTheme() {
            const currentTheme = localStorage.getItem('bt_theme') || 'dark';
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            if (newTheme === 'light') {
                document.documentElement.setAttribute('data-theme', 'light');
            } else {
                document.documentElement.removeAttribute('data-theme');
            }
            localStorage.setItem('bt_theme', newTheme);
        }

        // Mobile Responsive Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('mobile-menu-toggle');
            const menuContainer = document.getElementById('mobile-menu-container');
            const openIcon = document.getElementById('hamburger-open-icon');
            const closeIcon = document.getElementById('hamburger-close-icon');

            if (toggleButton && menuContainer) {
                toggleButton.addEventListener('click', function() {
                    const isHidden = menuContainer.classList.contains('hidden');
                    if (isHidden) {
                        menuContainer.classList.remove('hidden');
                        menuContainer.classList.add('flex');
                        openIcon.classList.add('hidden');
                        openIcon.classList.remove('block');
                        closeIcon.classList.remove('hidden');
                        closeIcon.classList.add('block');
                    } else {
                        menuContainer.classList.add('hidden');
                        menuContainer.classList.remove('flex');
                        openIcon.classList.remove('hidden');
                        openIcon.classList.add('block');
                        closeIcon.classList.add('hidden');
                        closeIcon.classList.remove('block');
                    }
                });
            }
        });
    </script>

</body>
</html>
