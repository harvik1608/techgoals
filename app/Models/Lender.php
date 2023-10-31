<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'app_url',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
