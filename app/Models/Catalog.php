<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

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
