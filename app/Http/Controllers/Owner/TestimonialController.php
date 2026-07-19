<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('owner.testimonials.index', compact('testimonials'));
    }

    public function toggleApprove($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->is_approved = !$testimonial->is_approved;
        $testimonial->save();

        $status = $testimonial->is_approved ? 'approved' : 'pending approval';
        return redirect()->back()->with('success', "Testimonial is now {$status}.");
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial has been successfully deleted.');
    }
}
