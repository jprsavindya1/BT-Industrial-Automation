<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Inquiry;

class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::withCount('products')->get();
        $featuredProducts = Product::where('is_featured', true)->with('category')->take(4)->get();
        $testimonials = Testimonial::where('is_approved', true)->latest()->get();
        return view('home', compact('categories', 'featuredProducts', 'testimonials'));
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::query()->with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        if ($request->has('featured') && $request->input('featured') === '1') {
            $query->where('is_featured', true);
        }

        $products = $query->paginate(9)->withQueryString();

        return view('catalog', compact('products', 'categories'));
    }

    public function suggestions(Request $request)
    {
        $query = $request->input('query');
        if (empty($query) || strlen($query) < 2) {
            return response()->json([]);
        }

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->with('category')
            ->take(6)
            ->get();

        $suggestions = $products->map(function($product) {
            return [
                'name' => $product->name,
                'price' => number_format($product->price, 2),
                'image' => $product->image ? asset('storage/' . $product->image) : null,
                'url' => route('products.show', $product->slug),
                'category' => $product->category->name
            ];
        });

        return response()->json($suggestions);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with(['category', 'galleryImages'])->firstOrFail();
        
        // Build the WhatsApp message (Sri Lanka number example)
        $whatsappNumber = '94703850140'; // Change to actual contact phone
        $message = "Hi BT Industrial Automation,\n\nI am interested in the following product:\n";
        $message .= "*Product:* {$product->name}\n";
        if ($product->price) {
            $message .= "*Price:* LKR " . number_format($product->price, 2) . "\n";
        }
        $message .= "*Link:* " . route('products.show', $product->slug) . "\n\nPlease let me know how I can order this.";
        
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);

        // Related products in the same category
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'whatsappUrl', 'relatedProducts'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|min:10',
        ]);

        Inquiry::create($validated);

        return back()->with('success', 'Your inquiry has been submitted successfully! We will contact you soon.');
    }
}
