<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::orderBy('id', 'desc')->get();
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'category_name', 'brand_name')
            ->orderBy('id', 'desc')
            ->get();


        return view('admin.pages.product.product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.pages.product.product-create', compact('categories', 'brands'));
    }

    protected function productValidation($request)
    {
        $this->validate($request, [
            'product_name' => 'required|max:20|min:2|regex:/^[\pL\s\-]/u',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_quantity' => 'required|numeric',
            'pub_status' => ''
        ]);
    }

    protected function productImgupload($request)
    {
        if ($request->hasFile('product_img')) {
            $file = $request->product_img;
            $imagName = $request->product_name . '-' . time() . '.' . $file->getClientOriginalExtension();
            $dir = public_path('/uploads/' . $imagName);
            Image::make($file)->save($dir);

            return $imagName;
        }
    }

    protected function productDataSave($request, $productImg)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_short_des = $request->product_short_des;
        $product->product_long_des = $request->product_long_des;
        $product->product_img = $productImg;
        $product->product_quantity = $request->product_quantity;
        $product->pub_status = $request->pub_status;
        $product->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->productValidation($request);
        $productImg = $this->productImgupload($request);
        $this->productDataSave($request, $productImg);

        return Redirect::to('product')->with('message', 'Product Added');
        //return redirect()->back()->with('message', 'Product Added');
    }

    public function unpublish($id)
    {
        $pub_status = Product::find($id);
        $pub_status->pub_status = 1;
        $pub_status->save();

        return Redirect::to('product')->with('message', 'Product Unpublish');
    }

    public function publish($id)
    {
        $pub_status = Product::find($id);
        $pub_status->pub_status = 0;
        $pub_status->save();

        return Redirect::to('product')->with('message', 'Product publish');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.pages.product.product-update', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->productValidation($request);
        unlink(public_path('/uploads/'.$product->product_img));
        $productImg = $this->productImgupload($request);

        if ($productImg) {
            $this->productUpdateWithImg($product, $request, $productImg);
        } else {
            $this->productUpdateWithoutImg($product, $request);
        }

        return Redirect::to('product')->with('message', 'Product Updated');
    }

    protected function productUpdateWithImg($product, $request, $productImg)
    {
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_short_des = $request->product_short_des;
        $product->product_long_des = $request->product_long_des;
        $product->product_img = $productImg;
        $product->product_quantity = $request->product_quantity;
        $product->pub_status = $request->pub_status;
        $product->save();
    }

    protected function productUpdateWithoutImg($product, $request)
    {
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_short_des = $request->product_short_des;
        $product->product_long_des = $request->product_long_des;
        $product->product_quantity = $request->product_quantity;
        $product->pub_status = $request->pub_status;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::to('product')->with('message', 'Product Deleted');
    }
}
