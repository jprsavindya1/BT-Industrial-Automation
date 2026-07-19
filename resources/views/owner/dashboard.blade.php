@extends('layouts.owner')

@section('title', 'Dashboard Overview | BT Industrial Automation')
@section('header_title', 'Dashboard Overview')
@section('header_subtitle', 'System overview and quick controls for BT Industrial Automation')

@section('header_actions')
<div class="flex items-center gap-3">
    <a href="{{ route('owner.products.create') }}" class="px-4 py-2 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold rounded-lg text-sm transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2 shadow-lg shadow-brand-gold/10">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        New Product
    </a>
</div>
@endsection

@section('content')
<div class="space-y-8">
    
    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Total Products Card -->
        <div class="bg-glass-card hover-glass-card p-6 rounded-2xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-dot-grid"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Catalog Products</span>
                    <h3 class="text-3xl font-serif font-bold text-white mt-2">{{ $productsCount }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-slate-900 border border-brand-blue-light/50 flex items-center justify-center text-brand-gold group-hover:bg-brand-gold group-hover:text-slate-950 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="mt-4 text-xs text-slate-500">
                <a href="{{ route('owner.products.index') }}" class="hover:underline flex items-center gap-1">Manage Products &rarr;</a>
            </div>
        </div>

        <!-- Featured Products Card -->
        <div class="bg-glass-card hover-glass-card p-6 rounded-2xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-dot-grid"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Featured Items</span>
                    <h3 class="text-3xl font-serif font-bold text-white mt-2">{{ $featuredCount }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-slate-900 border border-brand-blue-light/50 flex items-center justify-center text-brand-gold group-hover:bg-brand-gold group-hover:text-slate-950 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"></path></svg>
                </div>
            </div>
            <div class="mt-4 text-xs text-slate-500">
                Showcased on the homepage hero grids.
            </div>
        </div>

        <!-- Total Categories Card -->
        <div class="bg-glass-card hover-glass-card p-6 rounded-2xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-dot-grid"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Product Categories</span>
                    <h3 class="text-3xl font-serif font-bold text-white mt-2">{{ $categoriesCount }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-slate-900 border border-brand-blue-light/50 flex items-center justify-center text-brand-gold group-hover:bg-brand-gold group-hover:text-slate-950 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <div class="mt-4 text-xs text-slate-500">
                <a href="{{ route('owner.categories.index') }}" class="hover:underline flex items-center gap-1">Manage Categories &rarr;</a>
            </div>
        </div>

        <!-- Total Inquiries Card -->
        <div class="bg-glass-card hover-glass-card p-6 rounded-2xl relative overflow-hidden group">
            <div class="absolute inset-0 bg-dot-grid"></div>
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Customer Inquiries</span>
                    <div class="flex items-baseline gap-2 mt-2">
                        <h3 class="text-3xl font-serif font-bold text-white">{{ $inquiriesCount }}</h3>
                        @if($unreadInquiriesCount > 0)
                            <span class="text-[10px] font-bold text-slate-950 bg-brand-gold px-2 py-0.5 rounded-full">
                                {{ $unreadInquiriesCount }} new
                            </span>
                        @endif
                    </div>
                </div>
                <div class="w-12 h-12 rounded-xl bg-slate-900 border border-brand-blue-light/50 flex items-center justify-center text-brand-gold group-hover:bg-brand-gold group-hover:text-slate-950 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <div class="mt-4 text-xs text-slate-500">
                <a href="{{ route('owner.inquiries.index') }}" class="hover:underline flex items-center gap-1">Manage Messages &rarr;</a>
            </div>
        </div>

    </div>

    <!-- Recent Products Table Section -->
    <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-brand-blue-light/25 flex items-center justify-between">
            <h4 class="font-serif font-bold text-lg text-white">Recently Added Products</h4>
            <a href="{{ route('owner.products.index') }}" class="text-xs font-semibold text-brand-gold hover:underline">View All &rarr;</a>
        </div>
        
        @if($latestProducts->isEmpty())
            <div class="p-12 text-center text-slate-500 text-sm">
                No products added yet. Click <a href="{{ route('owner.products.create') }}" class="text-brand-gold hover:underline">here</a> to add your first product.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/60 border-b border-brand-blue-light/20 text-slate-400 text-xs uppercase font-semibold">
                            <th class="py-4 px-6">Product</th>
                            <th class="py-4 px-6">Category</th>
                            <th class="py-4 px-6">Price</th>
                            <th class="py-4 px-6">Featured</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-blue-light/10 text-sm">
                        @foreach($latestProducts as $prod)
                            <tr class="hover:bg-brand-blue-light/5 transition-colors">
                                <td class="py-4 px-6 font-semibold text-white">{{ $prod->name }}</td>
                                <td class="py-4 px-6 text-slate-400">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-brand-blue-light/30 border border-brand-blue-light/50 text-xs">
                                        {{ $prod->category->name }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 font-mono text-brand-gold">LKR {{ number_format($prod->price, 2) }}</td>
                                <td class="py-4 px-6">
                                    @if($prod->is_featured)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brand-gold/10 border border-brand-gold/30 text-brand-gold text-xs font-semibold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-brand-gold"></span>
                                            Yes
                                        </span>
                                    @else
                                        <span class="text-slate-500 text-xs">No</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="{{ route('owner.products.edit', $prod->id) }}" class="inline-flex items-center gap-1 text-xs bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold px-3 py-1.5 rounded-lg transition-all duration-300">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Recent Inquiries Section -->
    <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 rounded-2xl overflow-hidden mt-8">
        <div class="p-6 border-b border-brand-blue-light/25 flex items-center justify-between">
            <h4 class="font-serif font-bold text-lg text-white">Recent Customer Inquiries</h4>
            <a href="{{ route('owner.inquiries.index') }}" class="text-xs font-semibold text-brand-gold hover:underline">View All &rarr;</a>
        </div>
        
        @if($latestInquiries->isEmpty())
            <div class="p-12 text-center text-slate-500 text-sm">
                No customer inquiries received yet.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/60 border-b border-brand-blue-light/20 text-slate-400 text-xs uppercase font-semibold">
                            <th class="py-4 px-6">Sender</th>
                            <th class="py-4 px-6">Contact Info</th>
                            <th class="py-4 px-6">Snippet</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-blue-light/10 text-sm">
                        @foreach($latestInquiries as $inq)
                            <tr class="hover:bg-brand-blue-light/5 transition-colors {{ !$inq->is_read ? 'font-semibold text-white bg-brand-blue-light/5' : 'text-slate-300' }}">
                                <td class="py-4 px-6 text-white">{{ $inq->name }}</td>
                                <td class="py-4 px-6 text-slate-400 font-mono text-xs">
                                    <div>{{ $inq->email }}</div>
                                    @if($inq->phone)
                                        <div class="mt-0.5">{{ $inq->phone }}</div>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-slate-400 max-w-xs truncate">
                                    {{ Str::limit($inq->message, 60) }}
                                </td>
                                <td class="py-4 px-6">
                                    @if(!$inq->is_read)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brand-gold/10 border border-brand-gold/30 text-brand-gold text-xs font-semibold">
                                            New
                                        </span>
                                    @else
                                        <span class="text-slate-500 text-xs">Read</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end items-center gap-2">
                                        <form action="{{ route('owner.inquiries.toggle-read', $inq->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="text-xs bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold px-2.5 py-1.5 rounded-lg transition-all duration-300 cursor-pointer">
                                                {{ $inq->is_read ? 'Mark Unread' : 'Mark Read' }}
                                            </button>
                                        </form>
                                        <a href="{{ route('owner.inquiries.index') }}" class="text-xs bg-brand-blue-light/20 hover:bg-brand-gold hover:text-slate-950 text-white font-bold px-2.5 py-1.5 rounded-lg transition-all duration-300">
                                            View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
