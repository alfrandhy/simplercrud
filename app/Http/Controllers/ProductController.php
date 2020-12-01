<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            // 'productid' => 'required|string|max:50|unique:products',
            'name' => 'required|string|max:50|unique:products',
            'price' => 'required|string',
            'category' => 'required|string',
            'description' => 'required',
        ]);
        if (Product::all()->count() == 0) {
            $put = 1;
        }else{
            $last = Product::all()->last()->productid;
            $getId = substr($last, -1);
            $put = $getId+1;
        }
        $request->request->add([
            'productid' =>substr($request->category,0,1) . "000" . $put,
        ]);
        Product::create($request->except('_token'));
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Created Successful')
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' => 'required|string|max:50',
            'price' => 'required|string',
            'category' => 'required|string',
            'description' => 'required',
        ]);
        $product->update($request->except('_token'));
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Updated Successful')
        ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('product.index')
            ->with('success', 'Product Deleted Successful')
        ;
    }
}
