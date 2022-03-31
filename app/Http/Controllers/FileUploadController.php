<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function storeUploads (Request $request){
        // $response = cloudinary()->upload($request->input('file')->getRealPath())->getSecurePath();
        dd($request->input('file'));
        return $request->input('file')->getRealPath();
    }
}
