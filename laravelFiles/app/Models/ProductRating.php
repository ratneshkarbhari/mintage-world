<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}