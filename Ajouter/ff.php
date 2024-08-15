<?php
include('../connexion.php');
// Récupérez la valeur de la province depuis la requête AJAX
$province = $_GET['province'];

// Effectuez une requête SQL en fonction de la province
// Remarque : Assurez-vous de sécuriser cette requête contre les injections SQL
// et de personnaliser la logique de recherche en fonction de vos besoins.

// Par exemple, pour récupérer les résultats de la base de données :
 $sql = "SELECT * FROM communes WHERE province_id = '$province'";
 $result = $conn->query($sql);

// Ensuite, générez le HTML pour les résultats (c'est un exemple simplifié) :

    if ($result->num_rows > 0) {
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label>Commune :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectCommune" name="commune" required>';

        // Générer les options pour les communes de la province sélectionnée
        while ($ligneCommune = $result->fetch_assoc()) {
            $idCommune = $ligneCommune['id'];
            $nomCommune = $ligneCommune['name'];
            echo '<option value="' . $idCommune . '">' . $nomCommune . '</option>';
        }

        echo '</select>';
        echo '</div>';
        echo '</div>';
    } 

// Remarque : Vous devez personnaliser cette partie en fonction de votre base de données et de vos besoins.

?>
