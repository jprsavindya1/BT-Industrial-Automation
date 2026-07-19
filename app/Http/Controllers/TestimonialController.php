<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10|max:1000',
        ]);

        Testimonial::create([
            'name' => $validated['name'],
            'role' => $validated['role'],
            'company' => $validated['company'],
            'rating' => $validated['rating'],
            'content' => $validated['content'],
            'is_approved' => false, // Moderation by default
        ]);

        return redirect()->back()->with('success_review', 'Thank you for your feedback! Your review has been submitted and will be displayed once approved by our team.');
    }
}
