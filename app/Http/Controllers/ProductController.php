<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = new Product();
        $product->aFetchAll();
        $products = $product->aFetchResults()->paginate(10);
        return view('products.index', compact('products'));
    }
}
