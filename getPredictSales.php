<?php
$pageTitle = "Predict Highest Sales Of Month";
$additionalReferences = '
<link rel="stylesheet" href="css/modal.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
';
include "header.php";
?>

<div id="content__header">
    <span class="title">
        Predict Highest Sales Of Month
    </span>
</div>
<div id="content">
    
  
   <?php
    $month = $_POST['month'];
    $conn=new mysqli('localhost','root','','people_health_pharmacy');
    
    $result = mysqli_query($conn ,"SELECT ProductCategory AS ProductCategory, ProductName,EXTRACT(MONTH FROM InvoiceDate) AS InvoiceDate, MAX(Quantity)AS Quantity FROM sales");
  ?>
  <table class="table table-bordered" id="dashboard" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">Product Category</th>
        <th scope="col">Product Name</th>
        <th scope="col">Month</th>
          <th scope="col">Highest sales</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($result))
          {
              echo "<tr>";
                 echo "<td>" . $row['ProductCategory'] . "</td>";
                 echo "<td>" . $row['ProductName'] . "</td>";
                 echo "<td>" . $row['InvoiceDate'] . "</td>";
                  echo "<td>" . $row['Quantity'] . "</td>";
              echo "</tr>";
          }
    ?>
    </tbody>
  </table>   
    

</div>

<?php include "footer.php"; ?>
