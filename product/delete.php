<?php
include 'connect.php';
if(isset($_GET['deleteProductID']))
{
	$ProductID=$_GET['deleteProductID'];
	$sql="delete from product where ProductID=$ProductID";
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
?>