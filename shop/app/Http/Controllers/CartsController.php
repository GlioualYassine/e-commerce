<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.checkout');
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

        if(!$request->product_id){
            return ['message'=>'Cart item',
            'count'=>Cart::where('user_id',auth()->user()->id)->sum('qty')

        ];
        }



        $product = Product::where('id',$request->product_id)->first();
        $productFoundInCart = Cart::where('product_id',$request->product_id)
                             ->where('user_id', Auth()->user()->id)
                            ->get();
        if($productFoundInCart->isEmpty())
        {
           $cart =  Cart::create([
                'product_id'=> $product->id,
                'qty'=>1,
                'price'=>$product->sale_price,
                'user_id'=>auth()->user()->id
            ]);
        }
        else{
            $cart = $productFoundInCart[0]->increment('qty');
            $productusercount = Cart::where('user_id',auth()->user()->id)->sum('qty');
        }

        if($cart){
            return ['message'=>'Cart Updated',
                    'count'=>$productusercount
                ];
        }
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
        //
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
    public function getcartitem()
    {
        $carts = Cart::with('products')
                    ->where('user_id',auth()->user()->id)->get();
        $finaldata = [];
        foreach($carts as $cartitem){
            foreach($cartitem->products as $prod){
                $finaldata[$prod->id]['id']= $prod->id;
                $finaldata[$prod->id]['name']= $prod->name;
                $finaldata[$prod->id]['qty']= $cartitem->qty;
                $finaldata[$prod->id]['sale_price']= $cartitem->price;
                $finaldata[$prod->id]['total']= $cartitem->price * $cartitem->qty;

            }
        }
        return response()->json($finaldata);
    }

    public function payment(Request $request){
        return $request;
    }
}
