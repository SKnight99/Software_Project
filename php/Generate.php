<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

$month = $_POST['month'];
$year = $_POST['year'];
// fetch the data
$conn = new mysqli('localhost','root','','people_health_pharmacy');
$rows = mysqli_query($conn, "SELECT * FROM product WHERE MONTH(happened_at) = $month AND YEAR(happened_at) = $year"); 

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);

?>
