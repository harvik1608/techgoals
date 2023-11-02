<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_role_id',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
