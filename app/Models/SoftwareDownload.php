<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareDownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'version',
        'file_name',
        'file_size',
        'os',
        'url',
        'description',
        'features',
        'badge',
        'icon_color',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
