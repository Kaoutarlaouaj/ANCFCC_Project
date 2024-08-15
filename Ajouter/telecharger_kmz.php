   <?php
include('../connexion.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération du fichier .kmz depuis la base de données
$query = "SELECT kmz_content FROM table_kmz WHERE id_distraction = ?";
$stmt = $conn->prepare($query);
$id = $row['id']; // Remplacez 1 par l'ID du fichier .kmz que vous souhaitez récupérer
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($kmzContent);
$stmt->fetch();
$stmt->close();

// Fermeture de la connexion à la base de données
//$conn->close();

// Envoi du fichier .kmz au navigateur
header('Content-Type: application/vnd.google-earth.kmz');
echo $kmzContent;
//exit();
?>