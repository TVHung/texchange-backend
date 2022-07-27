<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function allDataCommon(){
        $data = [
            'status' => config('apps.fixedData.status'),
            'typeProductData' => config('apps.fixedData.typeProductData'),
            'storageType' => config('apps.fixedData.storageType'),
            'sex' => config('apps.fixedData.sex'),
            'command' => config('apps.fixedData.command'),
            'resolution' => config('apps.fixedData.resolution'),
            'display_size' => config('apps.fixedData.display_size'),
            'storage' => config('apps.fixedData.storage'),
        ];

        return [
            'status' => config('apps.general.success'),
            'message' => config('apps.message.success'),
            'data' => $data
        ];
    }
}
