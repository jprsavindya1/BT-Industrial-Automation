<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $featuredCount = Product::where('is_featured', true)->count();
        $categoriesCount = Category::count();
        
        $latestProducts = Product::latest()->take(5)->with('category')->get();

        $inquiriesCount = \App\Models\Inquiry::count();
        $unreadInquiriesCount = \App\Models\Inquiry::where('is_read', false)->count();
        $latestInquiries = \App\Models\Inquiry::latest()->take(5)->get();

        return view('owner.dashboard', compact(
            'productsCount',
            'featuredCount',
            'categoriesCount',
            'latestProducts',
            'inquiriesCount',
            'unreadInquiriesCount',
            'latestInquiries'
        ));
    }

    public function settings()
    {
        return view('owner.settings');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
