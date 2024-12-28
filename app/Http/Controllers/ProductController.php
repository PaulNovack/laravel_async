<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        Product::sendQuery();
        $products = Product::fetchResults();
        return view('products.index', compact('products'));
    }
}
