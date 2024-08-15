<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: logout.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de la carte</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
<link rel="shortcut icon" href="assets/images/fav.jpg">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
<?php
// Vérifier si les coordonnées X et Y ont été envoyées depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["x"]) && isset($_POST["y"])) {
    // Récupérer les coordonnées X et Y depuis le formulaire
    $x = $_POST["x"];
    $y = $_POST["y"];
    echo '
    <div class="col-sm-8">
    <button class="btn btn-success btn-sm" style="margin-left:989px;margin-top: 316px;"><a href="index.php" style="color:white;text-decoration: none;">Retour à la page principale</a></button>
   </div>
</div>';

} else {
    // Si les coordonnées X et Y ne sont pas disponibles, rediriger vers la page du formulaire
    header("Location: index.php");
    exit;
}
?>
<!-- Inclure les fichiers CSS et JavaScript de Leaflet -->



<!-- Créer une balise <div> pour afficher la carte -->
<div id="map" style="width: 800px; height: 600px; margin-top: -345px;"></div>

<script>
    // Utiliser les coordonnées X et Y pour centrer la carte
    var map = L.map('map').setView([<?php echo $x; ?>, <?php echo $y; ?>], 13);

    // Ajouter une couche de carte (par exemple, OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    // Tracer un polygone pour représenter la zone (par exemple, un carré de 100 unités autour des coordonnées X et Y)
    var polygon = L.polygon([
        [<?php echo $x; ?> - 50, <?php echo $y; ?> - 50],
        [<?php echo $x; ?> - 50, <?php echo $y; ?> + 50],
        [<?php echo $x; ?> + 50, <?php echo $y; ?> + 50],
        [<?php echo $x; ?> + 50, <?php echo $y; ?> - 50]
    ]).addTo(map);
</script>
</body>
</html>


