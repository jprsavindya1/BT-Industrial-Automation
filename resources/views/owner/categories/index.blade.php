@extends('layouts.owner')

@section('title', 'Manage Categories | BT Industrial Automation')
@section('header_title', 'Manage Categories')
@section('header_subtitle', 'Group products by category for easier navigation')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- Left column: Categories List -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-brand-blue-light/25">
                <h4 class="font-serif font-bold text-lg text-white">Categories List</h4>
            </div>

            @if($categories->isEmpty())
                <div class="p-12 text-center text-slate-500 text-sm">
                    No categories found. Create one using the form on the right.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900/60 border-b border-brand-blue-light/20 text-slate-400 text-xs uppercase font-semibold">
                                <th class="py-4 px-6">Icon</th>
                                <th class="py-4 px-6">Name</th>
                                <th class="py-4 px-6">Description</th>
                                <th class="py-4 px-6">Products</th>
                                <th class="py-4 px-6 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-brand-blue-light/10 text-sm">
                            @foreach($categories as $cat)
                                <tr class="hover:bg-brand-blue-light/5 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="w-8 h-8 rounded-lg bg-slate-900 border border-brand-blue-light/60 flex items-center justify-center text-brand-gold">
                                            @if($cat->icon == 'cpu')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                                            @elseif($cat->icon == 'radio')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            @elseif($cat->icon == 'sun')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                                            @elseif($cat->icon == 'activity')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3 3L22 4"></path></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-white">{{ $cat->name }}</td>
                                    <td class="py-4 px-6 text-slate-400 max-w-xs truncate">{{ $cat->description }}</td>
                                    <td class="py-4 px-6 font-mono text-slate-300">{{ $cat->products_count }}</td>
                                    <td class="py-4 px-6 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('owner.categories.index', ['edit_id' => $cat->id]) }}" class="inline-flex items-center gap-1 text-xs bg-slate-900 border border-brand-blue-light hover:border-brand-gold text-slate-300 hover:text-brand-gold font-bold px-2.5 py-1.5 rounded-lg transition-all duration-300">
                                                Edit
                                            </a>
                                            <form action="{{ route('owner.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('WARNING: Deleting this category will permanently delete ALL {{ $cat->products_count }} products associated with it. Are you absolutely sure?');">
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
            @endif
        </div>
    </div>

    <!-- Right column: Add / Edit Form -->
    <div>
        @php
            $editCat = null;
            if(request('edit_id')) {
                $editCat = $categories->firstWhere('id', request('edit_id'));
            }
        @endphp

        <div class="bg-brand-blue-dark/20 border border-brand-blue-light/20 p-6 rounded-2xl">
            <h4 class="font-serif font-bold text-lg text-white mb-6 border-b border-brand-blue-light/10 pb-3">
                {{ $editCat ? 'Edit Category' : 'Create New Category' }}
            </h4>

            @if($errors->any())
                <div class="mb-4 bg-red-950/30 border border-red-800 text-red-200 px-4 py-3 rounded-lg text-xs">
                    <ul class="list-disc pl-4 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $editCat ? route('owner.categories.update', $editCat->id) : route('owner.categories.store') }}" method="POST" class="space-y-4">
                @csrf
                @if($editCat)
                    @method('PUT')
                @endif

                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Category Name</label>
                    <input id="name" name="name" type="text" required 
                           value="{{ old('name', $editCat ? $editCat->name : '') }}"
                           class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300"
                           placeholder="e.g. Solar Solutions">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 placeholder-slate-500 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300"
                              placeholder="Describe the category components...">{{ old('description', $editCat ? $editCat->description : '') }}</textarea>
                </div>

                <!-- Icon Choice -->
                <div>
                    <label for="icon" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">Category Icon</label>
                    <select id="icon" name="icon" required 
                            class="appearance-none rounded-xl block w-full px-4 py-3 bg-brand-blue-light/30 border border-brand-blue-light/80 text-white focus:outline-none focus:ring-1 focus:ring-brand-gold focus:border-brand-gold sm:text-sm transition-all duration-300">
                        @foreach(['cpu' => 'CPU (PLCs & Controllers)', 'radio' => 'Radio Wave (Sensors)', 'sun' => 'Sun (Solar)', 'activity' => 'Activity Graph (Inverters)', 'tool' => 'Wrench (Robotics & DIY)'] as $key => $label)
                            <option value="{{ $key }}" {{ old('icon', $editCat ? $editCat->icon : '') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-4 flex justify-between gap-2">
                    @if($editCat)
                        <a href="{{ route('owner.categories.index') }}" 
                           class="w-1/2 text-center py-2.5 border border-brand-blue-light text-slate-300 hover:text-white rounded-xl text-xs font-bold transition-all duration-300">
                            Cancel Edit
                        </a>
                    @endif
                    <button type="submit" 
                            class="{{ $editCat ? 'w-1/2' : 'w-full' }} py-2.5 text-sm font-bold rounded-xl text-slate-950 bg-brand-gold hover:bg-brand-gold-dark transition-all duration-300">
                        {{ $editCat ? 'Save Changes' : 'Create Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
