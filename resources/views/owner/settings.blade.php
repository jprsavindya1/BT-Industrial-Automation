@extends('layouts.owner')

@section('title', 'Security Settings | BT Industrial Automation')
@section('header_title', 'Security Settings')
@section('header_subtitle', 'Change your administrator password to maintain secure portal access')

@section('content')
<div class="max-w-2xl bg-brand-blue-dark/20 border border-brand-blue-light/20 p-8 rounded-2xl">
    
    @if($errors->any())
        <div class="mb-6 bg-red-950/30 border border-red-800 text-red-200 px-4 py-3.5 rounded-xl text-sm">
            <ul class="list-disc pl-4 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('owner.settings.password') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <!-- Current Password -->
            <div>
                <label for="current_password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Current Password</label>
                <input id="current_password" name="current_password" type="password" required 
                       class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">New Password</label>
                <input id="password" name="password" type="password" required 
                       class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
                <span class="text-[10px] text-slate-500">Must be at least 8 characters long and contain a mix of letters and numbers.</span>
            </div>

            <!-- Confirm New Password -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Confirm New Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required 
                       class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
            </div>
        </div>

        <div class="pt-4 border-t border-brand-blue-light/10 flex justify-end">
            <button type="submit" 
                    class="px-6 py-3 border border-transparent text-sm font-bold rounded-xl text-slate-950 bg-brand-gold hover:bg-brand-gold-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-gold transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg shadow-brand-gold/10">
                Update Password
            </button>
        </div>
    </form>

</div>
@endsection
