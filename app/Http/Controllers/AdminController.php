<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function view_category(){
        $data= Category::all();
        return view('admin.category',compact('data')); 
    }
    public function add_category(Request $request){

        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        flash()->success('Category added successfully');
        return redirect()->back();
    }
    public function delete_category($id){
            Category::find($id)->delete();
            flash()->success('Category deleted successfully');
            return redirect()->back();
        }
    public function edit_category($id){
            $data=Category::find($id);
            return view('admin.edit_category',compact('data')); 
        }
    public function update_category(Request $request,$id){
        $category = Category::find($id);
        $category->category_name = $request->category;
        $category->save();
        flash()->success('Category updated successfully');
        return redirect('view_category');
    }
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
   public function upload_product(Request $request){
    
    $data=new Product;
    $data->title=$request->title;
    $data->description=$request->description;
    $data->price=$request->price;
    $data->quantity=$request->quantity;
    $data->category=$request->category;
    $image=$request->image;
    if($image){
        $imageName=time().'.'.$image->getClientOriginalExtension();
       $request->image->move('products',$imageName);
        $data->image=$imageName;
    }
       $data->save();
       flash()->success('Product Added Successfully');
     return redirect()->back();
   }
   public function view_product(){
          $product=Product::paginate(3);
          return view('admin.view_product',compact('product'));
      }
      public function delete_product($id){
            $data=Product::find($id);
            $imagepath=public_path('products/'.$data->Image);
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
            $data->delete();
            flash()->success('Product deleted successfully');
            return redirect()->back();
        }
        public function update_product($id){

            $data=Product::find($id);
            $category=Category::all();
            return view('admin.edit_product',compact('data','category'));
        }
        public function edit_product(Request $request,$id){
            $data=Product::find($id);
            $data->title=$request->title;
            $data->description=$request->description;
            $data->price=$request->price;
            $data->quantity=$request->quantity;
            $data->category=$request->category;
            $image=$request->image;
            if($image){
                $imagepath=public_path('products/'.$data->Image);
            if(file_exists($imagepath)){
                unlink($imagepath);
            }
                $imagename=time().'.'.$image->getClientOriginalExtension();
               $request->image->move('products',$imagename);
                $data->image=$imagename;
            }
           $data->save();
           flash()->success('Product data updated successfully');
           return redirect('/view_product');
        }
        public function product_search(){
            $search=request('search');
            $product=Product::where('title','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->paginate(3);
            return view('admin.view_product',compact('product'));
        }

        public function view_orders(){
            $order=Order::all();
            return view('admin.view_orders',compact('order'));
        }
        public function on_the_way($id){
            $order=Order::find($id);
            $order->status='On the way';
            $order->save();
            flash()->success('Order marked on the way successfully');
            return redirect('/view_orders');

        }
        public function delivered($id){
            $order=Order::find($id);
            $order->status='Delivered';
            $order->save();
            flash()->success('Order delivered successfully');
            return redirect('/view_orders');
        }

        public function print_pdf($id){
            $data=Order::find($id);

    $pdf = Pdf::loadView('admin.invoice', compact('data'));
    return $pdf->download('invoice.pdf');

        }
}
