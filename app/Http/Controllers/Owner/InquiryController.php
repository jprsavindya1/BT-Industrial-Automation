<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'all');

        $query = Inquiry::query();

        if ($filter === 'unread') {
            $query->where('is_read', false);
        } elseif ($filter === 'read') {
            $query->where('is_read', true);
        }

        $inquiries = $query->latest()->paginate(10)->withQueryString();

        return view('owner.inquiries.index', compact('inquiries', 'filter'));
    }

    public function toggleRead($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->update([
            'is_read' => !$inquiry->is_read,
        ]);

        $status = $inquiry->is_read ? 'marked as read' : 'marked as unread';
        return back()->with('success', "Inquiry from {$inquiry->name} has been {$status}.");
    }

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return back()->with('success', 'Inquiry deleted successfully.');
    }
}
