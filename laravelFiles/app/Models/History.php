<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class History extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = "history";

    public function dynasty() : HasOne
    {
        return $this->hasOne(Dynasty::class,"id","dynasty_id");
    }


}