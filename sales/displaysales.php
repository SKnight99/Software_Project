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

  <title>DisplaySales</title>
</head>

<body>
  <h1>DisplaySales</h1>
  <div class="container my-5">
    <button class="btn btn-primary"><a href="sales.php" class="text-light">Add sales</a></button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">SalesID</th>
          <th scope="col">ProductName</th>
          <th scope="col">InvoiceDate</th>
		  <th scope="col">InvoiceNo</th>
          <th scope="col">Quantity</th>
          <th scope="col">TotalSales</th>
          <th scope="col">Function</th>
        </tr>
      </thead>
      <?php
      $sql = "Select * from sales";
      $result = mysqli_query($con, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $SalesID = $row['SalesID'];
          $ProductName = $row['ProductName'];
          $InvoiceDate = $row['InvoiceDate'];
		  $InvoiceNo = $row['InvoiceNo'];
          $Quantity = $row['Quantity'];
          $TotalSales = $row['TotalSales'];
          echo '<tr>
      <th scope="row">' . $SalesID . '</th>
      <td>' . $ProductName . '</td>
      <td>' . $InvoiceDate . '</td>
	  <td>' . $InvoiceNo . '</td>
      <td>' . $Quantity . '</td>
	  <td>' . $TotalSales . '</td>
	  <td>
	  <button class="btn btn-info"><a href="edit.php? editSalesID=' . $SalesID . '" class="text-light">Edit</a></button>
	  <button class="btn btn-danger"><a href="delete.php? deleteSalesID=' . $SalesID . '" class="text-light">Delete</a></button>
	  </td>
    </tr>';
        }
      }
      ?>

  </div>
</body>

</html>