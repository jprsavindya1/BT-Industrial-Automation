<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'specifications',
        'price',
        'image',
        'is_featured'
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(ProductGalleryImage::class);
    }

    public function getPrimaryImageUrlAttribute()
    {
        if ($this->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        $firstGallery = $this->galleryImages->first();
        if ($firstGallery) {
            return asset('storage/' . $firstGallery->image_path);
        }

        return null;
    }
}
