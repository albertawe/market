<?php

namespace App\Http\Controllers;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Session;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         protected $rules = [
        'name' => ['required', 'min:5'],
        'description' => ['required'],
        'price' => ['required'],
    ];
    public function index()
    {
       $product = Product::orderBy('id','desc')->paginate(4);
        return view('toko.admin.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
    $input = array_except(Input::all(), '_method');
    
    if (Input::hasFile('image'))
    {
        $file = array('image' => Input::file('image'));
        if (Input::file('image')->isValid()) {
        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renaming image
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        $input['image'] =$destinationPath. '/'.$fileName;
        Product::create( $input );
        return Redirect::route('dashboard.product.index')->with('message', 'Product Create');
        }
        }else {
        Product::create( $input );
        return Redirect::route('dashboard.product.index')->with('message', 'Product Produk Create');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       return view('toko.admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Request $request)
    {
       $this->validate($request, $this->rules);
    $input = array_except(Input::all(), '_method');
    
    if (Input::hasFile('image'))
    {
        $file = array('image' => Input::file('image'));
        if (Input::file('image')->isValid()) {
        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renaming image
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
        $input['image'] =$destinationPath. '/'.$fileName;
        $product->update($input); 
        return Redirect::route('dashboard.product.index')->with('message', 'Product edited');
        }
        }else {
        $product->update($input); 
        return Redirect::route('dashboard.product.index')->with('message', 'Product edited');
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
        $product->delete();
    return Redirect::route('dashboard.product.index');
    }
}
