<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Services\BaseService;

class FileUploadController extends Controller
{
    protected $baseService;
    public function __construct(BaseService $baseService){
        $this->baseService = $baseService;
    }

    public function storeUploads (Request $request){
        if(Auth::check()){
            // $images = $request->file('file');
            // $upload_url = [];
            // foreach ($images as $image) {
            //     $uploadedFileUrl = Cloudinary::upload($image->getRealPath(), ['folder' => 'post_images'])->getSecurePath();
            //     array_push($upload_url, $uploadedFileUrl);
            // }
            // return $upload_url;
            // dd("a");
            try {
                $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath(), ['folder' => 'post_images'])->getSecurePath();
                return $this->baseService->sendResponse(config('apps.message.success'), $uploadedFileUrl);
            } catch (\Throwable $th) {
                return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
            }
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }   
       
    }

    public function storeUploadVideos (Request $request){
        dd($request->file('file'));
        if(Auth::check()){
            try {
                $uploadedFileUrl = Cloudinary::uploadVideo($request->file('file')->getRealPath(), ['folder' => 'post_videos'])->getSecurePath();
                return $this->baseService->sendResponse(config('apps.message.success'), $uploadedFileUrl);
            } catch (\Throwable $th) {
                return $this->baseService->sendError(config('apps.message.error'), [], config('apps.general.error_code'));
            }
        }else{
            return $this->baseService->sendError(config('apps.message.login_require'), [], config('apps.general.error_code'));
        }   
    }
}
