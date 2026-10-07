@extends('layouts.app')

@section('title', 'BT Industrial Automation | Sri Lanka')

@section('content')
<!-- Hero Section -->
<section class="relative bg-slate-950 pt-20 pb-24 overflow-hidden border-b border-brand-blue-light/20">
    <!-- Background Slideshow -->
    <div class="absolute inset-0 z-0">
        <!-- Slide 1: Robotic Arm Automation -->
        <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100 hero-slide" 
             style="background-image: url('https://images.unsplash.com/photo-1616401784845-180882ba9ba8?q=80&w=1600');"></div>
        <!-- Slide 2: Solar Panels -->
        <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0 hero-slide" 
             style="background-image: url('https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=1600');"></div>
        <!-- Slide 3: Engineering Control Panel -->
        <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0 hero-slide" 
             style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1600');"></div>
        
        <!-- Dynamic Overlay Gradient -->
        <div class="absolute inset-0 bg-hero-overlay"></div>
    </div>

    <!-- Decorative background elements -->
    <div class="absolute top-1/4 left-1/10 w-96 h-96 bg-brand-gold/5 rounded-full blur-3xl z-10 pointer-events-none"></div>
    <div class="absolute bottom-10 right-1/10 w-96 h-96 bg-brand-blue-light/10 rounded-full blur-3xl z-10 pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-20 text-center max-w-4xl">
        <div class="hero-badge inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-gold/10 border border-brand-gold/30 text-brand-gold text-xs font-semibold uppercase tracking-widest mb-6 transition-all duration-300">
            <svg class="w-3.5 h-3.5 animate-pulse" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
            </svg>
            Industrial Automation & Energy Solutions
        </div>
        
        <h2 class="hero-title-main text-4xl md:text-6xl font-serif font-bold text-white leading-tight tracking-wide mb-6">
            Engineering the Future of <br>
            <span class="hero-title-gradient">Automation & Power</span>
        </h2>
        
        <p class="hero-subtitle text-slate-400 text-lg md:text-xl leading-relaxed mb-8 max-w-2xl mx-auto">
            Providing high-quality PLCs, industrial sensors, solar panel configurations, and custom robotic solutions to empower Sri Lankan industries.
        </p>

        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('products.index') }}" class="px-8 py-3 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold rounded-full transition-all duration-300 shadow-lg shadow-brand-gold/20 transform hover:-translate-y-0.5">
                Explore Catalog
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-3 bg-brand-blue-light/20 hover:bg-brand-blue-light/40 border border-brand-blue-light text-white font-semibold rounded-full transition-all duration-300 transform hover:-translate-y-0.5">
                Contact Engineering
            </a>
        </div>
    </div>
</section>

