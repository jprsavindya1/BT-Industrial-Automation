@extends('layouts.app')

@section('title', 'Too Many Requests | BT Industrial Automation')

@section('content')
<div class="min-h-[70vh] bg-slate-950 flex flex-col items-center justify-center py-20 px-4">
    <div class="text-center max-w-lg mx-auto">
        <h1 class="text-9xl font-bold font-serif text-brand-gold/20 select-none">429</h1>
        <div class="mt-[-40px] mb-8 relative z-10">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">Too Many Requests</h2>
            <p class="text-slate-400 mb-8 leading-relaxed">You have sent too many requests in a short period of time. Our security system has temporarily paused your actions to protect the website. Please wait a minute and try again.</p>
            
            <a href="{{ route('home') }}" class="px-6 py-3 bg-brand-gold hover:bg-yellow-500 text-slate-950 font-semibold rounded-lg transition-all duration-300 inline-block">
                Go Back Home
            </a>
        </div>
    </div>
</div>
@endsection
