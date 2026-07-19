@extends('layouts.app')

@section('title', 'Owner Login | BT Industrial Automation')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center bg-slate-950 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Grid backdrop -->
    <div class="absolute inset-0 bg-dot-grid-lg"></div>
    <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-brand-gold/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-brand-blue-light/10 rounded-full blur-3xl"></div>

    <div class="max-w-md w-full space-y-8 bg-brand-blue-dark/40 border border-brand-blue-light/35 p-8 rounded-2xl backdrop-blur-md relative z-10">
        <div>
            <div class="mx-auto w-16 h-16 bg-slate-900 border-2 border-brand-gold flex items-center justify-center rounded-xl shadow-lg relative overflow-hidden">
                <span class="font-serif font-bold text-3xl text-white">B<span class="text-brand-gold">T</span></span>
            </div>
            <h2 class="mt-6 text-center text-3xl font-serif font-bold text-white tracking-wide">
                Owner Portal
            </h2>
            <p class="mt-2 text-center text-xs text-slate-400 font-sans tracking-widest uppercase">
                Sign in to manage catalog
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-950/40 border border-red-800 text-red-200 px-4 py-3 rounded-lg text-sm">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email-address" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Email Address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                           value="{{ old('email') }}"
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300" 
                           placeholder="name@btautomation.lk">
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300" 
                           placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember" type="checkbox" 
                           class="h-4 w-4 text-brand-gold focus:ring-brand-gold border-brand-blue-light/80 bg-brand-blue-light/30 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-slate-400">
                        Remember me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-slate-950 bg-brand-gold hover:bg-brand-gold-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-gold transition-all duration-300 transform hover:-translate-y-0.5">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
