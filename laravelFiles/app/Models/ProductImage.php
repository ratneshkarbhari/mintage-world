<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $protected = [];

    protected $table = "product_image";


    protected $primaryKey = "id";

}
