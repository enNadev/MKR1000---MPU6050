<?php

include '../includes/connection.php';

$query = "SELECT * FROM data";

if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Data.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No.', 'Ax', 'Ay', 'Az','G1','G2','G3','Time'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>
