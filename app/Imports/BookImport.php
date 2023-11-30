<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, WithHeadingRow
//WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title' => $row['title'],
            'accession_number' => $row['accession_number'],
            'author' => $row['author'] ?? 'N\A',
            'edition' => $row['edition_number'] ?? 'N\A',
            'ISBN' => $row['isbn'] ?? 'N\A',
            'publisher' => $row['publisher'] ?? 'N\A',
            'published_year' => $row['published_year'] ?? 'N\A',
            'type' => $row['type'] ?? 'N\A',
            'pages' => $row['pages'] ?? 'N\A',
            'category' => $row['category'] ?? 'N\A',
            'description' => $row['description'] ?? 'N\A',
            'course' => $row['course'] ?? 'N\A',
            'call_number' => $row['call_number'] ?? 'N\A',
            'bibliography' => $row['bibliography'] ?? 'N\A' ,
            'copy' => $row['copy'] ?? 'N\A'
        ]);
    }
}
