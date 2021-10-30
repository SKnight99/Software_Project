<?php

include 'connect.php';
$ProductID=$_GET['editProductID'];
$sql="Select * from product where ProductID=$ProductID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$ProductName=$row['ProductName'];
$Description=$row['Description'];
$Quantity=$row['Quantity'];
$Price=$row['Price'];	

if(isset($_POST['submit']))
{
	if (isset($_POST["ProductName"])&& isset($_POST["Description"])&&isset($_POST["Quantity"])&&isset($_POST["Price"])) {
    
	$ProductName=$_POST['ProductName'];
	$Description=$_POST['Description'];
	$Quantity=$_POST['Quantity'];
	$Price=$_POST['Price'];
	$sql="update product set ProductID=$ProductID,ProductName='$ProductName',Description='$Description',Quantity='$Quantity',Price=$Price where ProductID=$ProductID";	
    
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

    <title>Edit Product</title>
  </head>
  <body>
    <h1>Edit Product</h1>
	<div class="container my-5">
	<form method="post">
 
  <div class="mb-3">
    <label>ProductName</label>
    <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName" value=<?php echo $ProductName?>>
  </div>
  <div class="mb-3">
    <label>Description</label>
    <input type="text" class="form-control" placeholder="Enter Description" name="Description" value=<?php echo $Description?>>
  </div>
   <div class="mb-3">
    <label>Quantity</label>
    <input type="text" class="form-control" placeholder="Enter Quantity" name="Quantity" value=<?php echo $Quantity?>>
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="text" class="form-control" placeholder="Enter Price" name="Price" value=<?php echo $Price?>>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Edit</button>
</form>
	</div>

  </body>
</html>