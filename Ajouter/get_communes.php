<?php
// Inclure la connexion à la base de données
include('../connexion.php');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer la province sélectionnée depuis la requête AJAX
if (isset($_GET["province"])) {
    $selectedProvince = $_GET["province"];
     
    // Requête pour récupérer les communes de la province sélectionnée
    $sqlCommunes = "SELECT id, name FROM communes WHERE province_id = $selectedProvince";
    $resultatCommunes = $conn->query($sqlCommunes);

    // Vérifiez s'il y a des résultats
    if ($resultatCommunes->num_rows > 0) {
        // Générer les options dynamiquement
        while ($ligneCommune = $resultatCommunes->fetch_assoc()) {
            $idCommune = $ligneCommune['id'];
            $nomCommune = $ligneCommune['name'];
            echo '<option value="' . $idCommune . '">' . $nomCommune . '</option>';
        }
    } else {
        echo '<option value="">Aucune commune trouvée</option>';
    }
} else {
    echo '<option value="">Sélectionnez d\'abord une province</option>';
}

// Fermer la connexion MySQL
$conn->close();
?>

