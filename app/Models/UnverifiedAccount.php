<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnverifiedAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'block',
        'subdivision',
        'barangay',
        'municipality',
        'province',
        'zip_code',
        'sex',
        'student_id',
        'contact_number',
        'email',
        'password'
    ];
}
