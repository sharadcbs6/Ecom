<!DOCTYPE html>
<html>

<head>
  @include('home.head')
  <style type="text/css">
    
    .img-box{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items:center;
      padding: 40px;
    }
    .detail-box{
      padding: 15px;
     
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
   @include('home.nav')
    <!-- end header section -->
    <!-- slider section -->


    <!-- end slider section -->
  </div>
  <!-- end hero area -->
<!-- product details start -->
<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        
        <div class=" col-md-10">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="/products/{{$product->Image}}"  width="400" alt="">
              </div>
              <div class="detail-box">
                <h6>
                 {{$product->Title}}
                </h6>
                <h6>
                  Price
                  <span>
                   Rs: {{$product->Price}}
                  </span>
                </h6>
              </div>
             
              <div class="detail-box">
                <h6>
                  Cateogry: {{$product->Category}}

                </h6>
                <h6>
                  Available Quantity: 
                  <span>
                 {{$product->Quantity}}
                  </span>
                </h6>
              </div>
              <div class="detail-box">
                <p>{{$product->Description}}</p>
              </div>
             
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
     
    </div>
  </section>

<!-- product details end -->
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