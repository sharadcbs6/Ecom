<!DOCTYPE html>
<html>
  <head> 
  @include('admin.head')

    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;

        }
        input[type="text"]{
            height: 2.5rem;
            width: 15rem;
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
            <h1 style="color:white;">Update Category</h1>
        <div class="div_deg">
            <form action="{{url('update_category',$data->id)}}" method="post">
                @csrf
                <input type="text" name="category" value="{{$data->category_name}}">
                <input class="btn btn-primary" type="submit" value="Update Category">
                </form>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>