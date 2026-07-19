@extends('layouts.app')

@section('title', 'Products Catalog | BT Industrial Automation')

@section('content')
<div class="py-12 bg-slate-950">
    <div class="container mx-auto px-4">
        
        <!-- Breadcrumb / Header -->
        <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-serif font-bold text-white tracking-wide">
                    @if(request('category'))
                        {{ $categories->firstWhere('slug', request('category'))->name ?? 'Products Catalog' }}
                    @else
                        Products Catalog
                    @endif
                </h1>
                <p class="text-slate-400 text-sm mt-1">
                    Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} components
                </p>
            </div>

            <!-- Search Status / Filters Clear -->
            @if(request('search') || request('category') || request('min_price') || request('max_price') || request('featured'))
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-xs bg-brand-gold/10 hover:bg-brand-gold/20 border border-brand-gold/30 text-brand-gold font-bold px-4 py-2 rounded-full transition-all duration-300">
                    Clear Active Filters
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Sidebar: Advanced Filter Form -->
            <aside class="space-y-6">
                <form action="{{ route('products.index') }}" method="GET" class="space-y-6">
                    <!-- Maintain active search query -->
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <!-- Categories Filter Card -->
                    <div class="bg-brand-blue-dark/30 border border-brand-blue-light/20 p-6 rounded-xl">
                        <h3 class="text-white font-serif font-bold text-lg mb-4 pb-2 border-b border-brand-blue-light/20">Categories</h3>
                        
                        <!-- Hidden input for category selection in the form submit -->
                        <input type="hidden" id="filter-category" name="category" value="{{ request('category') }}">
                        
                        <div class="space-y-2">
                            <button type="button" onclick="selectCategory('')" 
                                    class="w-full text-left py-1.5 px-3 rounded text-sm transition-all duration-300 {{ !request('category') ? 'bg-brand-gold text-slate-950 font-bold' : 'text-slate-300 hover:text-brand-gold hover:bg-brand-blue-light/20' }}">
                                All Categories
                            </button>
                            @foreach($categories as $cat)
                                <button type="button" onclick="selectCategory('{{ $cat->slug }}')" 
                                        class="w-full text-left py-1.5 px-3 rounded text-sm transition-all duration-300 {{ request('category') == $cat->slug ? 'bg-brand-gold text-slate-950 font-bold' : 'text-slate-300 hover:text-brand-gold hover:bg-brand-blue-light/20' }}">
                                    {{ $cat->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Filter Card -->
                    <div class="bg-brand-blue-dark/30 border border-brand-blue-light/20 p-6 rounded-xl">
                        <h3 class="text-white font-serif font-bold text-lg mb-4 pb-2 border-b border-brand-blue-light/20">Price Range</h3>
                        <div class="space-y-4">
                            <div class="flex gap-2 items-center">
                                <div class="flex-grow">
                                    <label for="min_price" class="sr-only">Min Price</label>
                                    <input type="number" id="min_price" name="min_price" placeholder="Min" 
                                           value="{{ request('min_price') }}"
                                           class="w-full bg-brand-blue-light/20 border border-brand-blue-light/60 rounded-lg py-1.5 px-3 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold">
                                </div>
                                <span class="text-slate-500 text-xs">-</span>
                                <div class="flex-grow">
                                    <label for="max_price" class="sr-only">Max Price</label>
                                    <input type="number" id="max_price" name="max_price" placeholder="Max" 
                                           value="{{ request('max_price') }}"
                                           class="w-full bg-brand-blue-light/20 border border-brand-blue-light/60 rounded-lg py-1.5 px-3 text-xs text-slate-100 placeholder-slate-500 focus:outline-none focus:border-brand-gold">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Featured Items Card -->
                    <div class="bg-brand-blue-dark/30 border border-brand-blue-light/20 p-6 rounded-xl">
                        <div class="flex items-center justify-between">
                            <label for="featured" class="text-slate-300 text-sm font-semibold cursor-pointer">Featured Products Only</label>
                            <input type="checkbox" id="featured" name="featured" value="1" {{ request('featured') == '1' ? 'checked' : '' }}
                                   class="w-4 h-4 rounded border-brand-blue-light/60 bg-brand-blue-light/20 text-brand-gold focus:ring-brand-gold focus:ring-opacity-25 focus:ring-offset-0 focus:outline-none cursor-pointer">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button type="submit" class="flex-grow py-2.5 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-bold text-xs rounded-full transition-colors duration-300 shadow-md">
                            Apply Filters
                        </button>
                        @if(request('category') || request('min_price') || request('max_price') || request('featured') || request('search'))
                            <a href="{{ route('products.index') }}" class="py-2.5 px-4 bg-brand-blue-light/20 hover:bg-brand-blue-light/35 border border-brand-blue-light text-white font-semibold text-xs rounded-full transition-colors duration-300 flex items-center justify-center">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                <script>
                    function selectCategory(slug) {
                        document.getElementById('filter-category').value = slug;
                        document.getElementById('filter-category').form.submit();
                    }
                </script>
            </aside>

            <!-- Products List -->
            <div class="lg:col-span-3">
                @if($products->isEmpty())
                    <div class="bg-brand-blue-dark/20 border border-brand-blue-light/10 text-center py-20 rounded-xl">
                        <svg class="w-16 h-16 text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-xl font-serif font-bold text-white mb-2">No Products Found</h3>
                        <p class="text-slate-400 text-sm">We couldn't find any products matching your selection.</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-6 px-6 py-2 bg-brand-gold hover:bg-brand-gold-dark text-slate-950 font-semibold rounded-full text-xs transition-colors duration-300">
                            View All Products
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-glass-card hover-glass-card rounded-xl overflow-hidden flex flex-col justify-between group">
                                
                                @if($product->primary_image_url)
                                    <div class="h-44 bg-slate-900 relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                                        <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                        @if($product->is_featured)
                                            <div class="absolute top-3 left-3 bg-brand-gold/10 border border-brand-gold/25 px-2 py-0.5 rounded text-[8px] text-brand-gold font-bold uppercase tracking-wider z-20">
                                                Featured
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="h-44 bg-slate-900 flex items-center justify-center relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                                        <div class="absolute inset-0 bg-dot-grid"></div>
                                        <div class="w-20 h-20 text-slate-700 group-hover:text-brand-gold transition-colors duration-300 relative z-10">
                                            @if($product->category->slug == 'plcs-controllers')
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            @elseif($product->category->slug == 'industrial-sensors')
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            @elseif($product->category->slug == 'solar-solutions')
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                                            @else
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                            @endif
                                        </div>
                                        @if($product->is_featured)
                                            <div class="absolute top-3 left-3 bg-brand-gold/10 border border-brand-gold/25 px-2 py-0.5 rounded text-[8px] text-brand-gold font-bold uppercase tracking-wider z-20">
                                                Featured
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <!-- Product Info -->
                                <div class="p-6 flex flex-col justify-between flex-grow">
                                    <div>
                                        <span class="text-[10px] text-slate-500 uppercase tracking-widest font-semibold block mb-1">
                                            {{ $product->category->name }}
                                        </span>
                                        <h3 class="text-white font-serif font-semibold text-base leading-snug group-hover:text-brand-gold transition-colors duration-300">
                                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <p class="text-xs text-slate-400 mt-2 line-clamp-2 leading-relaxed">
                                            {{ $product->description }}
                                        </p>
                                    </div>

                                    <div class="mt-6 pt-4 border-t border-brand-blue-light/10 flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <span class="text-[8px] text-slate-500 font-semibold uppercase">Price</span>
                                            <span class="text-brand-gold font-bold text-base">
                                                LKR {{ number_format($product->price, 2) }}
                                            </span>
                                        </div>
                                        <a href="{{ route('products.show', $product->slug) }}" class="px-3.5 py-1.5 bg-brand-blue-light/20 hover:bg-brand-gold hover:text-slate-950 text-white text-xs font-bold rounded-lg transition-all duration-300 border border-brand-blue-light/50 hover:border-brand-gold">
                                            Details
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
