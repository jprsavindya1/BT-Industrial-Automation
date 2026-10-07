<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Title -->
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Software / Driver Title <span class="text-rose-400">*</span></label>
        <input type="text" name="title" value="{{ old('title', $download->title ?? '') }}" required placeholder="e.g. Coolmay & FX3U PLC Software (GX Works2 Compatible)"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('title') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Category -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Category <span class="text-rose-400">*</span></label>
        <input type="text" name="category" value="{{ old('category', $download->category ?? 'PLC Software') }}" required placeholder="e.g. PLC Software, HMI Software, USB Cable Driver"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('category') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Badge -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Badge Text</label>
        <input type="text" name="badge" value="{{ old('badge', $download->badge ?? 'PLC Essential') }}" placeholder="e.g. PLC Essential, HMI Essential, Cable Driver"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('badge') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Version -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Version</label>
        <input type="text" name="version" value="{{ old('version', $download->version ?? 'v1.0') }}" placeholder="e.g. v1.77F, v2.1"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('version') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- File Size -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">File Size</label>
        <input type="text" name="file_size" value="{{ old('file_size', $download->file_size ?? '142 MB') }}" placeholder="e.g. 142 MB, 8.5 MB"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('file_size') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- File Name -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">File Name</label>
        <input type="text" name="file_name" value="{{ old('file_name', $download->file_name ?? '') }}" placeholder="e.g. GXW2-E-1.77F.zip"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('file_name') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Operating System -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">OS Compatibility <span class="text-rose-400">*</span></label>
        <input type="text" name="os" value="{{ old('os', $download->os ?? 'Windows 7 / 8 / 10 / 11') }}" required placeholder="e.g. Windows 7 / 8 / 10 / 11"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('os') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Download URL -->
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Direct Download URL <span class="text-rose-400">*</span></label>
        <input type="url" name="url" value="{{ old('url', $download->url ?? '') }}" required placeholder="https://en.coolmay.com/webdown/..."
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white font-mono placeholder-slate-500 focus:outline-none focus:border-brand-gold">
        @error('url') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Description -->
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Description</label>
        <textarea name="description" rows="3" placeholder="Explain what this software or cable driver is used for..."
                  class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold">{{ old('description', $download->description ?? '') }}</textarea>
        @error('description') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Features List (Newline separated) -->
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Key Features (One feature per line)</label>
        <textarea name="features" rows="4" placeholder="GX Works2 Programming Environment Compatibility&#10;FX3U & Coolmay All-In-One Board Support&#10;Ladder Diagram & SFC Programming Modes"
                  class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white font-mono placeholder-slate-500 focus:outline-none focus:border-brand-gold">{{ old('features', isset($download->features) && is_array($download->features) ? implode("\n", $download->features) : '') }}</textarea>
        <span class="text-[11px] text-slate-400 mt-1 block">Type each feature point on a new line.</span>
        @error('features') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Sort Order & Active Checkbox -->
    <div>
        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $download->sort_order ?? 0) }}"
               class="w-full bg-slate-900 border border-slate-700 rounded-xl py-3 px-4 text-sm text-white focus:outline-none focus:border-brand-gold">
    </div>

    <div class="flex items-center pt-6">
        <label class="inline-flex items-center gap-3 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $download->is_active ?? true) ? 'checked' : '' }}
                   class="w-5 h-5 text-brand-gold rounded border-slate-700 bg-slate-900 focus:ring-brand-gold">
            <span class="text-sm font-semibold text-white">Active (Visible on public /downloads page)</span>
        </label>
    </div>

</div>
