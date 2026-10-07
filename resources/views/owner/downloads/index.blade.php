@extends('layouts.owner')

@section('title', 'Software & Drivers Management | Owner Portal')
@section('header_title', 'Software & Drivers Management')
@section('header_subtitle', 'Add, edit, or remove PLC & HMI software download links and cable drivers')

@section('content')
<div class="space-y-6">

    <!-- Header Banner & Action Button -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-glass-card p-6 rounded-2xl border border-brand-blue-light/20 shadow-xl">
        <div>
            <h3 class="text-xl font-serif font-bold text-white">Software Downloads Hub</h3>
            <p class="text-sm text-slate-400 mt-1">Items managed here automatically update live on <a href="{{ route('downloads') }}" target="_blank" class="text-brand-gold hover:underline">/downloads</a></p>
        </div>
        <a href="{{ route('owner.downloads.create') }}" class="px-6 py-3 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold text-sm rounded-xl transition-all duration-300 shadow-lg shadow-brand-gold/15 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Software Link
        </a>
    </div>

    <!-- Search & Filters -->
    <div class="bg-glass-card p-4 rounded-2xl border border-brand-blue-light/20 flex flex-col md:flex-row items-center justify-between gap-4">
        <form action="{{ route('owner.downloads.index') }}" method="GET" class="flex items-center gap-3 w-full md:w-auto flex-1">
            <div class="relative w-full max-w-md">
                <input type="text" name="search" placeholder="Search software title or description..." value="{{ request('search') }}"
                       class="w-full bg-slate-900/80 border border-slate-700/80 rounded-xl py-2.5 pl-4 pr-10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-brand-gold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
            @if(request()->filled('search') || request()->filled('category'))
                <a href="{{ route('owner.downloads.index') }}" class="text-xs text-brand-gold hover:underline">Clear Filters</a>
            @endif
        </form>
    </div>

    <!-- Downloads Table -->
    <div class="bg-glass-card border border-brand-blue-light/20 rounded-2xl overflow-hidden shadow-xl">
        @if($downloads->isEmpty())
            <div class="p-12 text-center text-slate-400">
                <p class="text-base font-semibold text-white">No software downloads found</p>
                <p class="text-xs text-slate-500 mt-1">Click "Add New Software Link" to create your first software download item.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/80 border-b border-brand-blue-light/20 text-slate-400 text-xs font-mono uppercase tracking-wider">
                            <th class="py-4 px-6">Title & Category</th>
                            <th class="py-4 px-6">Version & Size</th>
                            <th class="py-4 px-6">Direct Download Link</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-blue-light/10 text-sm">
                        @foreach($downloads as $item)
                        <tr class="hover:bg-brand-blue-light/5 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex flex-col">
                                    <span class="font-bold text-white text-base">{{ $item->title }}</span>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-brand-gold/15 text-brand-gold border border-brand-gold/30">
                                            {{ $item->badge }}
                                        </span>
                                        <span class="text-xs text-slate-400">{{ $item->category }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex flex-col text-xs font-mono text-slate-300">
                                    <span>{{ $item->version ?? 'N/A' }}</span>
                                    <span class="text-slate-500">{{ $item->file_size ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ $item->url }}" target="_blank" class="text-xs font-mono text-blue-400 hover:text-blue-300 underline max-w-xs truncate block" title="{{ $item->url }}">
                                    {{ $item->url }}
                                </a>
                                <span class="text-[10px] font-mono text-slate-500">{{ $item->file_name }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{ route('owner.downloads.toggle-active', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded-full text-xs font-bold transition-all duration-300 {{ $item->is_active ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 hover:bg-emerald-500/30' : 'bg-rose-500/20 text-rose-400 border border-rose-500/40 hover:bg-rose-500/30' }}">
                                        {{ $item->is_active ? 'Active' : 'Disabled' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('owner.downloads.edit', $item->id) }}" class="p-2 text-slate-400 hover:text-brand-gold hover:bg-slate-900 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>

                                    <form action="{{ route('owner.downloads.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this software download item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-slate-900 rounded-lg transition-colors" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($downloads->hasPages())
                <div class="p-4 border-t border-brand-blue-light/20">
                    {{ $downloads->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection
