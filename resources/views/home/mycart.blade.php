<!DOCTYPE html>
<html>
<head>
    @include('home.head')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }
        table {
            text-align: center;
            width: 75%;
            border: 2px solid black;
        }
        th {
            border: 2px solid black;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            background-color: black;
        }
        td {
            border: 1px solid skyblue;
            padding: 10px;
        }
        .cart_value{
            text-align: center;
            margin-bottom:70px;
            padding: 18px;
        }
        .order_deg{
            padding-right: 100px;
            margin-top: -2rem;
        }
        label{
            display: inline-block;
            width: 150px;
        }
        .div_gap{
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.nav')
        <!-- end header section -->
    </div>
    <!-- end hero area -->
    
    <div class="div_deg">
        <div class="order_deg">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf
                <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>
                <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address" >{{Auth::user()->address}}</textarea>
                </div> 
                <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone"  value="{{Auth::user()->phone}}">
                </div>
                <div class="div_gap">
                <input class="btn btn-primary"  type="submit" value="Place Order">
                </div>
                 
            </form>
        </div>
        <table>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>
            <?php $totalValue = 0; ?>
            @foreach($cart as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->Title }}</td>
                    <td>${{ $cartItem->product->Price }}</td>
                    <td>
                        <img src="/products/{{ $cartItem->product->Image }}" width="150" alt="">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('delete_cart', $cartItem->id) }}">Remove</a>
                    </td>
                </tr>
                <?php $totalValue += $cartItem->product->Price; ?>
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h3>Total value of cart is: ${{ $totalValue }}</h3>
    </div>

    <!-- contact section -->
    <!-- end contact section -->
    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
