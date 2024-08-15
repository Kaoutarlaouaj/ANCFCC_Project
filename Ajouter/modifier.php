<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: ../logout.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajouter Formulaire</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 1;
        overflow-y: auto;
        padding-top: 56px;
        transition: all 0.5s ease; background-color: #305649;
  background-size: cover;" >

            <!-- Sidebar - Brand -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <span><img src="../assets/images/logo.jpg" alt="" style="height: 127px;
  width: 240px;
  padding: 8px;
  margin-top: -91px;
  margin-bottom: -30px;
  margin-left: -24px;"></span></a>
            </li>

            <!-- Divider -->
         <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-home"></i>
                    <span style="font-size: 1rem;">Accueil</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item"  href="#tableau">
                <a class="nav-link" href="#tableau">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size: 1rem;">Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#distraction">
                <i class="fas fa-star"></i>
                    <span style="font-size: 1rem;">Distraction</span></a>
            </li>
             <hr class="sidebar-divider">
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#echange">
                <i class="fas fa-exchange-alt"></i>
                    <span style="font-size: 1rem;">Echange</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#acquisition">
                <i class="fas fa-shopping-cart"></i>
                    <span style="font-size: 1rem;">Acquisition</span></a>
            </li>

    



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

   


                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php
// Connexion à la base de données MySQL
include('connexion.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération des informations de l'utilisateur depuis la base de données
$sql = "SELECT * FROM users WHERE id = 1"; // Remplacez "1" par l'ID de l'utilisateur souhaité
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Affichage des informations de l'utilisateur dans la barre de navigation
echo '<li class="nav-item dropdown no-arrow">';
echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$user["name"].'</span>';
echo '<img class="img-profile rounded-circle" src="img/undraw_profile.svg">';
echo '</a>';
echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#chatbotModalprofil">';
echo '<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
echo 'Profil';
echo '</a>';
echo '<div class="dropdown-divider"></div>';
echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">';
echo '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
echo 'Deconnexion';
echo '</a>';
echo '</div>';
echo '</li>';

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
<!-- Modal du chatbot -->
<div class="modal fade" id="chatbotModalprofil" tabindex="-1" role="dialog" aria-labelledby="chatbotModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatbotModalLabel">Espace profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
// Connexion à la base de données
include('connexion.php');
// Vérifier la connexion
if (mysqli_connect_errno()) {
    die("Connexion échouée: " . mysqli_connect_error());
}

// Fonction pour échapper les caractères spéciaux
function escape_string($value, $conn) {
    return mysqli_real_escape_string($conn, $value);
}

// Fonction pour récupérer les informations d'un utilisateur par son ID
function get_user($user_id, $conn) {
    $user_id = escape_string($user_id, $conn);
    
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

// Exemple d'utilisation pour afficher le profil d'un utilisateur

// Récupérer les informations de l'utilisateur avec ID = 1
$user = get_user(1, $conn);

if ($user) {
    // Afficher les informations du profil
    echo "Nom d'utilisateur : " . $user['name'] . "<br>";
    echo "Email : " . $user['email'] . "<br>";
    echo "Le role : " . $user['role'] . "<br>";
    echo "Date de creation de compte : " . $user['date'] . "<br>";
} else {
    echo "Utilisateur non trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
 
    

              
        </div>
    </div>
</div>



                    </ul>

                </nav>
                <!-- End of Topbar -->

 
                <div class="container-fluid">
                                   <!-- Begin Page Content -->
                                   <?php
// Connexion à la base de données MySQL
include('../connexion.php');

// Vérifier la connexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Requête SQL pour récupérer les données de la table "donations"
$sql_distraction = "SELECT COUNT(*) as nb_distraction FROM distraction";

// Exécuter la requête SQL
$result_distraction = mysqli_query($conn, $sql_distraction);

// Vérifier si la requête a renvoyé des données

if (mysqli_num_rows($result_distraction) > 0) {
  // Récupérer les données de la requête
  $row_distraction = mysqli_fetch_assoc($result_distraction);
  $nb_distraction = $row_distraction["nb_distraction"];
}
/*
// Requête SQL pour récupérer les données de la table "users"
$sql_echange = "SELECT COUNT(*) as nb_echange FROM echange";

// Exécuter la requête SQL
$result_echange = mysqli_query($conn, $sql_echange);

// Vérifier si la requête a renvoyé des données

if (mysqli_num_rows($result_echange) > 0) {
  // Récupérer les données de la requête
  $row_echange = mysqli_fetch_assoc($result_echange);
  $nb_echange = $row_echange["nb_echange"];
}

$sql_acquisition = "SELECT COUNT(*) as nb_acquisition FROM acquisition";

// Exécuter la requête SQL
$result_acquisition = mysqli_query($conn, $sql_acquisition);

// Vérifier si la requête a renvoyé des données

if (mysqli_num_rows($result_acquisition) > 0) {
  // Récupérer les données de la requête
  $row_acquisition = mysqli_fetch_assoc($result_acquisition);
  $nb_acquisition = $row_acquisition["nb_acquisition"];
}
*/
// Fermer la connexion à la base de données MySQL
mysqli_close($conn);
?>

<!-- Afficher les données dans un tableau de bord -->
<section id="tableau" style="margin-left: 216px;">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
    <?php //echo $download_link; ?>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Le nombre de distractions effectuées</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_distraction; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
         <div class="row no-gutters align-items-center">
         <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Le nombre d'echange effectuées</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php //echo $nb_echange; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Le nombre d'utilisateurs</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php //echo $nb_users; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Le nombre d'acquisition effectuées</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php //echo $nb_acquisition; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
                <!-- Affichage du formulaire de filtrage -->
                <section id="distraction" class="wat-we-do">
                <h1 class="h3 mb-0 text-gray-800" style="margin-left:220px;">Distraction</h1>
                <div class="container mt-5">
    <div class="row">
      <div class="col">
      <form method="post">
      <div class="input-group mb-3" style="width: 300px;
  margin-left: 500px;
  height: 0px;">
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button" id="R" name="R">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary"  id="search-button" type="submit" name="search-button">Rechercher</button>
          </div>
        </div>
        </form>
        <?php
include('../connexion.php'); // Inclure le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    if(isset($_POST['search-button']))
    {
        $R = $_POST["R"]; 
        $sql = "SELECT * FROM distraction WHERE Province = $R OR Commune = $R or DPANEF = $R or Zone_forestiere = $R or District_forestier = $R or Foret_canton_ilot = $R or Stade_fonciere = $R or Reference = $R or Superficie_parcelle_m2 = $R or Beneficiaire = $R or Projet_realise = $R or Prix_en_Ha = $R or Montant_total = $R or Reference_decrit = $R or Reference_PV_remise = $R";
    
        $result = $conn->query($sql);
    }
    else
    {
        $R = $_POST["province"]; 
        $sql = "SELECT * FROM distraction WHERE Province = $R OR Commune = $R or DPANEF = $R or Zone_forestiere = $R or District_forestier = $R or Foret_canton_ilot = $R or Stade_fonciere = $R or Reference = $R or Superficie_parcelle_m2 = $R or Beneficiaire = $R or Projet_realise = $R or Prix_en_Ha = $R or Montant_total = $R or Reference_decrit = $R or Reference_PV_remise = $R";
    
        $result = $conn->query($sql); 
    }    
    // Construire la requête SQL en fonction des valeurs sélectionnées


    if ($result->num_rows > 0) {
        // Afficher les résultats de la recherche
        while ($row = $result->fetch_assoc()) {
            // Afficher les informations de chaque résultat
            
            ?> 
            <form method="post">
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
            <br>
            <h2 style="text-align: center;">Formulaire de distraction</h2>
            <br>
            <fieldset id="groupedLabels">
                <legend>Situation administrative :</legend>
                <br>
                <?php
// Remplacez 'votre_nom_de_bdd', 'votre_nom_utilisateur', 'votre_mot_de_passe' par vos véritables identifiants de base de données.
include('../connexion.php');

// Vérifiez la connexion
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
$sql = "SELECT id, name FROM provinces";
$resultat = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label>Province :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectList" name="province" required>';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($ligne = $resultat->fetch_assoc()) {
        $idProvince = $ligne['id'];
        $nomProvince = $ligne['name'];
        echo '<option value="' . $idProvince . '"';

        // Vérifier si la province est celle qui a été soumise
        if (isset($row["Province"]) && $row["Province"] == $idProvince) {
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

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["province"])) {
    $provinceId = $_POST["province"];

    // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
    $sqlCommunes = "SELECT * FROM communes WHERE province_id = $provinceId";
    $resultatCommunes = $conn->query($sqlCommunes);

    if ($resultatCommunes->num_rows > 0) {
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label>Commune :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectCommune" name="commune" required>';

        // Générer les options pour les communes de la province sélectionnée
        while ($ligneCommune = $resultatCommunes->fetch_assoc()) {
            $idCommune = $ligneCommune['id'];
            $nomCommune = $ligneCommune['name'];
            echo '<option value="' . $idCommune . '">' . $nomCommune . '</option>';
        }

        echo '</select>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Aucune commune trouvée pour cette province.";
    }
}
else
{
    $provinceId = 1;

    // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
    $sqlCommunes = "SELECT name FROM communes WHERE province_id = $provinceId";
    $resultatCommunes = $conn->query($sqlCommunes);

    if ($resultatCommunes->num_rows > 0) {
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label>Commune :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectCommune" name="commune" required>';

        // Générer les options pour les communes de la province sélectionnée
        while ($ligneCommune = $resultatCommunes->fetch_assoc()) {
            $nomCommune = $ligneCommune['name'];
            echo '<option value="' . $nomCommune . '">' . $nomCommune . '</option>';
        }

        echo '</select>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "Aucune commune trouvée pour cette province.";
    }
}

// Fermer la connexion MySQL
$conn->close();
?>

<script>
    // Ajouter un événement de changement à la liste déroulante des provinces
    document.getElementById("selectList").addEventListener("change", function() {
        // Soumettre automatiquement le formulaire lorsque la province est sélectionnée
        this.form.submit();
        window.location.href = 'modifier.php';
    });
</script>



            </fieldset>
            <br>
            <fieldset id="groupedLabels">
                <legend>Situation forestiére :</legend>
                <br>
                <?php
// Remplacez 'votre_nom_de_bdd', 'votre_nom_utilisateur', 'votre_mot_de_passe' par vos véritables identifiants de base de données.
include('../connexion.php');

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Variable pour stocker l'ID de la province sélectionnée
$selectedDpanefId = null;

// Vérifier si le formulaire a été soumis et si la province a été sélectionnée
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["dpanef"])) {
    $selectedDpanefId = $_POST["dpanef"];
}

// Requête pour récupérer les provinces depuis la table 'provinces'
$sqldpanef = "SELECT id, name FROM dpanef";
$resultatdpanef = $conn->query($sqldpanef);

// Vérifiez s'il y a des résultats
if ($resultatdpanef->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label>Dpanef :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListDpanef" name="dpanef" required>';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($lignedpanef = $resultatdpanef->fetch_assoc()) {
        $idDpanef = $lignedpanef['id'];
        $nomDpanef = $lignedpanef['name'];
        echo '<option value="' . $idDpanef . '"';

        // Vérifier si la province est celle qui a été soumise
        if ($selectedDpanefId !== null && $selectedDpanefId === $idDpanef) {
            echo ' selected';
        }

        echo '>' . $nomDpanef . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune dpanef trouvée dans la base de données.";
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["dpanef"])) {
    $dpanefId = $_POST["dpanef"];

// Variable pour stocker l'ID de la province sélectionnée
$selectedZonesId = null;

// Vérifier si le formulaire a été soumis et si la province a été sélectionnée
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["zones"])) {
    $selectedZonesId = $_POST["zones"];
}
    // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
    $sqlZones = "SELECT * FROM zones_forestieres WHERE dpanef_id = $dpanefId";
    $resultatZones = $conn->query($sqlZones);
    if ($resultatZones->num_rows > 0) {
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label style="margin-left: -7px;">Zone forestière :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectZones" name="zones" required>';

        // Générer les options pour les communes de la province sélectionnée
        while ($ligneZones = $resultatZones->fetch_assoc()) {
        $idZones = $ligneZones['id'];
        $nomZones = $ligneZones['zone_name'];
        echo '<option value="' . $idZones . '"';

        // Vérifier si la province est celle qui a été soumise
        if ($selectedZonesId !== null && $selectedZonesId === $idZones) {
            echo ' selected';
        }

        echo '>' . $nomZones . '</option>';
        }

        echo '</select>';
        echo '</div>';
        echo '</div>';
        $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE  dpanef_id = $dpanefId";
        $resultatDistinct = $conn->query($sqlDistinct);
        
        if ($resultatDistinct === false) {
            
      // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
   $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE dpanef_id = 1";
   $resultatDistinct = $conn->query($sqlDistinct);
   if ($resultatDistinct->num_rows > 0) {
      echo '<br><div class="row cf-ro">';
      echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
      echo '<div class="col-sm-8">';
      echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
   
      // Générer les options pour les communes de la province sélectionnée
      while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
          $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
          $idDistinct = $ligneDistinct['id'];
          
          echo '<option value="' . $idDistinct . '"';
       
      
   
      echo '>' . $nomDistinct . '</option>';
      
      }
   
      echo '</select>';
      echo '</div>';
      echo '</div>';
   }
 
        } else {
            // Query executed successfully
            if ($resultatDistinct->num_rows > 0) {
       echo '<br><div class="row cf-ro">';
       echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
       echo '<div class="col-sm-8">';
       echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
 
       // Générer les options pour les communes de la province sélectionnée
       while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
           $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
           $idDistinct = $ligneDistinct['id'];
           echo '<option value="' . $idDistinct . '"';
 
       
 
       echo '>' . $nomDistinct . '</option>';
       }
 
       echo '</select>';
       echo '</div>';
       echo '</div>';
   }
 
 }

    } else {
         // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
    $sqlZones = "SELECT * FROM zones_forestieres WHERE dpanef_id != $dpanefId";
    $resultatZones = $conn->query($sqlZones);
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label style="margin-left: -7px;">Zone forestière :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectZones" name="zones" required>';

        // Générer les options pour les communes de la province sélectionnée
               // Générer les options pour les communes de la province sélectionnée
               while ($ligneZones = $resultatZones->fetch_assoc()) {
                $idZones = $ligneZones['id'];
                $nomZones = $ligneZones['zone_name'];
                echo '<option value="' . $idZones . '"';
        
                // Vérifier si la province est celle qui a été soumise
                if ($selectedZonesId !== null && $selectedZonesId === $idZones) {
                    echo ' selected';
                }
        
                echo '>' . $nomZones . '</option>';
                }
      

        echo '</select>';
        echo '</div>';
        echo '</div>';
        $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE  dpanef_id != $dpanefId";
        $resultatDistinct = $conn->query($sqlDistinct);
        
        if ($resultatDistinct === false) {
            
      // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
   $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE dpanef_id = 1";
   $resultatDistinct = $conn->query($sqlDistinct);
   if ($resultatDistinct->num_rows > 0) {
      echo '<br><div class="row cf-ro">';
      echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
      echo '<div class="col-sm-8">';
      echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
   
      // Générer les options pour les communes de la province sélectionnée
      while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
          $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
          $idDistinct = $ligneDistinct['id'];
          
          echo '<option value="' . $idDistinct . '"';
       
      
   
      echo '>' . $nomDistinct . '</option>';
      
      }
   
      echo '</select>';
      echo '</div>';
      echo '</div>';
   }
 
        } else {
            // Query executed successfully
            if ($resultatDistinct->num_rows > 0) {
       echo '<br><div class="row cf-ro">';
       echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
       echo '<div class="col-sm-8">';
       echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
 
       // Générer les options pour les communes de la province sélectionnée
       while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
           $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
           $idDistinct = $ligneDistinct['id'];
           echo '<option value="' . $idDistinct . '"';
 
       
 
       echo '>' . $nomDistinct . '</option>';
       }
 
       echo '</select>';
       echo '</div>';
       echo '</div>';
   }
 
 }


        
    }
}
elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["zones"])) {
           // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
           $selectedDpanefId = $_POST["dpanef"];
           $selectedZoneId = $_POST["zones"];
                    // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
    $sqlZones = "SELECT * FROM zones_forestieres WHERE dpanef_id = $selectedDpanefId";
    $resultatZones = $conn->query($sqlZones);
        echo '<br><div class="row cf-ro">';
        echo '<div class="col-sm-3"><label style="margin-left: -7px;">Zone forestière :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectZones" name="zones" required>';

        // Générer les options pour les communes de la province sélectionnée
               // Générer les options pour les communes de la province sélectionnée
               while ($ligneZones = $resultatZones->fetch_assoc()) {
                $idZones = $ligneZones['id'];
                $nomZones = $ligneZones['zone_name'];
                echo '<option value="' . $idZones . '"';
        
                // Vérifier si la province est celle qui a été soumise
                if ($selectedZonesId !== null && $selectedZonesId === $idZones) {
                    echo ' selected';
                }
        
                echo '>' . $nomZones . '</option>';
                }
      

        echo '</select>';
        echo '</div>';
        echo '</div>';
              $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE  dpanef_id = $selectedDpanefId AND zones_forestiere_id = $selectedZoneId";
              $resultatDistinct = $conn->query($sqlDistinct);
              
              if ($resultatDistinct === false) {
                  
            // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
         $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE dpanef_id = 1";
         $resultatDistinct = $conn->query($sqlDistinct);
         if ($resultatDistinct->num_rows > 0) {
            echo '<br><div class="row cf-ro">';
            echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
            echo '<div class="col-sm-8">';
            echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
         
            // Générer les options pour les communes de la province sélectionnée
            while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
                $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
                $idDistinct = $ligneDistinct['id'];
                
                echo '<option value="' . $idDistinct . '"';
             
            
         
            echo '>' . $nomDistinct . '</option>';
            
            }
         
            echo '</select>';
            echo '</div>';
            echo '</div>';
         }
       
              } else {
                  // Query executed successfully
                  if ($resultatDistinct->num_rows > 0) {
             echo '<br><div class="row cf-ro">';
             echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
             echo '<div class="col-sm-8">';
             echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
       
             // Générer les options pour les communes de la province sélectionnée
             while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
                 $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
                 $idDistinct = $ligneDistinct['id'];
                 echo '<option value="' . $idDistinct . '"';
       
             
       
             echo '>' . $nomDistinct . '</option>';
             }
       
             echo '</select>';
             echo '</div>';
             echo '</div>';
         }
       
       }
}
else
{
    echo '<br><div class="row cf-ro">';
    echo '<div class="col-sm-3"><label style="margin-left: -7px;">Zone forestière :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectZones" name="zones" required>';

   
 
        echo '<option value="13">-</option>';
  

    echo '</select>';
    echo '</div>';
    echo '</div>';
           // Requête pour récupérer les communes de la province sélectionnée depuis la table 'communes'
           $sqlDistinct = "SELECT * FROM distinct_forestiers WHERE dpanef_id = 1";
           $resultatDistinct = $conn->query($sqlDistinct);
           if ($resultatDistinct->num_rows > 0) {
              echo '<br><div class="row cf-ro">';
              echo '<div class="col-sm-3"><label style="margin-left: -7px;">Distirct forestière :</label></div>';
              echo '<div class="col-sm-8">';
              echo '<select class="form-control" id="selectDistinct" name="distinct" required>';
           
              // Générer les options pour les communes de la province sélectionnée
              while ($ligneDistinct = $resultatDistinct->fetch_assoc()) {
                  $nomDistinct = $ligneDistinct['distinct_forestiers_name'];
                  $idDistinct = $ligneDistinct['id'];
                  echo '<option value="' . $idDistinct . '"';
           
              
           
              echo '>' . $nomDistinct . '</option>';
              }
           
              echo '</select>';
              echo '</div>';
              echo '</div>';
           }
    
}

