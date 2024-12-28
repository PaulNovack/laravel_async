<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index()
    {
        $product = new Product();
        $product->aFetchAll();
        $productsArray = $product->aFetchResults();
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($productsArray, ($currentPage - 1) * $perPage, $perPage);
        $products = new LengthAwarePaginator($currentItems, count($productsArray), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        return view('products.index', compact('products'));
    }
}
