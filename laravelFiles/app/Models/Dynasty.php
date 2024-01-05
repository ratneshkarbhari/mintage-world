<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Dynasty extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = "dynasty";


    
    public function dynasty_group() : HasOne
    {
        return $this->hasOne(DynastyGroup::class,"id","dynasty_group");
    }



}