@extends('layouts.app')

@section('title', $product->name . ' | BT Industrial Automation')

@section('content')
<div class="py-12 bg-slate-950">
    <div class="container mx-auto px-4">
        
        <!-- Back to Catalog -->
        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-brand-gold mb-8 transition-colors duration-300">
            &larr; Back to Products Catalog
        </a>

        <!-- Main Detail Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <!-- Left: Gallery & Slider -->
            <div class="flex flex-col gap-4">
                <!-- Main Image Preview -->
                <div class="relative bg-slate-900 border border-brand-blue-light/20 rounded-2xl overflow-hidden aspect-square flex items-center justify-center p-12">
                    <!-- Grid background -->
                    <div class="absolute inset-0 bg-dot-grid-lg"></div>
                    
                    @if($product->primary_image_url)
                        <img id="main-preview-image" src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain rounded-2xl relative z-10 transition-transform duration-300 hover:scale-105">
                    @else
                        <div class="w-40 h-40 text-slate-700 hover:text-brand-gold hover:scale-105 transition-all duration-300 relative z-10">
                            @if($product->category->slug == 'plcs-controllers')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            @elseif($product->category->slug == 'industrial-sensors')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            @elseif($product->category->slug == 'solar-solutions')
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                            @else
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            @endif
                        </div>
                    @endif

                    @if($product->is_featured)
                        <div class="absolute top-4 left-4 bg-brand-gold/10 border border-brand-gold/25 px-3 py-1 rounded text-[10px] text-brand-gold font-bold uppercase tracking-wider">
                            Featured Component
                        </div>
                    @endif
                    
                    <div class="absolute bottom-4 right-4 text-xs font-mono text-slate-500">
                        BT INTEGRATED SCHEMATICS &reg;
                    </div>
                </div>

                <!-- Thumbnails Grid -->
                @if($product->primary_image_url && $product->galleryImages->count() > 0)
                    <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-brand-blue-light scrollbar-track-transparent">
                        <!-- Primary Image Thumbnail -->
                        <div onclick="switchPreviewImage('{{ $product->primary_image_url }}', this)" 
                             class="gallery-thumbnail w-20 h-20 bg-slate-900 border-2 border-brand-gold rounded-xl overflow-hidden cursor-pointer flex items-center justify-center p-2 shrink-0 transition-all duration-300">
                            <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
                        </div>
                        <!-- Secondary Gallery Image Thumbnails -->
                        @foreach($product->galleryImages as $galleryImage)
                            @if(!$product->image || !\Illuminate\Support\Facades\Storage::disk('public')->exists($product->image))
                                @if($loop->first) @continue @endif
                            @endif
                            <div onclick="switchPreviewImage('{{ asset('storage/' . $galleryImage->image_path) }}', this)" 
                                 class="gallery-thumbnail w-20 h-20 bg-slate-900 border-2 border-transparent hover:border-brand-gold/50 rounded-xl overflow-hidden cursor-pointer flex items-center justify-center p-2 shrink-0 transition-all duration-300">
                                <img src="{{ asset('storage/' . $galleryImage->image_path) }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain">
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function switchPreviewImage(src, thumbnailEl) {
                            // Update main preview image source
                            const mainImg = document.getElementById('main-preview-image');
                            mainImg.src = src;

                            // Update thumbnail borders
                            document.querySelectorAll('.gallery-thumbnail').forEach(el => {
                                el.classList.remove('border-brand-gold');
                                el.classList.add('border-transparent');
                            });
                            thumbnailEl.classList.remove('border-transparent');
                            thumbnailEl.classList.add('border-brand-gold');
                        }
                    </script>
                @endif
            </div>

            <!-- Right: Info Panel -->
            <div class="flex flex-col justify-between">
                <div>
                    <span class="inline-block px-3 py-1 rounded bg-brand-blue-light/20 text-brand-blue-light border border-brand-blue-light/30 text-xs font-bold uppercase tracking-widest mb-4">
                        {{ $product->category->name }}
                    </span>
                    
                    <h1 class="text-3xl md:text-4xl font-serif font-bold text-white tracking-wide mb-3 leading-tight">
                        {{ $product->name }}
                    </h1>
                    
                    <div class="text-2xl font-bold text-brand-gold mb-6">
                        LKR {{ number_format($product->price, 2) }}
                    </div>

                    <div class="prose prose-invert max-w-none text-slate-400 text-sm leading-relaxed mb-8">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <!-- Call to Action Blocks -->
                <div class="space-y-6">
                    
                    <!-- WhatsApp Inquiry Button -->
                    <div>
                        <a href="{{ $whatsappUrl }}" target="_blank" 
                           class="w-full flex items-center justify-center gap-3 px-6 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-emerald-950/20 transform hover:-translate-y-0.5">
                            <!-- WhatsApp Icon -->
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.457L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.625 1.45 5.489 0 9.952-4.43 9.955-9.874.002-2.638-1.025-5.117-2.894-6.985C16.46 1.877 13.993 1.05 12.012 1.05c-5.495 0-9.958 4.43-9.961 9.874-.001 1.943.513 3.847 1.49 5.539l-.98 3.578 3.696-.959zM17.47 14.39c-.299-.149-1.778-.868-2.046-.967-.27-.099-.465-.148-.66.15-.195.297-.757.943-.928 1.14-.173.199-.347.223-.647.075-.3-.15-1.267-.462-2.41-1.47-1.018-.9-1.7-2.014-1.9-2.312-.2-.298-.02-.459.13-.608.134-.134.3-.347.45-.52.149-.174.199-.298.299-.497.1-.2.05-.375-.025-.524-.075-.15-.66-1.56-.9-2.14-.24-.575-.48-.497-.66-.507-.17-.01-.365-.01-.56-.01-.195 0-.51.074-.78.368-.27.298-1.025 1.002-1.025 2.443 0 1.44 1.05 2.829 1.199 3.028.15.198 2.067 3.125 5.006 4.394 2.099.907 2.862.99 3.874.84 1.023-.151 2.21-.902 2.52-1.773.31-.871.31-1.617.21-1.77-.098-.15-.36-.25-.66-.399z"/>
                            </svg>
                            Inquire via WhatsApp
                        </a>
                        <p class="text-xs text-slate-500 text-center mt-2">Clicking will open WhatsApp and pre-fill details for this component.</p>
                    </div>

                    <!-- Quick Call / Contact Info Card -->
                    <div class="bg-brand-blue-dark/30 border border-brand-blue-light/20 p-6 rounded-xl flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-slate-900 rounded-full flex items-center justify-center text-brand-gold border border-brand-gold/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-semibold">Prefer a direct call?</h4>
                                <p class="text-xs text-slate-500">Contact our sales team directly</p>
                            </div>
                        </div>
                        <a href="tel:+94703850140" class="text-brand-gold font-mono font-bold text-sm hover:underline">
                            +94 70 385 0140
                        </a>
                    </div>

                </div>
            </div>

        </div>

        <!-- Technical Specifications Tab -->
        @if($product->specifications)
            <div class="bg-brand-blue-dark/10 border border-brand-blue-light/10 p-8 rounded-2xl mb-16">
                <h3 class="text-xl font-serif font-bold text-white mb-6 border-b border-brand-blue-light/20 pb-3 flex items-center gap-2">
                    <svg class="w-5 h-5 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Technical Specifications
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4">
                    @foreach($product->specifications as $label => $value)
                        <div class="flex items-center justify-between border-b border-brand-blue-light/10 pb-3 text-sm">
                            <span class="text-slate-400 font-medium">{{ $label }}</span>
                            <span class="text-white font-mono font-semibold text-right">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Related Products Section -->
        @if(!$relatedProducts->isEmpty())
            <div>
                <h3 class="text-2xl font-serif font-bold text-white mb-8">Related Components</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $rel)
                        <div class="bg-glass-card hover-glass-card rounded-xl overflow-hidden flex flex-col justify-between group">
                            
                            @if($rel->image)
                                <div class="h-40 bg-slate-900 relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                                    <img src="{{ asset('storage/' . $rel->image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                                </div>
                            @else
                                <div class="h-40 bg-slate-900 flex items-center justify-center relative group-hover:bg-slate-950 transition-all duration-300 overflow-hidden animate-shimmer">
                                    <div class="absolute inset-0 bg-dot-grid"></div>
                                    <div class="w-16 h-16 text-slate-700 group-hover:text-brand-gold transition-colors duration-300">
                                        @if($rel->category->slug == 'plcs-controllers')
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        @elseif($rel->category->slug == 'industrial-sensors')
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        @elseif($rel->category->slug == 'solar-solutions')
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 3v1m0 16v1m9-9h-1M4 12H3M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                                        @else
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="p-5 flex flex-col justify-between flex-grow">
                                <h4 class="text-white font-serif font-semibold text-sm leading-snug group-hover:text-brand-gold transition-colors duration-300">
                                    <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                                </h4>
                                <div class="mt-4 pt-3 border-t border-brand-blue-light/10 flex items-center justify-between">
                                    <span class="text-brand-gold font-bold text-sm">LKR {{ number_format($rel->price, 2) }}</span>
                                    <a href="{{ route('products.show', $rel->slug) }}" class="text-[10px] text-slate-400 hover:text-brand-gold font-semibold uppercase tracking-wider">Details &rarr;</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
