<?php

namespace App\Models;

use App\Models\Shape;
use App\Models\ThemeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Stamp extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $table = "stamp";

    public function theme_category() : HasOne
    {
        return $this->hasOne(ThemeCategory::class,"id","theme_category_id");
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
        return $this->hasMany(Feedback::class,"stamp_id","id");
    }

}
