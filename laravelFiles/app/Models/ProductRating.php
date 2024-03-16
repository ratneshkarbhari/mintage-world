<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRating extends Model
{
    
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $protected = [];

    protected $guarded = [];  


    protected $table = "products_ratings";


    protected $primaryKey = "id";

    public function product() : HasOne
    {
        return $this->hasOne(Product::class,"id","product_id");
    }

    public function member() : HasOne
    {
        return $this->hasOne(Member::class,"id","member_id");
    }

}