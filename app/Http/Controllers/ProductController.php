<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
    }

    public function datatables()
    {
        $products = Product::select(['id', 'name', 'description', 'price']);
        return DataTables::of($products)
        
        ->editColumn('price', function ($product) {
            $c = \Session::get('currency');
            $symbol = \App\Models\Currency::where('code',$c)->first();
            $productModel = new Product();
            return $symbol->symbol.' ' . number_format($productModel->getPriceAttributes($product->price), 2);
        })
        ->addColumn('action', function ($product) {
            return '<a href="'.route('products.edit', $product->id).'" class="btn btn-xs btn-primary">Edit</a>'.
                '<form action="'.route('products.destroy', $product->id).'" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure?\')">'.
                '<input type="hidden" name="_method" value="DELETE">'.
                '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                '<button type="submit" class="btn btn-xs btn-danger">Delete</button>'.
                '</form>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "dsdsds";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
