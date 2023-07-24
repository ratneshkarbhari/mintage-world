<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Coin;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Denomination extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $protected = [];

    protected $table = "denomination";

}