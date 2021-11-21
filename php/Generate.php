<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Sales ID', 'Product Name', 'Invoice Date', 'Invoice No', 'Quantity', 'Total Sales'));

$month = $_POST['month'];
$year = $_POST['year'];
// fetch the data
$conn = new mysqli('localhost','root','','people_health_pharmacy');
$rows = mysqli_query($conn, "SELECT * FROM sales WHERE MONTH(InvoiceDate) = $month AND YEAR(InvoiceDate) = $year");

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);

?>
