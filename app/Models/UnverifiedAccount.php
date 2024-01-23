<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnverifiedAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_cor',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'course',
        'sex',
        'student_id',
        'contact_number',
        'email',
        'password'
    ];
}
