@extends('layouts.owner')

@section('title', 'Edit Software Download | Owner Portal')
@section('header_title', 'Edit Software / Driver Link')
@section('header_subtitle', 'Update software details, version, or direct download link')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between">
        <a href="{{ route('owner.downloads.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-brand-gold transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Downloads List
        </a>
    </div>

    <div class="bg-glass-card p-6 md:p-8 rounded-2xl border border-brand-blue-light/20 shadow-xl">
        <form action="{{ route('owner.downloads.update', $download->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @include('owner.downloads.form-fields', ['download' => $download])

            <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-4">
                <a href="{{ route('owner.downloads.index') }}" class="px-6 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm rounded-xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-3 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold text-sm rounded-xl transition-all shadow-lg shadow-brand-gold/15">
                    Update Software Item
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
