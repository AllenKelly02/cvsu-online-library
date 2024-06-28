<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisViewerController extends Controller
{
    public function show($fileName){
        $path = storage_path('app/public/thesis_file/' . $fileName);
        if (file_exists($path)) {
            return response()->file($path);
        }
        return back()->with(['message' => 'File does not exist.']);
    }
}
