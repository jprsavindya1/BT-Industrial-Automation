@extends('layouts.owner')

@section('title', 'Manage Testimonials | Owner Portal')

@section('content')
<div class="space-y-8">
    
    <!-- Title Section -->
    <div class="flex items-center justify-between pb-6 border-b border-brand-blue-light/35">
        <div>
            <h1 class="text-3xl font-serif font-bold text-white tracking-wide">Client Testimonials</h1>
            <p class="text-sm text-slate-400 mt-1">Review, approve, or delete customer testimonials displayed on the homepage.</p>
        </div>
    </div>

    <!-- Success Messages -->
    @if(session('success'))
        <div class="bg-emerald-950/40 border border-emerald-500/40 text-emerald-300 px-4 py-3 rounded-xl text-sm relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Testimonials Table Card -->
    <div class="bg-brand-blue-dark/30 border border-brand-blue-light/25 rounded-2xl overflow-hidden backdrop-blur-md">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-brand-blue-dark border-b border-brand-blue-light/35 text-slate-300 text-xs font-semibold uppercase tracking-wider">
                        <th class="px-6 py-4">Client</th>
                        <th class="px-6 py-4">Rating</th>
                        <th class="px-6 py-4">Review Message</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-blue-light/10 text-sm text-slate-300">
                    @forelse($testimonials as $t)
                        <tr class="hover:bg-brand-blue-light/10 transition-colors duration-200">
                            <!-- Client Info -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-white">{{ $t->name }}</div>
                                <div class="text-xs text-slate-400">
                                    {{ $t->role }}{{ $t->company ? ' • ' . $t->company : '' }}
                                </div>
                            </td>
                            <!-- Rating (Stars) -->
                            <td class="px-6 py-4">
                                <div class="flex items-center text-brand-gold gap-0.5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $t->rating ? 'fill-current' : 'text-slate-600 fill-none stroke-current' }}" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            </td>
                            <!-- Content -->
                            <td class="px-6 py-4 max-w-xs md:max-w-md lg:max-w-lg">
                                <p class="line-clamp-2 text-slate-300 text-xs leading-relaxed" title="{{ $t->content }}">
                                    {{ $t->content }}
                                </p>
                            </td>
                            <!-- Status Tag -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($t->is_approved)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        Approved
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <!-- Date -->
                            <td class="px-6 py-4 text-xs text-slate-400 whitespace-nowrap">
                                {{ $t->created_at->format('M d, Y') }}
                            </td>
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Toggle Approve Form -->
                                    <form action="{{ route('owner.testimonials.toggle-approve', $t->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-300 {{ $t->is_approved ? 'bg-amber-500/10 text-amber-400 hover:bg-amber-500/20 border border-amber-500/30' : 'bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 border border-emerald-500/30' }}">
                                            {{ $t->is_approved ? 'Retract' : 'Approve' }}
                                        </button>
                                    </form>

                                    <!-- Delete Form -->
                                    <form action="{{ route('owner.testimonials.destroy', $t->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to permanently delete this testimonial?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-500/10 text-rose-400 hover:bg-rose-500/20 border border-rose-500/30 transition-all duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                    <span>No testimonials found.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($testimonials->hasPages())
            <div class="px-6 py-4 bg-brand-blue-dark border-t border-brand-blue-light/35">
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
