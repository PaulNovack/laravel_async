<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = new Product();
        $search = $request->input('search');
        $product->aFetchSearch($search);
        $productsArray = $product->aFetchResults();
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($productsArray, ($currentPage - 1) * $perPage, $perPage);
        $products = new LengthAwarePaginator($currentItems, count($productsArray), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query(), // Retain query parameters
        ]);
        return view('products.index', compact('products'));
    }
}
