<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BaseService;

class SuggestController extends Controller
{
    protected $baseService;
    public function __construct(BaseService $baseService){
        $this->baseService = $baseService;
    }
    public function suggestName($category_id)
    {
        $data = [];
        if($category_id == 1) $data = config('apps.suggest.mobileName');
        if($category_id == 2) $data = config('apps.suggest.laptopName');
        if($category_id == 3) $data = config('apps.suggest.pcName');
        return $this->baseService->sendResponse(config('apps.message.success'), $data);
    }

    public function suggestColor($category_id)
    {
        $data = [];
        if($category_id == 1) $data = config('apps.suggest.mobileColor');
        if($category_id == 2) $data = config('apps.suggest.laptopColor');
        return $this->baseService->sendResponse(config('apps.message.success'), $data);
    }

    public function suggestCpu()
    {
        $data = config('apps.suggest.laptopCpu');
        return $this->baseService->sendResponse(config('apps.message.success'), $data);
    }

    public function suggestGpu()
    {
        $data = config('apps.suggest.laptopGpu');
        return $this->baseService->sendResponse(config('apps.message.success'), $data);
    }

    public function suggestDisplaySize($category_id)
    {
        $data = []; 
        if($category_id == 2) $data = config('apps.suggest.displaySizeLaptop');
        if($category_id == 3) $data = config('apps.suggest.displaySizePc');
        return $this->baseService->sendResponse(config('apps.message.success'), $data);
    }
}
