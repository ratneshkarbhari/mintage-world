<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Feedback extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];  
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $table = "feedback_detail";

    protected $primaryKey = "id";
    
    public function member() : HasOne
    {
        return $this->hasOne(Member::class,"id","member_id");
    }

    function coin() : HasOne {
        return $this->hasOne(Coin::class,"id","coin_id");

    }

    function note() : HasOne {
        return $this->hasOne(Note::class,"id","note_id");

    }

    function stamp() : HasOne {
        return $this->hasOne(Stamp::class,"id","stamp_id");

    }

}
