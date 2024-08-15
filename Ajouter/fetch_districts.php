<?php
include('../connexion.php');

if (isset($_POST["dpanef"]) && isset($_POST["zones"])) {
    $selectedDpanefId = $_POST["dpanef"];
    $selectedZoneId = $_POST["zones"];
    
    $sqlDistricts = "SELECT * FROM distinct_forestiers WHERE dpanef_id = $selectedDpanefId AND zones_forestiere_id = $selectedZoneId";
    $resultDistricts = $conn->query($sqlDistricts);
    
    $districts = array();
    while ($row = $resultDistricts->fetch_assoc()) {
        $districts[] = $row;
    }
    
    echo json_encode($districts);
}

$conn->close();
?>
