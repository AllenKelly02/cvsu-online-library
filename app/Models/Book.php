<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Course;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'image',
        'category',
        'published_year',
        'publisher',
        'accession_number',
        'edition_number',
        'call_number',
        'ISBN',
        'pages',
        'description',
        'bibliography',
        'course',
        'status'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);

    }

    public function bookIssuing() {
        return $this->hasOne(BookIssuing::class);
    }
    public function favourite_users(){
        return $this->hasMany(UserFavouriteBook::class);
    }

      /**
     * Set the course
     *
     */
    public function setCourseAttribute($value)
    {
        $this->attributes['course'] = json_encode($value);
    }

    /**
     * Get the course
     *
     */
    public function getCourseAttribute($value)
    {
        return $this->attributes['course'] = json_decode($value);
    }


    public function scopeFilter($query, array $filters) {
        if ($filters['category'] ?? false) {
            $query->where('category', request('category'));
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%' )
            ->orWhere('category', 'like', '%' . request('search') . '%' )
            ->orWhere('author', 'like', '%' . request('search') . '%' );
        }
    }


}
