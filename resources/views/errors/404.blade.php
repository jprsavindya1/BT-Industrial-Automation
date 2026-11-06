@extends('layouts.app')

@section('title', 'Page Not Found | BT Industrial Automation')

@section('content')
<div class="min-h-[70vh] bg-slate-950 flex flex-col items-center justify-center py-20 px-4">
    <div class="text-center max-w-lg mx-auto">
        <h1 class="text-9xl font-bold font-serif text-brand-gold/20 select-none">404</h1>
        <div class="mt-[-40px] mb-8 relative z-10">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">Page Not Found</h2>
            <p class="text-slate-400 mb-8 leading-relaxed">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="px-6 py-3 bg-brand-gold hover:bg-yellow-500 text-slate-950 font-semibold rounded-lg transition-all duration-300 w-full sm:w-auto">
                    Go to Homepage
                </a>
                <a href="{{ route('products.index') }}" class="px-6 py-3 border border-brand-blue-light/30 bg-slate-800/50 hover:bg-slate-800 text-white font-medium rounded-lg transition-all duration-300 w-full sm:w-auto">
                    Browse Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
