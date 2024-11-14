<!DOCTYPE html>
<html>
  <head> 
  @include('admin.head')
  <style class="text/css">
    table{
        border:2px solid skyblue;
        text-align: center;

    }
    th{
        background-color: skyblue;
        color: white;
        font-weight: bold;
        padding: 10px;
        font-size: 18px;
        text-align: center;
    }
    .table_center{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    td{
        border: 1px solid skyblue;
        color:white;
        padding: 10px;
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
       <div class="table_center">
        <table>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Print PDF</th>
            </tr>
            @foreach($order as $order)
            <tr>
               <td>{{$order->name}}</td>
               <td>{{$order->rec_address}}</td>
               <td>{{$order->phone}}</td>
               <td>{{$order->product->Title}}</td>
               <td>{{$order->product->Price}}</td>
               <td>
                <img width="150" src="/products/{{$order->product->Image}}" alt="">
               </td>
               <td>{{$order->status}}</td>
               <td>
                <a class="btn btn-primary" href="{{url('on_the_way',$order->id)}}">On the way</a>
                <a class="btn btn-success" href="{{url('delivered',$order->id)}}">Delivered</a>
               </td>
               <td>

                   <a class="btn btn-secondary" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
               </td>
            </tr>
            @endforeach
        </table>
       </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>