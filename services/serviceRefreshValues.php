<?php
// database connection
include '../includes/connection.php';

$sql = "SELECT x, y, z, g1, g2, g3 FROM data ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    for($i=0; $i<mysqli_num_rows($result); $i++){
    	$row[$i] = mysqli_fetch_assoc($result);
    	json_encode($row[$i]);
	}
	echo json_encode($row);
} else {
    echo "0 results";
}

?>
