<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BlogController extends Controller
{
     
    public function index(){
        
        return view('blog.blog');
    }
}
