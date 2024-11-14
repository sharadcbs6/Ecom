<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
       <h3> Customer Name: {{$data->name}} </h3>
       <h3> Customer Address: {{$data->rec_address}} </h3>
       <h3> Customer Phone: {{$data->phone}} </h3>
       <h2> Product Title: {{$data->product->Title}}</h2>
       <h2> Product Price: {{$data->product->Price}}</h2>
       <img height="300" width="250" src="products/{{$data->product->Image}}" alt="">
    </center>
</body>
</html>