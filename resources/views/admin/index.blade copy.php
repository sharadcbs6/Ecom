<!DOCTYPE html>
<html>
  <head> 
  @include('admin.head')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
         @include('admin.pagecontent')
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>