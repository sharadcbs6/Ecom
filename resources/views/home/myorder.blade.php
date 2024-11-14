<!DOCTYPE html>
<html>

<head>
  @include('home.head')
  <style type="text/css">
    .div_center{
       display: flex;
       justify-content: center;
       align-items: center;
       margin: 60px;
  
    }
    table{
        border: 2px solid black;
        text-align: center;
        width: 80%;
    }
    th{
        border: 2px solid skyblue;
        background-color: black;
        font-size: 18px;
        color: white;
        padding: 10px;
        font-weight: bold;
        text-align: center;
    }
    td{
        border: 1px solid skyblue;
        padding: 10px;
        font-size: 16px;
        text-align: center;
        vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.nav')
    <!-- end header section -->
 
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  
  <!-- end shop section -->







<div class="div_center">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Delivery Status</th>
            <th>Image</th>
        </tr>
        @foreach($order as $order)
        <tr>
            <td>{{$order->product->Title}}</td>
            <td>{{$order->product->Price}}</td>
            <td>{{$order->status}}</td>
            <td>
                <img height="300" width="200" src="/products/{{$order->product->Image}}" alt="">
            </td>
        </tr>
        @endforeach
    </table>
</div>

   

  <!-- info section -->

  @include('home.info')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>