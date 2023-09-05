<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    

    
    public function order_products() : HasMany
    {
        return $this->hasMany(Product::class,"shoppingid","id");
    }

}
