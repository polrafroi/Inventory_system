<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Theme;
use App\Products;

class ProductController extends Controller
{

    public function loadProduct()
    {
        $productList = Products::all();
        return json_encode(['data'=>$productList]);
    }
}
