<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Note extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = "note";

    
    public function denomination() : HasOne
    {
        return $this->hasOne(Denomination::class,"id","denomination_id");
    }

    public function feedback() : HasMany
    {
        return $this->hasMany(Feedback::class,"note_id","id");
    }

    public function rarity() : HasOne
    {
        return $this->hasOne(Rarity::class,"id","rarity_id");
    }

}
