<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Course;

class Books extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
