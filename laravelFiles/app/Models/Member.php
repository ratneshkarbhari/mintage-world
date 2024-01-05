<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $table = "member";

    protected $primaryKey = "id";

    
    public function addresses() : HasMany
    {
        return $this->hasMany(MemberAddress::class,"id","member_id");
    }

}
