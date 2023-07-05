<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::all();

        return view("products.index", compact("products") );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $newProduct = new Product;
        $newProduct->title = $data['title'];
        $newProduct->description = $data['description'];
        $newProduct->type = $data['type'];
        $newProduct->image = $data['image'];
        $newProduct->cooking_time = $data['cooking_time'];
        $newProduct->weight = $data['weight'];
        $newProduct->save();
        
        // $product = $newProduct;
        // return view("products.show", compact("product") );

        //Pattern: POST/REDIRECT/GET
        return redirect()->route('products.show', $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("products.show", compact("product") );
    }

    public function show_old_senza_dependecy_injection($id)
    {
        // $product = Product::find($id);
        $product = Product::findOrFail($id);

        return view("products.show", compact("product") );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.edit", compact("product") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->type = $data['type'];
        $product->image = $data['image'];
        $product->cooking_time = $data['cooking_time'];
        $product->weight = $data['weight'];
        $product->update();

        // dump() stampa i dati e continua l'esecuzione
        // per interrompere il flusso usare dd() oppure ddd()
        // dd($product);
        // dd($request);

        //Pattern: POST/REDIRECT/GET
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
