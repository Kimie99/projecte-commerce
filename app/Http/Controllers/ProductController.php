<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('user.products', compact(['products']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreProductRequest $request)
    {

            $request->validated();

            // ensure the request has a file before we attempt anything else.
            $name = $request->file('image')->getClientOriginalName();
            // Save the file locally in the storage/public/ folder under a new folder named /product
            $path = $request->file('image')->storePubliclyAs('images', "{$name}", 'public');

            $product =Product::create([
                "product_name" => $request->prod_name ,
                "product_price" => $request->prod_price,
                "product_category" => $request->prod_ctgy,
                "description"=> $request->prod_desc,
                "product_qty"=> $request->prod_qty,
                "product_image" => $name,
                "path_image"=>$path


            ]);
            $product->save(); // Finally, save the record.

            return redirect('product')->with('status', 'Image Has been successfully uploaded !!!');



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
    public function edit(Product $product)
    {
       // $product = Product::find($id);

        return view ('product.updateProduct', compact(['product']));
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

            // $request->validated();
            $product = Product::find($id);

            $product->product_name = $request->prod_name;
            $product->product_price = $request->prod_price;
            $product->product_category = $request->prod_ctgy;
            $product->description = $request->prod_desc;
            $product->product_qty = $request->prod_qty;

            // $product->update();



        if($request->file('image'))
        {
            // location store images
            $destination = 'storage/images/'.$product->path;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $name = $request->file('image')->getClientOriginalName();
            $path = $file->storePubliclyAs('images', "{$name}", 'public');
            // insert the update image to database
            $input['product_image'] =  $name;
            $input['path_image'] =  $path;
        }

        $product->fill($input);

        if ($product->isDirty()) $product->save();

        return redirect()->route('product.view')->with('status','Product already Updated Successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('status','Product deleted successfully');
    }

    public function view()
    {
        $products = Product::get();
        return view('product.viewProduct', compact(['products']));

    }


    public function trashed()
    {
        // item delete will store in another page same like recycle bin
        $products =Product::onlyTrashed()->get();

        return view('product.deleteProduct', compact(['products']));
    }

    public function restore($id)
    {
        $restore = Product::onlyTrashed()->where('id', $id)->firstOrFail();

        // restore image
        $restore->restore();

        //return to where they belong
        return redirect()->back();
    }

    public function delete($id)
    {
        // permanent delete
         Product::onlyTrashed()->where('id', $id)->forceDelete();

        return redirect()->back();
    }

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('product_name', 'LIKE', "%{$search}%")
            ->orWhere('product_category', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('user.products', compact('products'));
    }

    public function cart()
    {

        return view('user.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['product_qty']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "product_qty" => 1,
                "product_price" => $product->product_price,
                "product_image" => $product->product_image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function change (Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["product_qty"] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success', 'Cart updated successfully');
        }

    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
