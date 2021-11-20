<?php

include 'connect.php';
if(isset($_POST['submit']))
{
	if (isset($_POST["ProductName"])&&isset($_POST["InvoiceNo"])&& isset($_POST["InvoiceDate"])&&isset($_POST["Quantity"])) {
    $ProductName=$_POST['ProductName'];
	$InvoiceNo=$_POST['InvoiceNo'];
	$InvoiceDate=$_POST['InvoiceDate'];
	$Quantity=$_POST['Quantity'];
	$sql="insert into sales (ProductName,InvoiceNo,InvoiceDate,Quantity)
	values('$ProductName','$InvoiceNo','$InvoiceDate','$Quantity')";
    
	$result=mysqli_query($con,$sql);
	
if($result)
{
	header('location:displaysales.php');
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

    <title>Sales</title>
  </head>
  <body>
    <h1>Sales</h1>
	<div class="container my-5">
	<form method="post">
 <div class="mb-3">
    <label>ProductName</label>
    <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName">
  </div>
  <div class="mb-3">
    <label>InvoiceNo</label>
    <input type="text" class="form-control" placeholder="Enter InvoiceNo" name="InvoiceNo">
  </div>
  <div class="mb-3">
    <label>InvoiceDate</label>
    <input type="date" class="form-control" placeholder="Enter InvoiceDate YYYY-MM-DD" name="InvoiceDate">
  </div>
   <div class="mb-3">
    <label>Quantity</label>
    <input type="text" class="form-control" placeholder="Enter Quantity" name="Quantity">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
	</div>

  </body>
</html>