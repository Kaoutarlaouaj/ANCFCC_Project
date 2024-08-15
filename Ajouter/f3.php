<?php
// Inclure la connexion à la base de données
include('../connexion.php');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Variable pour stocker l'ID de la province sélectionnée
$selectedProvinceId = null;

// Vérifier si le formulaire a été soumis et si la province a été sélectionnée
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["province"])) {
    $selectedProvinceId = $_POST["province"];
}

// Requête pour récupérer les provinces depuis la table 'provinces'
$sqlProvince = "SELECT id_p, name FROM provinces";
$resultatProvince = $conn->query($sqlProvince);

// Vérifiez s'il y a des résultats
if ($resultatProvince->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 46px;">Province :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListProvince" style="margin-left: 57px;" name="province" required>';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($ligneProvince = $resultatProvince->fetch_assoc()) {
        $idProvince = $ligneProvince['id_p'];
        $nomProvince = $ligneProvince['name'];
        echo '<option value="' . $idProvince . '"';

        // Vérifier si la province est celle qui a été soumise
        if ($selectedProvinceId !== null && $selectedProvinceId == $idProvince) {
            echo ' selected="selected"';
        }

        echo '>' . $nomProvince . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune province trouvée dans la base de données.";
}

// Fermer la connexion MySQL
$conn->close();
?>

<br>
<!-- Liste déroulante pour les communes -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01; margin-left: 34px;">Commune :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListCommune" style="margin-left: 61px;" name="commune" required>
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>

<script>
    // Fonction pour charger les communes en fonction de la province sélectionnée
    function loadCommunes(selectedProvince) {
        // Effectuez une requête AJAX pour obtenir les communes en fonction de la province
        fetch('get_communes.php?province=' + selectedProvince)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des communes
                document.getElementById("selectListCommune").innerHTML = data;
            });
    }

    // Ajoutez un événement de changement à la liste déroulante des provinces
    document.getElementById("selectListProvince").addEventListener("change", function() {
        var selectedProvince = this.value;
        loadCommunes(selectedProvince);
    });

    // Sélectionnez la province par défaut si elle a été précédemment sélectionnée
    var selectedProvince = document.getElementById("selectListProvince").value;
    loadCommunes(selectedProvince);
</script>