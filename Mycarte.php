<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de la carte</title>
</head>
<body>
<?php
// Connexion à la base de données
include('connexion.php');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les valeurs de X et Y depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["x"];
    $y = $_POST["y"];

    // Valider et nettoyer les données (vous devez implémenter cette partie)

    // Insérer les données dans la base de données
    $sql = "INSERT INTO positions (x, y) VALUES ('$x', '$y')";

    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT x, y FROM positions";
        $result = $conn->query($sql);
        
        $x_data = [];
        $y_data = [];
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $x_data[] = $row["x"];
                $y_data[] = $row["y"];
            }
        }
        echo '<canvas id="myChart"></canvas>';
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
   
}

// Fermer la connexion
$conn->close();
?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'Data Points',
            data: [
                <?php
                for ($i = 0; $i < count($x_data); $i++) {
                    echo "{x: " . $x_data[$i] . ", y: " . $y_data[$i] . "},";
                }
                ?>
            ],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                type: 'linear',
                position: 'bottom'
            },
            y: {
                min: 0
            }
        }
    }
});
</script>
</body>
</html>