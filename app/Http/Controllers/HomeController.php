<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index(){
        // logic to display admin dashboard
        $user=User::where('usertype','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','product','order','delivered'));  // replace 'admin.dashboard' with your admin dashboard view path
    }

    public function home(){
           
        $products = Product::all();
        if(Auth::id()){
            $user = Auth::user();         // Get the authenticated user
            $userid = $user->id;          // Get the user ID
            $count = Cart::where('user_id', $userid)->count();
            }
        else{
            $count='';
        }    
        return view('home.index',compact('products','count'));  // replace 'home' with your home page view path
        }

        public function login_home(){
            $products = Product::all();  // Get all products
            if(Auth::id()){
                $user = Auth::user();         // Get the authenticated user
                $userid = $user->id;          // Get the user ID
                $count = Cart::where('user_id', $userid)->count();
                }
            else{
                $count='';
            }    
            
            return view('home.index', compact('products', 'count')); // Pass both products and count to the view
        }
        
      
    public function product_details($id){
        $product = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();         // Get the authenticated user
            $userid = $user->id;          // Get the user ID
            $count = Cart::where('user_id', $userid)->count();
            }
        else{
            $count='';
        }    
        return view('home.product_details',compact('product','count'));  // replace 'home' with your home page view path
    }

    public function add_cart($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        flash()->success("Cart added successfully");
        return redirect()->back();  // replace 'home' with your home page view path
    }

    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();         // Get the authenticated user
            $userid = $user->id;          // Get the user ID
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
            
            }
        else{
            $count='';
        }   
        return view('home.mycart',compact('count','cart'));  // replace 'home' with your home page view path
    }

    public function delete_cart($id){
        Cart::find($id)->delete();
        flash()->success("Cart item deleted successfully");
        return redirect()->back();  // replace 'home' with your home page view path
    }

    public function confirm_order(Request $request){
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        $order=new Order;
        $userid=Auth::user()->id;
        $cart=Cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$address;
            $order->phone=$phone;
            $order->product_id=$carts->product_id;
            $order->user_id=$userid;
            $order->save();
        }
        $cart_remove=Cart::where('user_id',$userid)->get();
        foreach($cart_remove as $cart_removals){
                   $data=Cart::find($cart_removals->id);
                $data->delete();
                }
        // return view('home.confirm_order',compact('count','cart'));  // replace 'home' with your home page view path
        flash()->success('Product ordered successfully');
        return redirect()->back();
    }

    public function myorders(){
        $user=Auth::user()->id;
        $count=Cart::where('user_id',$user)->get()->count();
        $order=Order::where('user_id',$user)->get();
        return view('home.myorder',compact('count','order'));
    }
}   

