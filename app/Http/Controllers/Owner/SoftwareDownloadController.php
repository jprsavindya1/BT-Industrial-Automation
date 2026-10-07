<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\SoftwareDownload;
use Illuminate\Http\Request;

class SoftwareDownloadController extends Controller
{
    public function index(Request $request)
    {
        $query = SoftwareDownload::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $downloads = $query->orderBy('sort_order')->orderBy('id', 'desc')->paginate(15);
        $categories = SoftwareDownload::select('category')->distinct()->pluck('category');

        return view('owner.downloads.index', compact('downloads', 'categories'));
    }

    public function create()
    {
        return view('owner.downloads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'version' => 'nullable|string|max:50',
            'file_name' => 'nullable|string|max:255',
            'file_size' => 'nullable|string|max:50',
            'os' => 'required|string|max:100',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'features' => 'nullable|string', // Comma or newline separated in form
            'badge' => 'nullable|string|max:50',
            'icon_color' => 'nullable|string|max:30',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Process features string into array
        if (!empty($validated['features'])) {
            $featuresArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['features'])))));
            $validated['features'] = $featuresArray;
        } else {
            $validated['features'] = [];
        }

        $validated['badge'] = $validated['badge'] ?? 'Essential';
        $validated['icon_color'] = $validated['icon_color'] ?? 'amber';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        SoftwareDownload::create($validated);

        return redirect()->route('owner.downloads.index')->with('success', 'Software download item added successfully!');
    }

    public function edit($id)
    {
        $download = SoftwareDownload::findOrFail($id);
        return view('owner.downloads.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        $download = SoftwareDownload::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'version' => 'nullable|string|max:50',
            'file_name' => 'nullable|string|max:255',
            'file_size' => 'nullable|string|max:50',
            'os' => 'required|string|max:100',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'badge' => 'nullable|string|max:50',
            'icon_color' => 'nullable|string|max:30',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (!empty($validated['features'])) {
            $featuresArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['features'])))));
            $validated['features'] = $featuresArray;
        } else {
            $validated['features'] = [];
        }

        $validated['badge'] = $validated['badge'] ?? 'Essential';
        $validated['icon_color'] = $validated['icon_color'] ?? 'amber';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $download->update($validated);

        return redirect()->route('owner.downloads.index')->with('success', 'Software download item updated successfully!');
    }

    public function destroy($id)
    {
        $download = SoftwareDownload::findOrFail($id);
        $download->delete();

        return back()->with('success', 'Software download item deleted successfully!');
    }

    public function toggleActive($id)
    {
        $download = SoftwareDownload::findOrFail($id);
        $download->is_active = !$download->is_active;
        $download->save();

        return back()->with('success', "Status updated for '{$download->title}'!");
    }
}
