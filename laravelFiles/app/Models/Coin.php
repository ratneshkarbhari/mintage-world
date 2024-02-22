<?php

namespace App\Models;

use App\Models\Feedback;
use App\Models\Denomination;
use App\Models\MintingTechnique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coin extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    protected $table = "coin";


    protected $primaryKey = "id";

    
    public function denomination() : HasOne
    {
        return $this->hasOne(Denomination::class,"id","denomination_id");
    }

    public function metal() : HasOne
    {
        return $this->hasOne(Metal::class,"id","metal_id");
    }

    public function ruler() : HasOne
    {
        return $this->hasOne(Ruler::class,"id","ruler_id");
    }


    public function minting_technique() : HasOne
    {
        return $this->hasOne(MintingTechnique::class,"id","minting_technique_id");
    }

    public function calendar_system() : HasOne
    {
        return $this->hasOne(CalendarSystem::class,"id","calender_system_id");
    }


    
    public function shape() : HasOne
    {
        return $this->hasOne(Shape::class,"id","shape_id");
    }

    public function rarity() : HasOne
    {
        return $this->hasOne(Rarity::class,"id","rarity_id");
    }

    public function feedback() : HasMany
    {
        return $this->hasMany(Feedback::class,"coin_id","id");
    }
    



}