// Fermer la connexion MySQL
$conn->close();
?>
<script>
    // Ajouter un événement de changement à la liste déroulante des provinces
    document.getElementById("selectListDpanef").addEventListener("change", function() {
        // Soumettre automatiquement le formulaire lorsque la province est sélectionnée
        this.form.submit();
        window.location.href = 'modifier.php';
    });
    
</script>
<script>
    // Ajouter un événement de changement à la liste déroulante des provinces
    document.getElementById("selectZones").addEventListener("change", function() {
        // Soumettre automatiquement le formulaire lorsque la province est sélectionnée
        this.form.submit();
        window.location.href = 'modifier.php';
    });
</script>


            </fieldset>
            <br>
            <fieldset id="groupedLabels">
                <legend>Lieu :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label>Forêt/Canton/Ilôt :</label>
                        <div class="col-sm-8"><input type="text" name="name" class="form-control input-sm" style="margin-left: 5px;" required></div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>Stade Fonciére :</label>
                    <div class="col-sm-8"><input type="text" name="stade" class="form-control input-sm" style="margin-left: 22px;" required></div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>Réferénce :</label>
                    <div class="col-sm-8"><input type="text" name="ref" class="form-control input-sm" style="margin-left: 60px;" required></div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label>Superficie de la parcelle en m2 :</label></div>
                    <div class="col-sm-8"><input type="number" name="sup" min="0"  step="1" required></div>
                </div>
            </fieldset>
                <br>
                <div  class="row cf-ro">
                    <div  class="col-sm-3"><label>Bénéficiare :</label></div>
                    <div class="col-sm-8"><input type="text" name="benef" class="form-control input-sm" required></div>
                </div>
                <br>
                 <div  class="row cf-ro">
                    <div  class="col-sm-3"><label>Projet réalisé:</label></div>
                    <div class="col-sm-8"><input type="text" name="projet" class="form-control input-sm" required></div>
                </div>
                <br>
                <fieldset id="groupedLabels">
                    <legend>Chronologie:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label>Date de Demande :</label>
                            <div class="col-sm-8"><input type="date" name="Date" required></div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label>Date Provinciale :</label>
                             <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="prov" required></div></div>
                            </div>
                        <br>
                            <div class="row cf-ro"> 
                                <label>Date Régionale :</label>
                                <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="reg" style="margin-left: 7px;" required></div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Accord de principe :</label>
                                <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="Acc" style="margin-left: -20px;" required></div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="margin-left: -28px;">Commission Amninistrative :</label>
                                <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="Comm" required></div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Commission Expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="Exp" required></div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Envoi du dossier :</label>
                                <div class="col-sm-8"><div class="col-sm-8"><input type="date" name="Env"required></div></div>
                            </div>
                </fieldset>
                <br>
                <fieldset id="groupedLabels">
                    <legend>Prix d'expertise en Dhs:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label>Prix en Ha :</label>
                            <div class="col-sm-8"><input type="number" name="prix" min="0"  step="1" required></div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label>Montant total :</label>
                             <div class="col-sm-8"><input type="number" name="montant" min="0"  step="1" required></div>
                            </div>
                </fieldset>
                <br>
                <div  class="row cf-ro">
                    <label>Référence Décrit :</label>
                    <div class="col-sm-8"><input type="text" name="refD" class="form-control input-sm" required></div>
                </div>
                <br>
                <div  class="row cf-ro">
                    <label>Référence PV de remise :</label>
                    <div class="col-sm-8"><input type="text" name="refP" class="form-control input-sm" required></div>
                </div>
                <br>
                <h2>Importer un fichier KML</h2>
                <br>
    <form method="post" enctype="multipart/form-data">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload" accept=".kml" required>
        <label class="custom-file-label" for="fileToUpload">Choisir un fichier</label>
    </div>
    <br>
    <br>
        <input type="submit" value="Importer" class="btn btn-success btn-sm">
    </form>
    <br>
    <br>
    <div id="map" style="height: 400px; width: 100%;"></div>
     
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGo04qRtnBSpl_6q0WclMk1q69LwTMZy8&callback=initMap" async defer></script>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 10
            });
        }
    </script>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($fileType != "kml") {
        echo "Seuls les fichiers KML sont autorisés.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Analyser le fichier KML et insérer les données dans la base de données
            $xml = simplexml_load_file($target_file);
            foreach ($xml->Document->Placemark as $placemark) {
                $coords = explode(",", trim($placemark->Point->coordinates));
                $latitude = (float) $coords[1];
                $longitude = (float) $coords[0];

                // Insérer dans la base de données
                include('../connexion.php');
                $sql = "INSERT INTO traçage (latitude, longitude) VALUES ('$latitude', '$longitude')";
                $conn->query($sql);
                $conn->close();
            }
            echo "Le fichier KML a été importé avec succès.";
        } else {
            echo "Une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}
?>


                   <br>
                   <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
  margin-top: 30px;">Observation :</label>
                        <div class="col-sm-8">

                        </div>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr" required></textarea>

                    </div>
                    <br>
                    <div class="col-sm-8">
                         <button type="submit" class="btn btn-success btn-sm" name="submit_button">Envoyer</button>
                        </div>
                   </div>
             
                 <br>
            </div>
        </div>
    </div>
    </form>

     <?php
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();

?>

        <a href='ajouter.php' class='btn btn-sm btn-primary' style="margin-left: 150px;">Ajouter</a>
        <a href='supprimer.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger' style="margin-left: 40px;">Supprimer</a>
        <a href='modifier.php?id=" . $row["id"] . "' class='btn btn-sm btn-warning' style="margin-left: 40px;">Modifier</a>
      </div>
    </div>
  </div>


   </section> 

                <br>
                <section id="echange" class="wat-we-do">
                <h1 class="h3 mb-0 text-gray-800" style="margin-left:220px;">Echange</h1>
                <div class="container mt-5">
    <div class="row">
      <div class="col">
      <div class="input-group mb-3" style="width: 300px;
  margin-left: 500px;
  height: 0px;">
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="search-button">Rechercher</button>
          </div>
        </div>
        <a href='ajouter.php' class='btn btn-sm btn-primary' style="margin-left: 150px;">Ajouter</a>
        <a href='supprimer.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger' style="margin-left: 40px;">Supprimer</a>
        <a href='modifier.php?id=" . $row["id"] . "' class='btn btn-sm btn-warning' style="margin-left: 40px;">Modifier</a>
      </div>
    </div>
  </div>


   </section> 
                <br>


                <section id="acquisition" class="wat-we-do">
                <h1 class="h3 mb-0 text-gray-800" style="margin-left:220px;">Acquisition</h1>
                <div class="container mt-5">
    <div class="row">
      <div class="col">
      <div class="input-group mb-3" style="width: 300px;
  margin-left: 500px;
  height: 0px;">
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="search-button">Rechercher</button>
          </div>
        </div>
        <a href='ajouter.php' class='btn btn-sm btn-primary' style="margin-left: 150px;">Ajouter</a>
        <a href='supprimer.php?id=" . $row["id"] . "' class='btn btn-sm btn-danger' style="margin-left: 40px;">Supprimer</a>
        <a href='modifier.php?id=" . $row["id"] . "' class='btn btn-sm btn-warning' style="margin-left: 40px;">Modifier</a>
      </div>
    </div>
  </div>


   </section> 
                    <!-- Content Row -->

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>@All Right reserved 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à quitter?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Deconnexion" ci-dessous si vous êtes prêt(e) à mettre fin à votre session actuelle.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="../logout.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>