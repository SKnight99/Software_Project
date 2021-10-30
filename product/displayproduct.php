<?php
include 'connect.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>DisplayProduct</title>
  </head>
  <body>
    <h1>DisplayProduct</h1>
	<div class="container my-5">
	<button class="btn btn-primary"><a href="product.php" class="text-light">Add Product</a></button>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">ProductID</th>
      <th scope="col">ProductName</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
	  <th scope="col">Price</th>
	  <th scope="col">Function</th>
    </tr>
  </thead>
  <?php
  $sql="Select * from product";
  $result=mysqli_query($con,$sql);
  if($result)
  {
	  while($row=mysqli_fetch_assoc($result))
	  {
		  $ProductID=$row['ProductID'];
		  $ProductName=$row['ProductName'];
		  $Description=$row['Description'];
		  $Quantity=$row['Quantity'];
		  $Price=$row['Price'];	
		  echo '<tr>
      <th scope="row">'.$ProductID.'</th>
      <td>'.$ProductName.'</td>
      <td>'.$Description.'</td>
      <td>'.$Quantity.'</td>
	  <td>'.$Price.'</td>
	  <td>
	  <button class="btn btn-info"><a href="edit.php? editProductID='.$ProductID.'" class="text-light">Edit</a></button>
	  <button class="btn btn-danger"><a href="delete.php? deleteProductID='.$ProductID.'" class="text-light">Delete</a></button>
	  </td>
    </tr>';
	  }
  }
  ?>

	</div>
	 </body>
</html>