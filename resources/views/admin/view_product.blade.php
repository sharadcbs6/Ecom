<!DOCTYPE html>
<html>
  <head> 
  @include('admin.head')
  <style class="text/css">
   .div_deg{
   display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 3rem;
   }
   .table_deg{
   width: 100%;
   border-collapse: collapse;
   border: 2px solid yellowgreen !important;
   }
   th{
    background-color: skyblue;
    color: white;
    font-weight: bold;
    font-size: 25px;
    padding: 10px;
   }
   td{
    border: 1px solid skyblue;
    text-align: center;
    color: white;
   }
   input[type = "text"]{
    width: 200px;
        height: 50px;
        font-size: 20px;
   }
  </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <form action="{{url('product_search')}}" method="get">
            @csrf
            <input type="search" name="search" >
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>
       <div class="div_deg">
        <table class="table_deg">
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($product as $products)
            <tr>
                <td>{{$products->Title}}</td>
                <td>{{$products->Description}}</td>
                <td>{{$products->Category}}</td>
                <td>{{$products->Price}}</td>
                <td>{{$products->Quantity}}</td>
                <td><img src="products/{{$products->Image}}" alt="Image" height="120" width="120"></td>
                <td><a class="btn btn-danger" href="{{url('delete_product',$products->id)}}" onclick="confirmation(event)">Delete</a></td>
                <td><a class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a></td>
            </tr>
            @endforeach
        </table>  
      </div>
      <div class="div_deg">
        {{$product->onEachSide(1)->links()}}
      </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')

    
  </body>
</html>