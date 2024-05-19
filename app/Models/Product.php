<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'categoryId',
        'subCategoryId',
        'companyId',
        'name',
        'slug',
        'mrp',
        'discountedPrice',
        'gst',
        'deliveryCharge',
        'description',
        'length',
        'width',
        'height',
        'colors',
        'sizes',
        'warranty',
        'material',
        'metaKeywords',
        'metaTitle',
        'metaDescription',
        'status',
        'deleteId',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subCategoryId', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'companyId', 'id');
    }

    public function productimages()
    {
        return $this->hasMany(Productimages::class, 'productId', 'id');
    }
}
