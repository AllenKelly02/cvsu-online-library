<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function view(string $name){


         $url = response()->file(storage_path('app/public/book/image/'. $name));

        return $url;
    }
    public function profile(string $name){


        $url = response()->file(storage_path('app/public/avatar/'. $name));

       return $url;
   }

   public function student_cor(string $name){


    $url = response()->file(storage_path('app/public//unverified/student/COR/'. $name));

   return $url;
}


}
