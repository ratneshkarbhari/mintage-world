<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  


    protected $table = "event";

}
