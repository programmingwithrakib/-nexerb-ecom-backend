<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontEnd\CategoryResource;
use App\Models\Category;
use App\Utils\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = CategoryResource::collection(Category::all());
        return Helper::ApiResponse('', $data);
    }
}
