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
        $totalProducts = $product->aFetchCount($search);
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $offset = ($currentPage - 1) * $perPage;

        $product->aFetchSearch($search, $offset, $perPage);
        $productsArray = $product->aFetchResults();

        $products = new LengthAwarePaginator($productsArray, $totalProducts, $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query(), // Retain query parameters
        ]);
        return view('products.index', compact('products'));
    }
}
