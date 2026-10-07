<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query()->with(['category', 'galleryImages']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        return view('owner.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('owner.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048', 'dimensions:max_width=2000,max_height=2000'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048', 'dimensions:max_width=2000,max_height=2000'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        // Handle slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $validated['slug'] = $slug;

        // Handle cropped image or normal image upload
        if ($request->filled('cropped_primary_image')) {
            $base64Image = $request->input('cropped_primary_image');
            @list($type, $fileData) = explode(';', $base64Image);
            @list(, $fileData)      = explode(',', $fileData);
            $imageName = 'products/cropped_' . Str::random(40) . '.jpg';
            Storage::disk('public')->put($imageName, base64_decode($fileData));
            $validated['image'] = $imageName;
        } elseif ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        // Handle specifications mapping
        $specifications = [];
        if ($request->has('spec_keys') && $request->has('spec_values')) {
            foreach ($request->spec_keys as $index => $key) {
                if (trim($key) !== '') {
                    $specifications[trim($key)] = trim($request->spec_values[$index] ?? '');
                }
            }
        }
        $validated['specifications'] = $specifications;

        $product = Product::create($validated);

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $imageFile) {
                $path = $imageFile->store('products/gallery', 'public');
                $product->galleryImages()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('owner.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(string $id)
    {
        $product = Product::with('galleryImages')->findOrFail($id);
        $categories = Category::all();
        return view('owner.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048', 'dimensions:max_width=2000,max_height=2000'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048', 'dimensions:max_width=2000,max_height=2000'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        // Handle slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $validated['slug'] = $slug;

        // Handle cropped image or normal image upload
        if ($request->filled('cropped_primary_image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $base64Image = $request->input('cropped_primary_image');
            @list($type, $fileData) = explode(';', $base64Image);
            @list(, $fileData)      = explode(',', $fileData);
            $imageName = 'products/cropped_' . Str::random(40) . '.jpg';
            Storage::disk('public')->put($imageName, base64_decode($fileData));
            $validated['image'] = $imageName;
        } elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        // Handle specifications mapping
        $specifications = [];
        if ($request->has('spec_keys') && $request->has('spec_values')) {
            foreach ($request->spec_keys as $index => $key) {
                if (trim($key) !== '') {
                    $specifications[trim($key)] = trim($request->spec_values[$index] ?? '');
                }
            }
        }
        $validated['specifications'] = $specifications;

        $product->update($validated);

        // Handle new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $imageFile) {
                $path = $imageFile->store('products/gallery', 'public');
                $product->galleryImages()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('owner.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::with('galleryImages')->findOrFail($id);

        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete gallery images from disk
        foreach ($product->galleryImages as $galleryImage) {
            Storage::disk('public')->delete($galleryImage->image_path);
        }

        $product->delete();

        return redirect()->route('owner.products.index')->with('success', 'Product deleted successfully.');
    }

    public function deleteGalleryImage(string $id)
    {
        $galleryImage = \App\Models\ProductGalleryImage::findOrFail($id);

        // Delete physical file
        Storage::disk('public')->delete($galleryImage->image_path);

        // Delete database row
        $galleryImage->delete();

        return response()->json(['success' => true]);
    }
}
