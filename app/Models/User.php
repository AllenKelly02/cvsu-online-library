<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'student_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function booksIssuing() {
        return $this->hasOne(BookIssuing::class);
    }
    public function favourite_books(){
        return $this->hasMany(UserFavouriteBook::class);
    }

    public function scopeFilter($query, array $filters) {
        if ($filters['name'] ?? false) {
            $query->where('name', request('name'));
        }

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%' )
            ->orWhere('student_id', 'like', '%' . request('search') . '%' )
            ->orWhere('email', 'like', '%' . request('search') . '%' );

        }
    }
}
