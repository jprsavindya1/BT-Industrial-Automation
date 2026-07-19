@csrf

<!-- CropperJS CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Category selection -->
        <div>
            <label for="category_id" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Category</label>
            <select id="category_id" name="category_id" required 
                    class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
                <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Select a Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', isset($product) ? $product->category_id : '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Product Name -->
        <div>
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Product Name</label>
            <input id="name" name="name" type="text" required 
                   value="{{ old('name', isset($product) ? $product->name : '') }}"
                   class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300"
                   placeholder="e.g. Siemens SIMATIC S7-1200 PLC">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Price -->
        <div>
            <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Price (LKR)</label>
            <input id="price" name="price" type="number" step="0.01" min="0" required 
                   value="{{ old('price', isset($product) ? $product->price : '') }}"
                   class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300"
                   placeholder="e.g. 68500.00">
        </div>

        <!-- Primary Product Image -->
        <div>
            <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Primary Product Image</label>
            <input id="image" name="image" type="file" accept="image/*"
                   class="appearance-none rounded-xl block w-full px-4 py-2.5 bg-brand-blue-light/30 border border-brand-blue-light/80 text-slate-400 focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
            <input type="hidden" name="cropped_primary_image" id="cropped_primary_image">
            <span class="text-[10px] text-slate-500">Optional. Upload a high-quality primary photo. You will be prompted to crop and preview.</span>
            
            <div id="cropped-preview-container" class="hidden mt-3 flex items-center gap-3 bg-slate-900/60 p-3 rounded-lg border border-brand-gold/40">
                <img id="cropped-preview-thumbnail" src="" alt="Cropped Preview" class="w-12 h-12 object-cover rounded border border-brand-gold/20">
                <div class="flex flex-col">
                    <span class="text-xs font-semibold text-brand-gold">Cropped Image Loaded</span>
                    <span class="text-[10px] text-slate-400">Will be saved upon form submission</span>
                </div>
            </div>

            @if(isset($product) && $product->primary_image_url)
                <div id="current-image-preview-box" class="mt-3 flex items-center gap-3 bg-slate-900/60 p-3 rounded-lg border border-brand-blue-light/40">
                    <img src="{{ $product->primary_image_url }}" alt="Preview" class="w-12 h-12 object-contain rounded">
                    <span class="text-xs text-slate-400">Current Image: {{ basename($product->image ?? $product->primary_image_url) }}</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Gallery Images Row -->
    <div class="space-y-3">
        <div>
            <label for="gallery" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Product Gallery Images</label>
            <input id="gallery" name="gallery[]" type="file" accept="image/*" multiple
                   class="appearance-none rounded-xl block w-full px-4 py-2.5 bg-brand-blue-light/30 border border-brand-blue-light/80 text-slate-400 focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
            <span class="text-[10px] text-slate-500">Optional. Upload multiple additional gallery photos (JPG, PNG, WebP up to 2MB each).</span>
        </div>

        @if(isset($product) && $product->galleryImages->count() > 0)
            <div class="mt-4">
                <span class="text-xs font-semibold text-slate-400 block mb-2">Current Gallery:</span>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-slate-900/60 p-4 rounded-xl border border-brand-blue-light/40">
                    @foreach($product->galleryImages as $galleryImage)
                        <div id="gallery-image-{{ $galleryImage->id }}" class="relative group aspect-square bg-brand-blue-dark rounded-lg overflow-hidden border border-brand-blue-light/30 transition-all duration-300">
                            <img src="{{ asset('storage/' . $galleryImage->image_path) }}" alt="Gallery Image" class="w-full h-full object-contain p-1">
                            <button type="button" onclick="deleteGalleryImage({{ $galleryImage->id }})" 
                                    class="absolute top-1.5 right-1.5 p-1 bg-red-950/80 border border-red-900/50 hover:bg-red-900 text-red-300 hover:text-white rounded-lg shadow transition-colors duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Description</label>
        <textarea id="description" name="description" rows="4" required
                  class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300"
                  placeholder="Detailed explanation of the product features, connectivity, and hardware... Control details...">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
    </div>

    <!-- Featured Switch -->
    <div class="flex items-center">
        <input id="is_featured" name="is_featured" type="checkbox" value="1"
               {{ old('is_featured', isset($product) && $product->is_featured) ? 'checked' : '' }}
               class="h-4 w-4 text-brand-gold focus:ring-brand-gold border-brand-blue-light/80 bg-brand-blue-light/30 rounded">
        <label for="is_featured" class="ml-2 block text-sm text-slate-300">
            Featured Component (Showcase on the homepage)
        </label>
    </div>

    <!-- Technical Specifications Dynamic Builder -->
    <div class="pt-6 border-t border-brand-blue-light/20">
        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">Technical Specifications</label>
        <div id="specs-container" class="space-y-3">
            <!-- Dynamic rows will be inserted here -->
        </div>
        <button type="button" onclick="addSpecRow()" 
                class="mt-3 text-xs bg-slate-900 border border-brand-gold/30 hover:border-brand-gold text-brand-gold hover:bg-brand-gold hover:text-slate-950 font-bold px-4 py-2 rounded-xl transition-all duration-300">
            + Add Specification Row
        </button>
    </div>
