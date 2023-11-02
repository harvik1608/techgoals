<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = "organization";
    protected $fillable = [
        'org_name',
        'org_favicon',
        'org_logo',
        'address_1',
        'address_2',
        'city',
        'pincode',
        'state',
        'country',
        'admin_full_name',
        'admin_email',
        'admin_phone',
        'membership_certificate',
        'credit_institution',
        'authorization_certificate',
        'currency',
        'timezone',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
