<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'desc',
        'status',
        'order',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}