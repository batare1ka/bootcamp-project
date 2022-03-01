<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandApiController extends Controller
{
    public function readBrands()
    {
        $brands = Brand::all();

        return $brands->toJson();

    }
}
