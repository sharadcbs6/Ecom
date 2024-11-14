<!DOCTYPE html>
<html>
  <head> 
  @include('admin.head')
  
  <style type="text/css">
    input[type="text"] {
      width: 20rem;
      height: 2.4rem; 
      
    }
    .add-category{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellowgreen;
        margin-top:5%;
        width:75%;
    }
    th{
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        
    }
    td{
        color:white;
        padding: 10px;
        border: 1px solid skyblue;
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
          <h2 style="text-align:center;margin-bottom:1%;">Add Category</h2>
          <div class="add-category">
            
            <form action="{{url('add_category')}}" method="post">
                @csrf
              <div>
                <input type="text" name="category" required>
              
                <input class="btn btn-primary" type="submit" value="Add Category">
              </div>
              
            </form>
          </div>
            <div>
                <table class="table_deg">
                    <tr>
                        <th >Category Name</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    <tr>
                 
                         @foreach($data as $item)
                            <tr>
                                <td>{{ $item->category_name }}</td>
                                <td>
                                    <a  class="btn btn-success" href="{{url('edit_category',$item->id)}}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$item->id)}}">Delete</a>
                                </td>
                            </tr>
                         @endforeach

                        
                    </tr>
                    </tr>
                </table>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
 
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>