<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Media extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  

    protected $table = "media";


}