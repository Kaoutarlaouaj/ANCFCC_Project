<?php
// Remplacez 'votre_nom_de_bdd', 'votre_nom_utilisateur', 'votre_mot_de_passe' par vos véritables identifiants de base de données.
include('../connexion.php');


    $selectedDPANEF = $_GET['dpanef'];
    //$selectedZone = $_GET['zone'];

    // Requête SQL pour obtenir les districts forestiers en fonction de DPANEF et de la zone sélectionnée
    $sql = "SELECT id, distinct_forestiers_name FROM distinct_forestiers WHERE dpanef_id = $selectedDPANEF ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Générer les options pour la liste déroulante des districts forestiers
        $options = '';
        while ($row = $result->fetch_assoc()) {
            $districtId = $row['id'];
            $districtName = $row['distinct_forestiers_name'];
            $options .= '<option value="' . $districtId . '">' . $districtName . '</option>';
        }
        echo $options;
    } 


$conn->close();
?>
