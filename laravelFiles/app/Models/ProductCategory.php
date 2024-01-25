<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $guarded = [];

    protected $table = "shopping_category";


    protected $primaryKey = "id";

}
