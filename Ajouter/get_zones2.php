<?php
// Remplacez 'votre_nom_de_bdd', 'votre_nom_utilisateur', 'votre_mot_de_passe' par vos véritables identifiants de base de données.
include('../connexion.php');


    $selectedDPANEF = $_GET['dpanef'];
    
    // Requête SQL pour obtenir les zones en fonction de DPANEF sélectionné
    $sql = "SELECT id, zone_name FROM zones_forestieres WHERE dpanef_id = $selectedDPANEF";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Générer les options pour la liste déroulante des zones
        $options = '';
        while ($row = $result->fetch_assoc()) {
            $zoneId = $row['id'];
            $zoneName = $row['zone_name'];
            $options .= '<option value="' . $zoneId . '">' . $zoneName . '</option>';
        }
        echo $options;
    } else {
        echo '<option value="">Aucune zone trouvée</option>';
    }


$conn->close();
?>