</div>

<script>
    function addSpecRow(key = '', value = '') {
        const container = document.getElementById('specs-container');
        const rowId = 'row-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        const html = `
            <div id="${rowId}" class="flex items-center gap-3">
                <input type="text" name="spec_keys[]" value="${key}" placeholder="Specification Label (e.g. Manufacturer)" required
                       class="appearance-none rounded-xl block w-1/2 px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
                <input type="text" name="spec_values[]" value="${value}" placeholder="Specification Value (e.g. Siemens)" required
                       class="appearance-none rounded-xl block w-1/2 px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
                <button type="button" onclick="document.getElementById('${rowId}').remove()" class="text-red-500 hover:text-red-400 p-2 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', html);
    }

    function deleteGalleryImage(id) {
        if (!confirm('Are you sure you want to delete this gallery image?')) return;

        const csrfToken = document.querySelector('input[name="_token"]').value;
        const container = document.getElementById(`gallery-image-${id}`);

        fetch(`/owner/products/gallery-image/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                container.classList.add('scale-95', 'opacity-0');
                setTimeout(() => container.remove(), 300);
            } else {
                alert('Failed to delete image. Please try again.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('An error occurred while deleting the image.');
        });
    }

    // Initialize with existing specifications if in Edit mode
    document.addEventListener('DOMContentLoaded', function() {
        @if(isset($product) && $product->specifications)
            @foreach($product->specifications as $key => $val)
                addSpecRow('{!! addslashes($key) !!}', '{!! addslashes($val) !!}');
            @endforeach
        @else
            // Add a single blank row by default for user convenience
            addSpecRow();
        @endif
    });
</script>

<!-- Crop Modal HTML -->
<div id="crop-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 backdrop-blur-md p-4">
    <div class="bg-brand-blue-dark border border-brand-blue-light/50 w-full max-w-4xl rounded-2xl overflow-hidden shadow-2xl flex flex-col max-h-[90vh]">
        <!-- Modal Header -->
        <div class="p-5 border-b border-brand-blue-light/25 flex justify-between items-center bg-slate-900/40">
            <div>
                <h3 class="text-base font-serif font-bold text-white">Adjust Product Photo</h3>
                <p class="text-xs text-slate-400">Crop, zoom, or rotate to fit the product card perfectly</p>
            </div>
            <button type="button" id="crop-cancel-btn-top" class="text-slate-400 hover:text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto flex-grow grid grid-cols-1 md:grid-cols-5 gap-6">
            <!-- Left: Cropper Area (Col-span 3) -->
            <div class="md:col-span-3 flex flex-col justify-between space-y-4">
                <div class="relative bg-slate-950 rounded-xl overflow-hidden border border-brand-blue-light/25 flex items-center justify-center min-h-[300px] max-h-[400px]">
                    <img id="crop-image-element" style="max-height: 380px; display: block; max-width: 100%;">
                </div>
                
                <!-- Cropper controls -->
                <div class="flex flex-wrap items-center justify-center gap-2 bg-slate-900/60 p-2.5 rounded-xl border border-brand-blue-light/20">
                    <button type="button" id="crop-zoom-in" class="p-2 bg-slate-950 border border-brand-blue-light/60 hover:border-brand-gold hover:text-brand-gold text-slate-300 rounded-lg transition-all" title="Zoom In">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                    <button type="button" id="crop-zoom-out" class="p-2 bg-slate-950 border border-brand-blue-light/60 hover:border-brand-gold hover:text-brand-gold text-slate-300 rounded-lg transition-all" title="Zoom Out">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                    </button>
                    <button type="button" id="crop-rotate-left" class="p-2 bg-slate-950 border border-brand-blue-light/60 hover:border-brand-gold hover:text-brand-gold text-slate-300 rounded-lg transition-all" title="Rotate Left">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </button>
                    <button type="button" id="crop-rotate-right" class="p-2 bg-slate-950 border border-brand-blue-light/60 hover:border-brand-gold hover:text-brand-gold text-slate-300 rounded-lg transition-all" title="Rotate Right">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                    <div class="h-6 w-px bg-brand-blue-light/35 mx-1"></div>
                    <button type="button" id="crop-aspect-4-3" class="px-2.5 py-1 text-xs bg-brand-gold text-slate-950 font-bold rounded-md transition-all">4:3 Ratio</button>
                    <button type="button" id="crop-aspect-free" class="px-2.5 py-1 text-xs bg-slate-950 border border-brand-blue-light/60 hover:border-brand-gold hover:text-brand-gold text-slate-300 rounded-md transition-all">Free Ratio</button>
                </div>
            </div>

            <!-- Right: Preview Area (Col-span 2) -->
            <div class="md:col-span-2 flex flex-col justify-start items-center">
                <span class="text-xs font-semibold text-slate-400 mb-3 self-start uppercase tracking-wider">Live Customer Preview:</span>
                
                <!-- Mock Catalog Card -->
                <div class="w-full max-w-[240px] bg-brand-blue-dark border border-brand-blue-light/30 rounded-xl overflow-hidden flex flex-col justify-between shadow-xl">
                    <!-- Image container matching the full-bleed card style! -->
                    <div class="h-36 bg-slate-950 relative overflow-hidden">
                        <img id="preview-card-img" class="w-full h-full object-cover" src="{{ asset('logo-monogram.png') }}" alt="Preview">
                        <div class="absolute top-2 left-2 bg-brand-gold/10 border border-brand-gold/25 px-2 py-0.5 rounded text-[8px] text-brand-gold font-bold uppercase tracking-wider z-20">
                            Featured
                        </div>
                    </div>

                    <!-- Info container -->
                    <div class="p-4 flex flex-col justify-between flex-grow bg-slate-900/40">
                        <div>
                            <span id="preview-card-category" class="text-[8px] text-slate-500 uppercase tracking-widest font-semibold block mb-1">Select Category</span>
                            <h3 id="preview-card-title" class="text-white font-serif font-semibold text-xs leading-snug truncate">Product Name</h3>
                            <p class="text-[9px] text-slate-500 mt-1 line-clamp-2 leading-relaxed">
                                Detailed preview text is rendered here when viewed by the user.
                            </p>
                        </div>
                        <div class="mt-3 pt-2.5 border-t border-brand-blue-light/10 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[7px] text-slate-500 font-semibold uppercase">Price</span>
                                <span id="preview-card-price" class="text-brand-gold font-bold text-xs">LKR 0.00</span>
                            </div>
                            <span class="px-2 py-0.5 bg-brand-blue-light/20 text-white text-[8px] font-bold rounded border border-brand-blue-light/50">Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="p-5 border-t border-brand-blue-light/25 bg-slate-900/40 flex justify-end gap-2.5">
            <button type="button" id="crop-cancel-btn" class="px-4 py-2 border border-brand-blue-light text-slate-300 hover:text-white rounded-xl text-xs font-bold transition-all duration-300">
                Cancel
            </button>
            <button type="button" id="crop-save-btn" class="px-5 py-2 text-xs font-bold rounded-xl text-slate-950 bg-brand-gold hover:bg-brand-gold-dark transition-all duration-300">
                Crop & Save Image
            </button>
        </div>
    </div>
</div>

<script>
    let cropperInstance = null;

    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const cropModal = document.getElementById('crop-modal');
        const cropImageElement = document.getElementById('crop-image-element');
        const previewCardImg = document.getElementById('preview-card-img');
        const previewCardTitle = document.getElementById('preview-card-title');
        const previewCardCategory = document.getElementById('preview-card-category');
        const previewCardPrice = document.getElementById('preview-card-price');

        // Elements inputs to mirror text
        const nameInput = document.getElementById('name');
        const categorySelect = document.getElementById('category_id');
        const priceInput = document.getElementById('price');

        // Functions to sync card text
        function syncCardText() {
            previewCardTitle.innerText = nameInput.value.trim() !== '' ? nameInput.value : 'Product Name';
            
            if (categorySelect.selectedIndex >= 0 && categorySelect.value !== '') {
                previewCardCategory.innerText = categorySelect.options[categorySelect.selectedIndex].text.toUpperCase();
            } else {
                previewCardCategory.innerText = 'SELECT CATEGORY';
            }

            const priceVal = parseFloat(priceInput.value);
            if (!isNaN(priceVal) && priceVal >= 0) {
                previewCardPrice.innerText = 'LKR ' + priceVal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            } else {
                previewCardPrice.innerText = 'LKR 0.00';
            }
        }

        // Event listeners to update text preview in real-time
        nameInput.addEventListener('input', syncCardText);
        categorySelect.addEventListener('change', syncCardText);
        priceInput.addEventListener('input', syncCardText);

        // When a file is chosen
        imageInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function(event) {
                    cropImageElement.src = event.target.result;
                    cropModal.classList.remove('hidden');
                    cropModal.classList.add('flex');
                    
                    // Sync card details text
                    syncCardText();

                    // Destroy old cropper if exists
                    if (cropperInstance) {
                        cropperInstance.destroy();
                    }

                    // Initialize new cropper
                    cropperInstance = new Cropper(cropImageElement, {
                        aspectRatio: 4 / 3,
                        viewMode: 1,
                        dragMode: 'move',
                        autoCropArea: 0.9,
                        restore: false,
                        guides: true,
                        center: true,
                        highlight: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false,
                        crop(event) {
                            // Update live card preview
                            const canvas = cropperInstance.getCroppedCanvas({
                                width: 240,
                                height: 180
                            });
                            if (canvas) {
                                previewCardImg.src = canvas.toDataURL('image/jpeg');
                            }
                        }
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        // Cropper controls triggers
        document.getElementById('crop-zoom-in').addEventListener('click', () => cropperInstance && cropperInstance.zoom(0.1));
        document.getElementById('crop-zoom-out').addEventListener('click', () => cropperInstance && cropperInstance.zoom(-0.1));
        document.getElementById('crop-rotate-left').addEventListener('click', () => cropperInstance && cropperInstance.rotate(-90));
        document.getElementById('crop-rotate-right').addEventListener('click', () => cropperInstance && cropperInstance.rotate(90));
        
        document.getElementById('crop-aspect-4-3').addEventListener('click', function() {
            if (cropperInstance) {
                cropperInstance.setAspectRatio(4 / 3);
                this.classList.replace('bg-slate-950', 'bg-brand-gold');
                this.classList.replace('text-slate-300', 'text-slate-950');
                const freeBtn = document.getElementById('crop-aspect-free');
                freeBtn.classList.replace('bg-brand-gold', 'bg-slate-950');
                freeBtn.classList.replace('text-slate-950', 'text-slate-300');
            }
        });

        document.getElementById('crop-aspect-free').addEventListener('click', function() {
            if (cropperInstance) {
                cropperInstance.setAspectRatio(NaN);
                this.classList.replace('bg-slate-950', 'bg-brand-gold');
                this.classList.replace('text-slate-300', 'text-slate-950');
                const ratioBtn = document.getElementById('crop-aspect-4-3');
                ratioBtn.classList.replace('bg-brand-gold', 'bg-slate-950');
                ratioBtn.classList.replace('text-slate-950', 'text-slate-300');
            }
        });

        // Close functions
        function closeCropModal() {
            cropModal.classList.add('hidden');
            cropModal.classList.remove('flex');
            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }
        }

        const cancelButtons = [
            document.getElementById('crop-cancel-btn'),
            document.getElementById('crop-cancel-btn-top')
        ];
        cancelButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                imageInput.value = ''; // Reset file input
                closeCropModal();
            });
        });

        // Save crop results
        document.getElementById('crop-save-btn').addEventListener('click', function() {
            if (cropperInstance) {
                // Get high quality cropped image
                const canvas = cropperInstance.getCroppedCanvas({
                    width: 800,
                    height: 600,
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high'
                });
                
                if (canvas) {
                    const dataUrl = canvas.toDataURL('image/jpeg', 0.9);
                    
                    // Set to hidden form input
                    document.getElementById('cropped_primary_image').value = dataUrl;

                    // Update form preview
                    document.getElementById('cropped-preview-thumbnail').src = dataUrl;
                    document.getElementById('cropped-preview-container').classList.remove('hidden');

                    // Hide original image box if exists
                    const currentBox = document.getElementById('current-image-preview-box');
                    if (currentBox) {
                        currentBox.classList.add('hidden');
                    }
                }
            }
            closeCropModal();
        });
    });
</script>