<!-- Brand Partners Section -->
<section class="py-12 bg-slate-950 border-b border-brand-blue-light/20">
    <div class="container mx-auto px-4">
        <p class="text-center text-xs font-semibold tracking-[0.2em] text-slate-500 uppercase mb-8">Trusted by Industries & Engineered with Top Brands</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 items-center justify-center">
            
            <!-- Siemens -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-teal-500/40 hover:shadow-[0_0_15px_rgba(20,184,166,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-teal-500 transition-colors duration-300">SIEMENS</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-teal-600 transition-colors duration-300 uppercase mt-0.5">Automation</span>
            </div>
            
            <!-- Omron -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-blue-500/40 hover:shadow-[0_0_15px_rgba(59,130,246,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-blue-500 transition-colors duration-300">OMRON</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-blue-600 transition-colors duration-300 uppercase mt-0.5">Sensors & Control</span>
            </div>
            
            <!-- Delta -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-indigo-500/40 hover:shadow-[0_0_15px_rgba(99,102,241,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-indigo-500 transition-colors duration-300">DELTA</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-indigo-600 transition-colors duration-300 uppercase mt-0.5">Drives & VFDs</span>
            </div>
            
            <!-- Wecon -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-cyan-500/40 hover:shadow-[0_0_15px_rgba(6,182,212,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-cyan-500 transition-colors duration-300">WECON</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-cyan-600 transition-colors duration-300 uppercase mt-0.5">HMI & PLC Panels</span>
            </div>
            
            <!-- SG Servo -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-emerald-500/40 hover:shadow-[0_0_15px_rgba(16,185,129,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-emerald-500 transition-colors duration-300">SG SERVO</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-emerald-600 transition-colors duration-300 uppercase mt-0.5">Servo Motors</span>
            </div>

            <!-- Coolmay PLC -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-purple-500/40 hover:shadow-[0_0_15px_rgba(168,85,247,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-purple-500 transition-colors duration-300">COOLMAY</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-purple-600 transition-colors duration-300 uppercase mt-0.5">HMI + PLC All-In-One</span>
            </div>

            <!-- Omran -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-amber-500/40 hover:shadow-[0_0_15px_rgba(245,158,11,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-amber-500 transition-colors duration-300">OMRAN</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-amber-600 transition-colors duration-300 uppercase mt-0.5">VFD & SERVO & HMI</span>
            </div>

            <!-- FX3U PLC -->
            <div class="bg-glass-card p-4 rounded-xl border border-brand-blue-light/10 text-center flex flex-col items-center justify-center group hover:border-rose-500/40 hover:shadow-[0_0_15px_rgba(244,63,94,0.15)] transition-all duration-300">
                <span class="brand-card-title font-sans font-extrabold text-base md:text-lg tracking-wider group-hover:text-rose-500 transition-colors duration-300">FX3U PLC</span>
                <span class="brand-card-sub text-[9px] font-mono group-hover:text-rose-600 transition-colors duration-300 uppercase mt-0.5">Chinese Micro PLC</span>
            </div>
            
        </div>
    </div>
</section>

<!-- Trust Guarantees Section -->
<section class="py-16 bg-slate-900 border-b border-brand-blue-light/10 relative overflow-hidden">
    <!-- Subtle grid background overlay -->
    <div class="absolute inset-0 bg-dot-grid opacity-15"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Guarantee 1 -->
            <div class="flex gap-5 items-start p-6 rounded-2xl bg-glass-card hover-glass-card">
                <div class="p-3 bg-brand-gold/10 border border-brand-gold/20 rounded-xl text-brand-gold shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-serif font-bold text-lg mb-2">100% Genuine Imports</h4>
                    <p class="text-sm text-slate-400 leading-relaxed">Direct imports with verified serial numbers and warranty registration directly from global manufacturers.</p>
                </div>
            </div>
            
            <!-- Guarantee 2 -->
            <div class="flex gap-5 items-start p-6 rounded-2xl bg-glass-card hover-glass-card">
                <div class="p-3 bg-brand-gold/10 border border-brand-gold/20 rounded-xl text-brand-gold shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-serif font-bold text-lg mb-2">Expert Engineering Support</h4>
                    <p class="text-sm text-slate-400 leading-relaxed">Our specialized engineering team assists with component selection, PLC programming, and system integration support.</p>
                </div>
            </div>
            
            <!-- Guarantee 3 -->
            <div class="flex gap-5 items-start p-6 rounded-2xl bg-glass-card hover-glass-card">
                <div class="p-3 bg-brand-gold/10 border border-brand-gold/20 rounded-xl text-brand-gold shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-serif font-bold text-lg mb-2">Local Warranty Coverage</h4>
                    <p class="text-sm text-slate-400 leading-relaxed">Hassle-free local warranty returns, fast component diagnostic review, and immediate replacement guarantee for failures.</p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Software Downloads Banner Section -->
<section class="py-10 bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 [html[data-theme='light']_&]:from-slate-100 [html[data-theme='light']_&]:via-white [html[data-theme='light']_&]:to-slate-100 border-b border-brand-blue-light/20 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="bg-glass-card rounded-3xl border border-brand-gold/30 p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
            <div class="flex items-center gap-5">
                <div class="w-14 h-14 rounded-2xl bg-brand-gold/15 border border-brand-gold/40 flex items-center justify-center text-brand-gold shrink-0">
                    <svg class="w-7 h-7 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                </div>
                <div>
                    <span class="text-xs font-mono font-semibold uppercase tracking-widest text-brand-gold">Engineering Tools Hub</span>
                    <h3 class="text-xl md:text-2xl font-bold font-serif text-white [html[data-theme='light']_&]:text-slate-900 mt-0.5">Need PLC & HMI Programming Software?</h3>
                    <p class="text-slate-400 [html[data-theme='light']_&]:text-slate-600 text-xs md:text-sm mt-1">Download official Coolmay, FX3U, and TK HMI software & drivers 100% free directly from BT Industrial.</p>
                </div>
            </div>
            <a href="{{ route('downloads') }}" class="px-8 py-3.5 bg-brand-gold hover:bg-amber-600 text-slate-950 font-bold text-sm rounded-xl transition-all duration-300 shadow-lg shadow-brand-gold/20 shrink-0 transform hover:-translate-y-0.5">
                Access Software Hub
            </a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-slate-950">
    <div class="container mx-auto px-4">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">Product Categories</h2>
            <p class="text-slate-400 max-w-md mx-auto">Browse our curated collection of industrial automation components and solar energy products.</p>
            <div class="w-16 h-1 bg-brand-gold mx-auto mt-4 rounded"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->slug]) }}" 
                   class="bg-glass-card hover-glass-card p-6 rounded-xl text-center flex flex-col items-center justify-between group">
                    
                    <!-- Icon container -->
                    <div class="w-16 h-16 rounded-full bg-brand-gold/10 border border-brand-gold/30 flex items-center justify-center text-brand-gold mb-4 group-hover:bg-brand-gold/20 group-hover:border-brand-gold group-hover:shadow-[0_0_20px_rgba(217,119,6,0.3)] transition-all duration-300">
                        @if($cat->icon == 'cpu')
                            <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        @elseif($cat->icon == 'radio')
                            <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        @elseif($cat->icon == 'sun')
                            <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                        @elseif($cat->icon == 'activity')
                            <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3 3L22 4"></path></svg>
                        @else
                            <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                        @endif
                    </div>
                    
                    <h3 class="text-white font-serif font-semibold group-hover:text-brand-gold transition-colors duration-300 mb-2">{{ $cat->name }}</h3>
                    <p class="text-xs text-slate-500">{{ $cat->products_count }} {{ Str::plural('Product', $cat->products_count) }}</p>
                </a>
            @endforeach
        </div>

    </div>
</section>

<!-- Featured Products Section -->
<section class="py-20 bg-slate-900 border-t border-b border-brand-blue-light/10">
    <div class="container mx-auto px-4">
        
        <div class="flex flex-col md:flex-row items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl font-serif font-bold text-white mb-2">Featured Components</h2>
                <p class="text-slate-400">High-demand controllers, sensors, and power units in stock.</p>
            </div>
            <a href="{{ route('products.index') }}" class="mt-4 md:mt-0 px-6 py-2.5 rounded-full border border-brand-gold text-brand-gold hover:bg-brand-gold hover:text-slate-950 font-semibold transition-all duration-300 text-sm">
                View All Products &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
                <div class="bg-glass-card hover-glass-card rounded-xl overflow-hidden flex flex-col justify-between group">
                    
                    @if($product->primary_image_url)
                        <div class="h-48 bg-slate-900 relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                            <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute top-3 left-3 bg-brand-gold/10 border border-brand-gold/25 px-2 py-0.5 rounded text-[10px] text-brand-gold font-bold uppercase tracking-wider z-20">
                                Featured
                            </div>
                        </div>
                    @else
                        <div class="h-48 bg-slate-900 flex items-center justify-center relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                            <!-- Technical schematic grid background -->
                            <div class="absolute inset-0 bg-dot-grid"></div>
                            
                            <div class="w-24 h-24 text-slate-700 group-hover:text-brand-gold transition-colors duration-300 relative z-10">
                                @if($product->category->slug == 'plcs-controllers')
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                @elseif($product->category->slug == 'industrial-sensors')
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                @elseif($product->category->slug == 'solar-solutions')
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                                @else
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                @endif
                            </div>
                            
                            <div class="absolute top-3 left-3 bg-brand-gold/10 border border-brand-gold/25 px-2 py-0.5 rounded text-[10px] text-brand-gold font-bold uppercase tracking-wider z-20">
                                Featured
                            </div>
                        </div>
                    @endif

                    <!-- Details -->
                    <div class="p-6 flex flex-col justify-between flex-grow">
                        <div>
                            <span class="text-xs text-slate-500 uppercase tracking-widest font-semibold block mb-1">
                                {{ $product->category->name }}
                            </span>
                            <h3 class="text-white font-serif font-semibold text-lg leading-snug group-hover:text-brand-gold transition-colors duration-300">
                                <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                        </div>

                        <div class="mt-6 pt-4 border-t border-brand-blue-light/10 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] text-slate-500 font-semibold uppercase">Price</span>
                                <span class="text-brand-gold font-bold text-lg">
                                    LKR {{ number_format($product->price, 2) }}
                                </span>
                            </div>
                            <a href="{{ route('products.show', $product->slug) }}" class="px-4 py-2 bg-brand-blue-light/30 hover:bg-brand-gold hover:text-slate-950 text-white text-xs font-bold rounded-lg transition-all duration-300 border border-brand-blue-light/50 hover:border-brand-gold">
                                Details &rarr;
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Client Testimonials Section -->
<section class="py-20 bg-slate-900 border-t border-b border-brand-blue-light/10">
    <div class="container mx-auto px-4">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">What Our Clients Say</h2>
            <p class="text-slate-400 max-w-md mx-auto">Hear from the local factories, engineers, and businesses we partner with.</p>
            <div class="w-16 h-1 bg-brand-gold mx-auto mt-4 rounded"></div>
        </div>

        @if(session('success_review'))
            <div class="bg-emerald-950/40 border border-emerald-500/40 text-emerald-300 px-6 py-4 rounded-2xl text-sm max-w-xl mx-auto mb-10 text-center animate-pulse" role="alert">
                <span class="block sm:inline font-semibold">{{ session('success_review') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($testimonials as $t)
                <div class="bg-glass-card hover-glass-card p-8 rounded-2xl flex flex-col justify-between relative group">
                    <div>
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-1 text-brand-gold mb-6">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $t->rating ? 'fill-current text-brand-gold' : 'text-slate-600 fill-none stroke-current' }}" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-slate-300 text-sm italic leading-relaxed mb-8">
                            "{{ $t->content }}"
                        </p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-brand-blue-light/10 pt-4">
                        <div class="w-10 h-10 rounded-full bg-brand-gold/10 border border-brand-gold/30 flex items-center justify-center font-bold text-brand-gold text-sm uppercase">
                            {{ substr($t->name, 0, 2) }}
                        </div>
                        <div>
                            <h4 class="text-white text-sm font-semibold">{{ $t->name }}</h4>
                            <span class="text-[10px] text-slate-500 uppercase tracking-wider block">
                                {{ $t->role }}{{ $t->company ? ' • ' . $t->company : '' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12 text-slate-500">
                    No approved testimonials yet. Be the first to share your experience!
                </div>
            @endforelse
        </div>

        <!-- Feedback Submission Portal -->
        <div class="mt-16 text-center">
            <button id="btn-toggle-review" 
                    class="px-8 py-3 bg-brand-blue-light/20 hover:bg-brand-gold hover:text-slate-950 text-white font-bold rounded-full transition-all duration-300 border border-brand-blue-light/50 hover:border-brand-gold transform hover:-translate-y-0.5 shadow-lg shadow-brand-gold/5 flex items-center gap-2 mx-auto">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <span>Share Your Experience</span>
            </button>

            <!-- Collapsible Glass Form Container -->
            <div id="review-form-container" class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out mt-8 max-w-xl mx-auto text-left">
                <div class="bg-glass-card p-8 rounded-2xl border border-brand-blue-light/35 shadow-2xl relative">
                    <h3 class="text-xl font-serif font-bold text-white mb-6 border-b border-brand-blue-light/25 pb-3">Submit Your Review</h3>
                    
                    <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="review_name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Your Name *</label>
                                <input type="text" id="review_name" name="name" required placeholder="e.g. Buddika Tharindu"
                                       class="w-full bg-slate-950/60 border border-brand-blue-light/35 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                            </div>
                            <div>
                                <label for="review_role" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Position / Role *</label>
                                <input type="text" id="review_role" name="role" required placeholder="e.g. Electrical Engineer"
                                       class="w-full bg-slate-950/60 border border-brand-blue-light/35 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                            </div>
                        </div>

                        <div>
                            <label for="review_company" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Company (Optional)</label>
                            <input type="text" id="review_company" name="company" placeholder="e.g. Lanka Foods"
                                   class="w-full bg-slate-950/60 border border-brand-blue-light/35 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300">
                        </div>

                        <!-- Interactive Star Rating -->
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Your Rating *</label>
                            <div class="flex items-center gap-2 mt-2">
                                <input type="hidden" name="rating" id="review-rating-value" value="5">
                                <div class="flex items-center gap-1.5 cursor-pointer" id="star-rating-picker">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg data-rating="{{ $i }}" class="w-8 h-8 star-pick fill-current text-brand-gold hover:scale-110 transition-transform duration-200" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="review_content" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">Your Review * (Minimum 10 characters)</label>
                            <textarea id="review_content" name="content" required rows="4" placeholder="Share your experience working with BT Industrial..."
                                      class="w-full bg-slate-950/60 border border-brand-blue-light/35 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-colors duration-300"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" 
                                    class="w-full py-3 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold rounded-xl transition-all duration-300 shadow-lg shadow-brand-gold/15 transform hover:-translate-y-0.5">
                                Submit Review
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Hero Background Slideshow
        const heroSlides = document.querySelectorAll('.hero-slide');
        let currentHeroSlide = 0;
        if (heroSlides.length > 0) {
            setInterval(function () {
                heroSlides[currentHeroSlide].classList.remove('opacity-100');
                heroSlides[currentHeroSlide].classList.add('opacity-0');
                currentHeroSlide = (currentHeroSlide + 1) % heroSlides.length;
                heroSlides[currentHeroSlide].classList.remove('opacity-0');
                heroSlides[currentHeroSlide].classList.add('opacity-100');
            }, 6000);
        }

        const toggleBtn = document.getElementById('btn-toggle-review');
        const formContainer = document.getElementById('review-form-container');
        
        if (toggleBtn && formContainer) {
            toggleBtn.addEventListener('click', function () {
                if (formContainer.style.maxHeight === '0px' || !formContainer.style.maxHeight) {
                    formContainer.style.maxHeight = formContainer.scrollHeight + 100 + 'px';
                    toggleBtn.querySelector('span').innerText = 'Close Form';
                    toggleBtn.classList.add('bg-rose-500/20', 'border-rose-500/50', 'hover:border-rose-500');
                    toggleBtn.classList.remove('bg-brand-blue-light/20', 'hover:bg-brand-gold');
                } else {
                    formContainer.style.maxHeight = '0px';
                    toggleBtn.querySelector('span').innerText = 'Share Your Experience';
                    toggleBtn.classList.remove('bg-rose-500/20', 'border-rose-500/50', 'hover:border-rose-500');
                    toggleBtn.classList.add('bg-brand-blue-light/20', 'hover:bg-brand-gold');
                }
            });
        }

        // Star rating interactivity
        const stars = document.querySelectorAll('.star-pick');
        const ratingInput = document.getElementById('review-rating-value');
        
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = parseInt(this.getAttribute('data-rating'));
                ratingInput.value = rating;
                
                stars.forEach((s, idx) => {
                    if (idx < rating) {
                        s.classList.remove('text-slate-600', 'fill-none', 'stroke-current');
                        s.classList.add('text-brand-gold', 'fill-current');
                    } else {
                        s.classList.add('text-slate-600', 'fill-none', 'stroke-current');
                        s.classList.remove('text-brand-gold', 'fill-current');
                    }
                });
            });
        });
    });
</script>

<!-- Engineering Expertise / About us Intro -->
<section class="py-20 bg-slate-950 relative overflow-hidden">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <!-- Schematic / Illustration representation -->
        <div class="relative w-full aspect-video rounded-xl bg-slate-900 border border-brand-blue-light/20 flex flex-col justify-center p-8 relative overflow-hidden group">
            <div class="absolute inset-0 bg-dot-grid"></div>
            <!-- Drawing dynamic lines -->
            <div class="w-full h-1/2 border border-brand-gold/10 border-dashed rounded relative flex items-center justify-center p-4">
                <span class="text-xs font-mono text-brand-gold/30 tracking-widest absolute top-2 left-2">BLOCK SCHEMATIC</span>
                <div class="flex gap-4 items-center">
                    <div class="px-3 py-2 bg-slate-950 border border-brand-gold/40 rounded text-center text-xs font-mono text-slate-300">SENSORS</div>
                    <div class="text-brand-gold">&mdash;&mdash;&rsaquo;</div>
                    <div class="px-3 py-2 bg-brand-blue-dark border border-brand-gold rounded text-center text-xs font-mono text-white font-bold relative">
                        PLC CPU
                        <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-gold opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-brand-gold"></span>
                        </span>
                    </div>
                    <div class="text-brand-gold">&mdash;&mdash;&rsaquo;</div>
                    <div class="px-3 py-2 bg-slate-950 border border-brand-gold/40 rounded text-center text-xs font-mono text-slate-300">ACTUATORS</div>
                </div>
            </div>
            <div class="mt-6 flex justify-between items-center text-xs font-mono text-slate-500">
                <span>BT INDUSTRIAL AUTOMATION &copy; 2026</span>
                <span>STATUS: ACTIVE</span>
            </div>
        </div>

        <div>
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-6">Expert Industrial Engineering & Support</h2>
            <p class="text-slate-400 leading-relaxed mb-6">
                At BT Industrial Automation, we do not just sell components; we provide complete engineering integration. Whether you are seeking specific PLC cards, custom inductive sensors, high-output solar panel setups, or custom motor controls, our expert support guarantees reliability.
            </p>
            <ul class="space-y-4 mb-8">
                <li class="flex items-center gap-3 text-sm text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-brand-gold"></span>
                    Custom programming support for Siemens & Omron controllers.
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-brand-gold"></span>
                    Premium Grade components tested in harsh industrial environments.
                </li>
                <li class="flex items-center gap-3 text-sm text-slate-300">
                    <span class="w-2 h-2 rounded-full bg-brand-gold"></span>
                    Fast delivery island-wide in Sri Lanka with trusted warranties.
                </li>
            </ul>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-brand-gold font-semibold hover:text-white transition-colors duration-300">
                Speak to our engineers &rarr;
            </a>
        </div>

    </div>
</section>
@endsection
