<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    const UPDATED_AT = "modified";
    const CREATED_AT = "modified";


    protected $guarded = [];

    protected $table = "products";


    protected $primaryKey = "id";

    public function feedback() : HasMany
    {
        return $this->hasMany(ProductRating::class,"product_id","id");
    }

    public function product_category() : HasOne
    {
        return $this->hasOne(ProductCategory::class,"id","category");
    }

    public function product_images() : HasMany
    {
        return $this->hasMany(ProductImage::class,"product_id","id");
    }

    public function product_ratings() : HasMany
    {
        return $this->hasMany(ProductRating::class,"product_id","id");
    }

}
