<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'categoryId',
        'name',
        'slug',
        'description',
        'metaKeywords',
        'metaTitle',
        'metaDescription',
        'status',
        'deleteId',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
