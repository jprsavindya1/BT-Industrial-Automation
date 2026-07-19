@extends('layouts.owner')

@section('title', 'Manage Products | BT Industrial Automation')
@section('header_title', 'Manage Products')
@section('header_subtitle', 'Add, modify or delete catalog items')

@section('header_actions')
<a href="{{ route('owner.products.create') }}" class="px-4 py-2 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold rounded-lg text-sm transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2 shadow-lg shadow-brand-gold/10">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
    Add Product
</a>
@endsection

@section('content')
<div class="space-y-6">

    <!-- Search and Filter Bar -->
    <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 p-6 rounded-2xl">
        <form action="{{ route('owner.products.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4 justify-between">
            <div class="w-full md:w-1/2 flex flex-col md:flex-row items-center gap-4">
                <!-- Search Input -->
                <div class="w-full relative">
                    <input type="text" name="search" placeholder="Search products..." 
                           value="{{ request('search') }}"
                           class="w-full bg-brand-blue-light/30 border border-brand-blue-light/80 rounded-xl py-2.5 pl-4 pr-10 text-sm text-slate-100 placeholder-slate-400 focus:outline-none focus:border-brand-gold focus:ring-1 focus:ring-brand-gold transition-all duration-300">
                </div>
                
                <!-- Category Select -->
                <div class="w-full md:w-72">
                    <select name="category" 
                            class="w-full bg-brand-blue-light/30 border border-brand-blue-light/80 rounded-xl py-2.5 px-4 text-sm text-white focus:outline-none focus:border-brand-gold transition-all duration-300">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="w-full md:w-auto flex items-center gap-3 justify-end">
                @if(request('search') || request('category'))
                    <a href="{{ route('owner.products.index') }}" class="text-xs text-slate-400 hover:text-brand-gold font-semibold transition-colors duration-300">
                        Clear Filters
                    </a>
                @endif
                <button type="submit" class="px-6 py-2.5 bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold text-xs rounded-xl transition-all duration-300">
                    Apply Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 rounded-2xl overflow-hidden">
        @if($products->isEmpty())
            <div class="p-12 text-center text-slate-500 text-sm">
                No products found matching your selection.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/60 border-b border-brand-blue-light/20 text-slate-400 text-xs uppercase font-semibold">
                            <th class="py-4 px-6 w-16">Preview</th>
                            <th class="py-4 px-6">Product</th>
                            <th class="py-4 px-6">Category</th>
                            <th class="py-4 px-6">Price</th>
                            <th class="py-4 px-6">Featured</th>
                            <th class="py-4 px-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-blue-light/10 text-sm">
                        @foreach($products as $prod)
                            <tr class="hover:bg-brand-blue-light/5 transition-colors">
                                <!-- Image Preview -->
                                <td class="py-4 px-6">
                                    <div class="w-10 h-10 bg-slate-900 border border-brand-blue-light/60 rounded flex items-center justify-center overflow-hidden">
                                        @if($prod->primary_image_url)
                                            <img src="{{ $prod->primary_image_url }}" alt="Thumb" class="w-full h-full object-contain">
                                        @else
                                            <div class="text-brand-gold shrink-0">
                                                @if($prod->category->slug == 'plcs-controllers')
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                @elseif($prod->category->slug == 'industrial-sensors')
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                                @elseif($prod->category->slug == 'solar-solutions')
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                                                @else
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                
                                <!-- Product Name -->
                                <td class="py-4 px-6">
                                    <div class="font-semibold text-white">{{ $prod->name }}</div>
                                    <div class="text-[10px] text-slate-500 font-mono mt-0.5">{{ $prod->slug }}</div>
                                </td>
                                
                                <!-- Category -->
                                <td class="py-4 px-6 text-slate-400">
                                    <span class="inline-block px-2.5 py-0.5 rounded-full bg-brand-blue-light/30 border border-brand-blue-light/50 text-xs">
                                        {{ $prod->category->name }}
                                    </span>
                                </td>
                                
                                <!-- Price -->
                                <td class="py-4 px-6 font-mono text-brand-gold">LKR {{ number_format($prod->price, 2) }}</td>
                                
                                <!-- Featured status -->
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
                                
                                <!-- Action Buttons -->
                                <td class="py-4 px-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('owner.products.edit', $prod->id) }}" class="inline-flex items-center gap-1 text-xs bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold px-2.5 py-1.5 rounded-lg transition-all duration-300">
                                            Edit
                                        </a>
                                        <form action="{{ route('owner.products.destroy', $prod->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 text-xs bg-red-950/20 border border-red-900/50 hover:bg-red-900 text-red-300 hover:text-white font-bold px-2.5 py-1.5 rounded-lg transition-all duration-300">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Grid -->
            @if($products->hasPages())
                <div class="p-6 border-t border-brand-blue-light/10">
                    {{ $products->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection
