<?php

include 'connect.php';
$SalesID=$_GET['editSalesID'];
$sql="Select * from sales where SalesID=$SalesID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$ProductName=$row['ProductName'];
$InvoiceDate=$row['InvoiceDate'];
$InvoiceNo=$row['InvoiceNo'];	
$Quantity=$row['Quantity'];


if(isset($_POST['submit']))
{
	if (isset($_POST["ProductName"])&& isset($_POST["InvoiceDate"])&&isset($_POST["InvoiceNo"])&&isset($_POST["Quantity"])) {
    
	$ProductName=$_POST['ProductName'];
	$Description=$_POST['InvoiceDate'];
	$InvoiceNo=$_POST['InvoiceNo'];
	$Quantity=$_POST['Quantity'];
	$sql="update sales set SalesID=$SalesID,ProductName='$ProductName',InvoiceDate='$InvoiceDate',InvoiceNo='$InvoiceNo',Quantity=$Quantity where SalesID=$SalesID";	
    
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

    <title>Edit Sales</title>
  </head>
  <body>
    <h1>Edit Sales</h1>
	<div class="container my-5">
	<form method="post">
 
  <div class="mb-3">
    <label>ProductName</label>
    <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName" value=<?php echo $ProductName?>>
  </div>
  <div class="mb-3">
    <label>InvoiceDate</label>
    <input type="date" class="form-control" placeholder="Enter InvoiceDate" name="InvoiceDate" value=<?php echo $InvoiceDate?>>
  </div>
   <div class="mb-3">
    <label>InvoiceNo</label>
    <input type="text" class="form-control" placeholder="Enter InvoiceNo" name="InvoiceNo" value=<?php echo $InvoiceNo?>>
  </div>
  <div class="mb-3">
    <label>Quantity</label>
    <input type="text" class="form-control" placeholder="Enter Quantity" name="Quantity" value=<?php echo $Quantity?>>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Edit</button>
</form>
	</div>

  </body>
</html>