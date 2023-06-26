<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'student_id',
        'course',
        'sex',
        'address',
        'contact_number',
        'email',
        'password',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
