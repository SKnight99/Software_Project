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

    <title>PHP Sales Report</title>
  </head>
  <body>
	<div class="container my-5">
	<table class="table">
  <thead>
    <tr>
      <th scope="col"> </th>
      <th scope="col"> </th>
      <th scope="col"> </th>
      <th scope="col"> </th>
	  <th scope="col"> </th>
	  <th scope="col"> </th>
    </tr>
  </thead>
  <?php
  $month = $_POST['month'];
  $year = $_POST['year'];

  $sql="SELECT * FROM ";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
	  while($row=mysqli_fetch_assoc($result))
	  {
		  echo '<tr>
      <th scope="row">'.$row[''].'</th>
      <td>'.$row[''].'</td>
    </tr>';
	  }
  }
  ?>

	</div>
	 </body>
</html>
