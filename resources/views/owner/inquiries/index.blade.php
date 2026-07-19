@extends('layouts.owner')

@section('title', 'Customer Inquiries | BT Industrial Automation')
@section('header_title', 'Customer Inquiries')
@section('header_subtitle', 'Review and respond to messages submitted via the Contact Us form')

@section('content')
<div class="space-y-6">

    <!-- Filters Toolbar -->
    <div class="flex flex-wrap items-center justify-between gap-4 bg-brand-blue-dark/20 border border-brand-blue-light/20 p-4 rounded-xl">
        <div class="flex items-center gap-2">
            <a href="{{ route('owner.inquiries.index', ['filter' => 'all']) }}" 
               class="px-4 py-2 text-xs font-semibold rounded-lg transition-all duration-300 {{ $filter === 'all' ? 'bg-brand-gold text-slate-950 font-bold' : 'text-slate-400 hover:bg-brand-blue-light/20 hover:text-white' }}">
                All Messages
            </a>
            <a href="{{ route('owner.inquiries.index', ['filter' => 'unread']) }}" 
               class="px-4 py-2 text-xs font-semibold rounded-lg transition-all duration-300 flex items-center gap-1.5 {{ $filter === 'unread' ? 'bg-brand-gold text-slate-950 font-bold' : 'text-slate-400 hover:bg-brand-blue-light/20 hover:text-white' }}">
                <span>Unread</span>
                @php
                    $count = \App\Models\Inquiry::where('is_read', false)->count();
                @endphp
                @if($count > 0)
                    <span class="px-1.5 py-0.5 text-[9px] rounded-full {{ $filter === 'unread' ? 'bg-slate-950 text-brand-gold' : 'bg-brand-gold text-slate-950' }}">
                        {{ $count }}
                    </span>
                @endif
            </a>
            <a href="{{ route('owner.inquiries.index', ['filter' => 'read']) }}" 
               class="px-4 py-2 text-xs font-semibold rounded-lg transition-all duration-300 {{ $filter === 'read' ? 'bg-brand-gold text-slate-950 font-bold' : 'text-slate-400 hover:bg-brand-blue-light/20 hover:text-white' }}">
                Read Messages
            </a>
        </div>
        <div class="text-xs text-slate-500 font-mono">
            Showing {{ $inquiries->firstItem() ?? 0 }} - {{ $inquiries->lastItem() ?? 0 }} of {{ $inquiries->total() }} entries
        </div>
    </div>

    <!-- Inquiries List -->
    @if($inquiries->isEmpty())
        <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 text-center py-20 rounded-2xl">
            <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 19v-8.93a2 2 0 01.89-1.664l8-5.333a2 2 0 012.22 0l8 5.333A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-2.25-1.5a2 2 0 00-2.22 0l-2.25 1.5"></path>
            </svg>
            <h3 class="text-xl font-serif font-bold text-white mb-2">No Inquiries Found</h3>
            <p class="text-slate-400 text-sm">There are no messages matching the selected filter.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($inquiries as $inq)
                <div class="bg-glass-card border rounded-2xl p-6 transition-all duration-300 relative overflow-hidden group {{ !$inq->is_read ? 'border-brand-gold bg-brand-gold/[0.02] shadow-[0_0_15px_rgba(255,178,0,0.05)]' : 'border-brand-blue-light/20' }}">
                    
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 relative z-10 border-b border-brand-blue-light/10 pb-4 mb-4">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-bold text-white">{{ $inq->name }}</h3>
                                @if(!$inq->is_read)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brand-gold/10 border border-brand-gold/30 text-brand-gold text-[10px] font-bold uppercase tracking-wider">
                                        New Message
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex flex-wrap items-center gap-y-1 gap-x-4 text-xs text-slate-400 mt-1">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    {{ $inq->email }}
                                </span>
                                @if($inq->phone)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        {{ $inq->phone }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-3 shrink-0">
                            <!-- Toggle Read Form -->
                            <form action="{{ route('owner.inquiries.toggle-read', $inq->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-1.5 text-xs bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold px-3 py-2 rounded-xl transition-all duration-300 cursor-pointer">
                                    @if($inq->is_read)
                                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l8-5.333a2 2 0 012.22 0l8 5.333A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5"></path></svg>
                                        Mark Unread
                                    @else
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Mark Read
                                    @endif
                                </button>
                            </form>

                            <!-- Delete Form -->
                            <form action="{{ route('owner.inquiries.destroy', $inq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this inquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 text-xs bg-red-950/20 border border-red-900/50 hover:bg-red-900 text-red-300 hover:text-white font-bold px-3 py-2 rounded-xl transition-all duration-300 cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="relative z-10 text-slate-300 text-sm leading-relaxed whitespace-pre-line bg-slate-950/40 p-5 border border-brand-blue-light/10 rounded-xl">
                        {{ $inq->message }}
                    </div>

                    <!-- Footer Details -->
                    <div class="flex justify-between items-center text-[10px] text-slate-500 font-mono mt-4 relative z-10">
                        <span>INQUIRY ID: #{{ str_pad($inq->id, 5, '0', STR_PAD_LEFT) }}</span>
                        <span>SUBMITTED AT: {{ $inq->created_at->setTimezone('Asia/Colombo')->format('Y-m-d h:i A') }}</span>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $inquiries->links() }}
        </div>
    @endif

</div>
@endsection
