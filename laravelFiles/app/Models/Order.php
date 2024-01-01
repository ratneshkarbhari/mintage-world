<?php

namespace App\Models;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->hasMany(OrderProduct::class,"shoppingid","id");
    }
    
    public function member() : HasOne
    {
        return $this->hasOne(Member::class,"id","member_id");
    }

    


}
