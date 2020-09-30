<?php
// database connection
include '../includes/connection.php';

$sql = "DELETE FROM data";
$result = mysqli_query($conn, $sql);

?>