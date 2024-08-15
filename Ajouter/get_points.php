<?php
include('../connexion.php');
$query = "SELECT * FROM markers where id_distraction =".$row['id'];
$result = $conn->query($query);

$points = array();
while ($rowqs = $result->fetch_assoc()) {
    $points[] = $rowqs;
}

echo json_encode($points);
?>
