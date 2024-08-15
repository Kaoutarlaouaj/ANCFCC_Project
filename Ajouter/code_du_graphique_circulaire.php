<?php
// Inclure le fichier de connexion à la base de données
include('../connexion.php');

// Vérifier la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Requête SQL pour obtenir la superficie totale par région
$sql = "SELECT Province, SUM(Superficie_parcelle_m2) AS superficie_totale FROM distraction GROUP BY Province"; // Remplacez "votre_table" par le nom de votre table dans la base de données

// Exécuter la requête SQL
$result = mysqli_query($conn, $sql);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result) > 0) {
  // Créer un tableau associatif pour stocker les données par région
  $donnees_par_region = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $region = $row['Province'];
    $superficie = $row['superficie_totale'];
    $donnees_par_region[$region] = $superficie;
  }

  // Calculer la somme totale de la superficie pour toutes les régions
  $somme_totale = array_sum($donnees_par_region);

  // Coordonnées du centre du cercle
  $centre_x = 50;
  $centre_y = 50;

  // Rayon du cercle
  $rayon = 40;

  // Angle de départ
  $angle_depart = 0;

  foreach ($donnees_par_region as $region => $superficie) {
    // Calculer l'angle du segment en fonction de la superficie
    $angle = ($superficie / $somme_totale) * 360;

    // Calculer les coordonnées du point de départ du segment
    $x_depart = $centre_x + $rayon * cos(deg2rad($angle_depart));
    $y_depart = $centre_y + $rayon * sin(deg2rad($angle_depart));

    // Calculer les coordonnées du point d'arrêt du segment
    $x_arrêt = $centre_x + $rayon * cos(deg2rad($angle_depart + $angle));
    $y_arrêt = $centre_y + $rayon * sin(deg2rad($angle_depart + $angle));

    // Afficher le segment
    echo '<path d="M ' . $centre_x . ' ' . $centre_y . ' L ' . $x_depart . ' ' . $y_depart . ' A ' . $rayon . ' ' . $rayon . ' 0 ' . ($angle > 180 ? '1' : '0') . ' 1 ' . $x_arrêt . ' ' . $y_arrêt . ' Z" fill="' . random_color() . '" />';

    // Mettre à jour l'angle de départ pour le prochain segment
    $angle_depart += $angle;
  }
} else {
  echo "Aucune donnée disponible.";
}

// Fonction pour générer une couleur aléatoire
function random_color() {
  return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

// Fermer la connexion à la base de données MySQL
mysqli_close($conn);
?>
