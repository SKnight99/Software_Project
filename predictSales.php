<?php
$pageTitle = "Predict Sales";
$additionalReferences = '
<link rel="stylesheet" href="css/modal.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
';
include "header.php";
?>

<div id="content__header">
    <span class="title">
        Predict Sales
    </span>
</div>
<div id="content">
  <form action="getPredictSales.php" method="post">
    <br>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input type="text"  name="month" placeholder="Month (1-12)" required><br>
      <input type="submit" name = "generate " value="Generate">
  </form>
</div>


<?php include "footer.php"; ?>
