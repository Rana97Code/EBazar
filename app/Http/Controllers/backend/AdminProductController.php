<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
// use Intervention\Image;
// use Image;
// use App\Images;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewDashbord(){
        return view('backend/dashbord');
    }

    public function ViewProduct()
    {
        $product = Product::orderBy('id', 'desc')->get();
       
        return view('backend/adminProduct', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function uploadproduct(Request $request)
    {
    //    Product::create([
    //        'p_id' => $request -> p_id,
    //        'p_category' => $request -> p_category,
    //        'p_name' => $request -> p_name,
    //        'p_image' => $request-> p_image,
    //        'p_price' => $request-> p_price,
    //        'quantity' => $request-> quantity,
    //    ]);

    $addproduct = new Product();

    $addproduct->p_id = $request->p_id;
    $addproduct->p_category = $request->p_category;
    $addproduct->p_name = $request->p_name;
    $addproduct->p_price = $request->p_price;
    $addproduct->quantity = $request->quantity;

    if ($request->hasFile('p_image')) {
        //insert that image
        $productImage = $request->file('p_image');
        $imgName = rand(1111, 9999) . date('.d-m-y.') . $productImage->getClientOriginalExtension();
        $location = public_path('backend/images/productImage/' . $imgName);
        //Image::make($productImage)->save($location);
        // $productImage->resize(500,500)->save($location);
        //for moving file
        // $request->p_image->move($location ,$imgName);
         $productImage->move($location);


        $addproduct->p_image = $imgName;
    }
    $addproduct->save();
    

       return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
