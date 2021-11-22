<?php

include 'connect.php';
if(isset($_POST['submit']))
{
	if (isset($_POST["ProductName"])&& isset($_POST["Description"])&&isset($_POST["Quantity"])&&isset($_POST["Price"])) {
    
	$ProductName=$_POST['ProductName'];
	$Description=$_POST['Description'];
	$Quantity=$_POST['Quantity'];
	$Price=$_POST['Price'];
	$sql="insert into product (ProductName,Description,Quantity,Price)
	values('$ProductName','$Description','$Quantity','$Price')";
    
	$result=mysqli_query($con,$sql);
	
if($result)
{
	header('location:displayproduct.php');
}
else
{
die(mysqli_error($con));
}
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Product</title>
  </head>
  <body>
    <h1>Product</h1>
	<div class="container my-5">
	<form method="post">
 <div class="mb-3">
    <label>ProductCategory</label>
    <input type="text" class="form-control" placeholder="Enter Product Category" name="ProductCategory">
  </div>
  <div class="mb-3">
    <label>ProductName</label>
    <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName">
  </div>
  <div class="mb-3">
    <label>Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description">
  </div>
   <div class="mb-3">
    <label>Quantity</label>
    <input type="text" class="form-control" placeholder="Enter Quantity" name="Quantity">
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="text" class="form-control" placeholder="Enter Price" name="Price">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
	</div>

  </body>
</html>