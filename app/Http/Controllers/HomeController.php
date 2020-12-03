<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
//use Darryldecode\Cart\Cart;
use Cart;
//use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('pub_status', 0)
            ->orderBy('updated_at', 'ASC')
            ->get();

        return view('web.pages.home.home', compact('products'));
    }

    public function productCategoryPage($id)
    {
        $products = Product::where('category_id', $id)
            ->orderBy('updated_at', 'ASC')
            ->take(12)
            ->get();

        return view('web.pages.product.product-category', compact('products'));
    }

    public function productSinglrPage($id)
    {
        $singleProduct = Product::where('id', $id)
            ->get();

        return view('web.pages.product.product-single', compact('singleProduct'));
    }

    public function cartAdd($id)
    {
        $product = Product::find($id);

        // $data = array();
        // $data['id'] = uniqid($product->id);
        // $data['name'] = $product->product_name;
        // $data['price'] = $product->product_price;
        // $data['quantity'] = 1;
        // $data['attributes']['s'] = 'xxl';
        // $data['associatedModel'] = $product;

        // \Cart::add($data);

        \Cart::add(array(
            'id' => uniqid($product->id), // inique row ID
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => 1,
            'test' => 'test',
            'attributes' => array(
                'image' => $product->product_img
            ),
            'associatedModel' => $product
        ));

        $itemQuantity = \Cart::getTotalQuantity();

        //$request->session()->put('test', $itemQuantity);

        return response()->json(['success' => 'Added to cart', 'quantity' => $itemQuantity]);
    }

    public function cartView()
    {
        $items = \Cart::getContent();
        $total = \Cart::getTotal();
        $CartEmpty = \Cart::isEmpty();

        return view('web.pages.product.product-cart', compact('items', 'total', 'CartEmpty'));
    }

    public function cartUpdate(Request $request)
    {
        \Cart::update($request->rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => $request->product_qty,
                'price' => $request->product_price
            )
        ]);

        return back();
    }

    public function cartDelete($id)
    {
        \Cart::remove($id);
        return back();
    }

    public function cartEmpty()
    {
        \Cart::clear();
        return back();
    }

    //Auth
    public function login()
    {
        return view('web.pages.login');
    }

    public function register()
    {
        return view('web.pages.register');
    }

    public function contact()
    {
        return view('web.pages.home.home');
    }

    // public function form(Request $request){
    //     return $request->all();
    // }
}
