<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Course;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'author',
        'image',
        'type',
        'category',
        'published_year',
        'publisher',
        'accession_number',
        'edition_number',
        'call_number',
        'ISBN',
        'pages',
        'copy',
        'description',
        'bibliography',
        'course',
        'status',
        'ebook_link',
        'ebook_source',
        'reason_remove'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = json_encode($value);
    }

    public function getTypeAttribute($value)
    {
        return $this->attributes['type'] = json_decode($value);

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
        return $this->hasMany(BookIssuing::class);
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

    public function browse()
    {
        $books = Book::orderBy('published_year')->get();
        dd($books); // Add this line to debug

        return view('books.browse', compact('books'));
    }

    public function scopeFilter($query, array $filters) {
        if ($filters['type'] ?? false) {
            $query->where('type', request('type'));
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%' )
            ->orWhere('category', 'like', '%' . request('search') . '%' )
            ->orWhere('type', 'like', '%' . request('search') . '%' )
            ->orWhere('author', 'like', '%' . request('search') . '%' )
            ->orWhere('published_year', 'like', '%' . request('search') . '%' )
            ->orWhere('publisher', 'like', '%' . request('search') . '%' )
            ->orWhere('ISBN', 'like', '%' . request('search') . '%' )
            ->orWhere('bibliography', 'like', '%' . request('search') . '%' )
            ->orWhere('bibliography', 'like', '%' . request('search') . '%' )
            ->orWhere('accession_number', 'like', '%' . request('search') . '%' )
            ->orWhere('course', 'like', '%' . request('search') . '%' );


        }
    }

    public function bookBarcode()
    {


    }

}
