<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('dashboard.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('id','DESC')->paginate(5);
        return view('dashboard.product.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if($request->hasFile('product_image')) {
            $product_image = $request->file('product_image');
            $filename = time().rand(1989, 2018) . '.' . $product_image->getClientOriginalExtension();
            //Image::make($product_image)->resize(300,300)->save(public_path('/images/products/'));
            $destinationPath = public_path().'/images/products/' ;
            $product_image->move($destinationPath,$filename);
            // $product->product_image = $filename ;
        }

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->product_image = $filename;
        if($product->save()) {
            return redirect()->route('product.create')->with('success','You have successfully uploaded your files');
        } else {
            return redirect()->route('product.create')->with('error','Something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.edit', compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'description' => 'required|max:255',
        //     'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        if($request->hasFile('product_image')) {
            $product_image = $request->file('product_image');
            $filename = time().rand(1989, 2018) . '.' . $product_image->getClientOriginalExtension();
            $destinationPath = public_path().'/images/products/' ;
            $product_image->move($destinationPath,$filename);
        }

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->product_image = $filename;
        if($product->save()) {
            return redirect()->route('product.index')->with('success','Successfully uPdated your product');
        } else {
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
