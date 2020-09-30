<?php
// database connection
include '../includes/connection.php';

if (isset($_REQUEST["arr"])) {
	$arr = json_decode($_REQUEST["arr"]);
}
else {
	echo "INVALID or MISSING Arguments";
	die();
}

$j=$arr->size;
echo $cnt= $j[0]*6;

for ($i=0; $i < $cnt; $i=$i+6) { 
	$x1=$arr->data[$i];
	$x2=$arr->data[$i+1];
	$x3=$arr->data[$i+2];
	$x4=$arr->data[$i+3];
	$x5=$arr->data[$i+4];
	$x6=$arr->data[$i+5];
	$sql = "INSERT INTO data (x, y, z, g1, g2, g3) VALUES ($x1, $x2, $x3, $x4, $x5, $x6)";
	$result = mysqli_query($conn, $sql);	
}

if ($conn->query($sql) === TRUE) {
	echo "New records created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
