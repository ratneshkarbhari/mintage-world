<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Country extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $table = "country";

}
