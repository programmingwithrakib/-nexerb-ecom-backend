<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\HomeCategoryResource;
use App\Models\HomeCategory;
use App\Utils\Helper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = HomeCategoryResource::collection(HomeCategory::get());
        return Helper::ApiResponse('', $data);
    }
}
