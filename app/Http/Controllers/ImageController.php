<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function view(string $name){


         $url = response()->file(storage_path('app/public/book/image/'. $name));

        return $url;
    }
}
