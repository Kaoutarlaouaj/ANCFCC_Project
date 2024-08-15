<?php
include('connexion.php');

if (isset($_GET["dpanef"])) {
    $dpanefId = $_GET["dpanef"];

    $sqlZones = "SELECT zone_name FROM zones_forestiers WHERE dpanef_id = $dpanefId";
    $resultatZones = $conn->query($sqlZones);

    if ($resultatZones->num_rows > 0) {
        while ($ligneZones = $resultatZones->fetch_assoc()) {
            $nomZones = $ligneZones['zone_name'];
            echo '<option value="' . $nomZones . '">' . $nomZones . '</option>';
        }
    } else {
        echo "Aucune zone trouvée pour cette zone forestière.";
    }
}
$conn->close();
?>
