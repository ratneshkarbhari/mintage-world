<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $table = "member";

    protected $primaryKey = "id";
}
