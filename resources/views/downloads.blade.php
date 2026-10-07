@extends('layouts.app')

@section('content')
<!-- Downloads Hub Hero Section -->
<section class="relative bg-slate-950 py-16 overflow-hidden border-b border-brand-blue-light/20">
    <!-- Subtle Background Overlay -->
    <div class="absolute inset-0 bg-hero-overlay opacity-80 pointer-events-none"></div>
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-gold/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
        <div class="hero-badge inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-gold/10 border border-brand-gold/30 text-brand-gold text-xs font-semibold uppercase tracking-widest mb-6">
            <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Official Engineering Software Hub
        </div>

        <h1 class="hero-title-main text-3xl md:text-5xl font-serif font-bold text-white leading-tight tracking-wide mb-6">
            PLC & HMI Programming <br>
            <span class="hero-title-gradient">Software & Drivers</span>
        </h1>

        <p class="hero-subtitle text-slate-300 text-base md:text-lg leading-relaxed max-w-2xl mx-auto mb-8">
            Download official programming environments, touchscreen editors, and communication drivers for Coolmay, FX3U, and TK Series controllers directly from BT Industrial.
        </p>

        <!-- Quick Info Badges -->
        <div class="flex flex-wrap justify-center gap-3 text-xs font-medium text-slate-400">
            <span class="px-3 py-1.5 rounded-lg bg-slate-900/80 border border-slate-700/60 [html[data-theme='light']_&]:bg-white [html[data-theme='light']_&]:border-slate-300 [html[data-theme='light']_&]:text-slate-700 flex items-center gap-1.5 shadow-sm">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                100% Free Direct Downloads
            </span>
            <span class="px-3 py-1.5 rounded-lg bg-slate-900/80 border border-slate-700/60 [html[data-theme='light']_&]:bg-white [html[data-theme='light']_&]:border-slate-300 [html[data-theme='light']_&]:text-slate-700 flex items-center gap-1.5 shadow-sm">
                <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Verified Official Builds
            </span>
            <span class="px-3 py-1.5 rounded-lg bg-slate-900/80 border border-slate-700/60 [html[data-theme='light']_&]:bg-white [html[data-theme='light']_&]:border-slate-300 [html[data-theme='light']_&]:text-slate-700 flex items-center gap-1.5 shadow-sm">
                <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Windows 7/8/10/11 Compatible
            </span>
        </div>
    </div>
</section>

<!-- Software Download Cards Grid -->
<section class="py-16 bg-slate-950 [html[data-theme='light']_&]:bg-slate-50 min-h-[600px]">
    <div class="container mx-auto px-4 max-w-6xl">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            @foreach($downloads as $item)
            <div class="bg-glass-card rounded-2xl border border-slate-800 [html[data-theme='light']_&]:border-slate-200/90 p-6 md:p-8 flex flex-col justify-between relative group hover:border-brand-gold/50 transition-all duration-300 shadow-xl [html[data-theme='light']_&]:shadow-lg hover:-translate-y-1">
                
                <!-- Card Header -->
                <div>
                    <div class="flex items-center justify-between gap-4 mb-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-gold/10 text-brand-gold border border-brand-gold/30">
                            {{ $item['badge'] }}
                        </span>
                        <span class="text-xs font-mono text-slate-400 [html[data-theme='light']_&]:text-slate-500 bg-slate-900/60 [html[data-theme='light']_&]:bg-slate-100 px-2.5 py-1 rounded-md border border-slate-800 [html[data-theme='light']_&]:border-slate-200">
                            {{ $item['file_size'] }} • {{ $item['version'] }}
                        </span>
                    </div>

                    <h3 class="text-xl md:text-2xl font-bold font-serif text-white [html[data-theme='light']_&]:text-slate-900 mb-3 group-hover:text-brand-gold transition-colors duration-300">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-slate-400 [html[data-theme='light']_&]:text-slate-600 text-sm leading-relaxed mb-6">
                        {{ $item['description'] }}
                    </p>

                    <!-- Key Features Bullet List -->
                    <div class="space-y-2.5 mb-8">
                        <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-400 [html[data-theme='light']_&]:text-slate-700">Key Features:</h4>
                        @foreach($item['features'] as $feature)
                        <div class="flex items-start gap-2.5 text-xs text-slate-300 [html[data-theme='light']_&]:text-slate-700">
                            <svg class="w-4 h-4 text-brand-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Footer Specs & Action Buttons -->
                <div class="pt-6 border-t border-slate-800/80 [html[data-theme='light']_&]:border-slate-200 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase font-mono tracking-wider text-slate-500">File Name</span>
                        <span class="text-xs font-mono font-medium text-slate-300 [html[data-theme='light']_&]:text-slate-800">{{ $item['file_name'] }}</span>
                    </div>

                    <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer" class="px-6 py-3 bg-brand-gold hover:bg-amber-600 text-slate-950 font-bold text-sm rounded-xl transition-all duration-300 shadow-lg shadow-brand-gold/20 flex items-center justify-center gap-2 transform active:scale-95">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download Software
                    </a>
                </div>

            </div>
            @endforeach
        </div>

        <!-- Technical Engineering Support Card -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 [html[data-theme='light']_&]:from-amber-500/10 [html[data-theme='light']_&]:via-white [html[data-theme='light']_&]:to-amber-500/10 rounded-2xl border border-brand-gold/30 p-8 text-center relative overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-2xl mx-auto">
                <h3 class="text-2xl font-serif font-bold text-white [html[data-theme='light']_&]:text-slate-900 mb-3">
                    Need Help Installing or Programming Your PLC / HMI?
                </h3>
                <p class="text-slate-300 [html[data-theme='light']_&]:text-slate-600 text-sm leading-relaxed mb-6">
                    Our specialized industrial automation engineers are available in Sri Lanka to assist you with PLC ladder logic programming, HMI screen design, wiring diagrams, and troubleshooting.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#0F172A] hover:bg-[#1E293B] text-white font-semibold text-sm rounded-xl transition-all duration-300 shadow-lg shadow-slate-900/10 transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Contact Engineering Support Team
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
