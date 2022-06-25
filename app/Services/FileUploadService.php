<?php
namespace App\Services;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;

class FileUploadService extends BaseService
{
    public function imageUpload ($request){
        if(Auth::check()){
            try {
                $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'product_images'])->getSecurePath();
                return $uploadedFileUrl;
            } catch (\Throwable $th) {
                return false;
            }
        }else{
            return false;
        }   
       
    }
}