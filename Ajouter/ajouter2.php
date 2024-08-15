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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB0DQm5yJcKTugpszEd5P7gnRbnx15188&callback=initMap" async defer></script>
    
    <style>
/* Style pour le champ de téléchargement de fichier */
#groupedLabels2 {
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    width: 300px;
    text-align: left;
}

.legend {
    font-weight: bold;
    font-size: 16px;
    color: #333;
}

.row {
    margin-bottom: 10px;
}

.label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

input[type="file"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 100%;
}

/* Style pour le bouton "Envoyer" si nécessaire */
input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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
                <a class="nav-link" href="ajouter_formulaire.php">
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
                <a class="nav-link" href="ajouter_formulaire.php">
                    <i class="fas fa-home"></i>
                    <span style="font-size: 1rem;">Accueil</span></a>
            </li>
       

            <!-- Divider -->
            <hr class="sidebar-divider">
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#distraction">
                <i class="fas fa-star"></i>
                    <span style="font-size: 1rem;">Distraction</span></a>
            </li>
    

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="#acquisition">
                <i class="fas fa-shopping-cart"></i>
                    <span style="font-size: 1rem;">Acquisition</span></a>
            </li>

    
            <hr class="sidebar-divider">

<!-- Nav Item - Dashboard -->
<li class="nav-item"  href="#tableau">
    <a class="nav-link" href="#tableau">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span style="font-size: 1rem;">Tableau de bord</span></a>
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
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button" id="R" name="R" style="margin-top: 14px;">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary"  id="search-button" type="submit" name="search-button" style="margin-top: 14px;">Rechercher</button>
          </div>
        </div>
        </form>
        <a href='ajouter.php' class='btn btn-sm btn-primary' style="margin-left: 150px;">Ajouter</a>
        <?php
include('../connexion.php'); // Inclure le fichier de connexion à la base de données

if (isset($_POST['search-button'])) {
    $R = $_POST["R"];
    
    // Requête principale pour récupérer les données de la table "distraction" en fonction de l'ID trouvé dans d'autres tables
    $query = "SELECT d.*
              FROM distraction AS d
              LEFT JOIN provinces AS p ON d.Province = p.id_p
              LEFT JOIN communes AS c ON d.Commune = c.id
              LEFT JOIN dpanef AS dp ON d.DPANEF = dp.id
              LEFT JOIN zones_forestieres AS zf ON d.Zone_forestiere = zf.id
              LEFT JOIN distinct_forestiers AS df ON d.District_forestier = df.id
              WHERE p.name LIKE ? OR c.name LIKE ? OR dp.name LIKE ? OR zf.zone_name LIKE ? OR df.distinct_forestiers_name LIKE ? OR d.Foret_canton_ilot LIKE ? OR d.Stade_fonciere LIKE ? OR d.Reference LIKE ? OR d.Superficie_parcelle_m2 = ? OR d.Beneficiaire LIKE ? OR d.Projet_realise LIKE ? OR d.Prix_en_Ha = ? OR d.Montant_total = ? OR d.Reference_decrit LIKE ? OR d.Reference_PV_remise LIKE ? ";
    
    $likeR = '%' . $R . '%';
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssissiiss", $likeR, $likeR, $likeR, $likeR, $likeR, $likeR, $likeR, $likeR,$R, $likeR, $likeR,$R,$R, $likeR, $likeR);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Affichez les résultats
        while ($row = $result->fetch_assoc()) {
            // Traitement des résultats
            // Vous pouvez accéder aux données de la table "distraction" via $row
            ?>
            <form method="post" action="script.php" enctype="multipart/form-data">
              
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
            <br>
            <h2 style="text-align: center;color:#51713F;">Formulaire de distraction</h2>
            <br>
            <fieldset id="groupedLabels">
                <legend style="color:#374D72;">Situation administrative :</legend>
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
$sql = "SELECT id_p, name FROM provinces";
$resultat = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 26px;">Province :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectList" name="province" required style="margin-left: 31px;">';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($ligne = $resultat->fetch_assoc()) {
        $idProvince = $ligne['id_p'];
        $nomProvince = $ligne['name'];
        
        echo '<option value="' . $idProvince . '"';

        // Vérifier si la province est celle qui a été soumise

if (isset($row["Province"]) && $row["Province"] == $idProvince) {
    echo ' selected="selected"';
}

if ($selectedProvinceId !== null && $selectedProvinceId === $idProvince) {
    echo ' selected';
}

        echo '>' . $nomProvince . '</option>';
        
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune province trouvée dans la base de données.";
}



echo '<div id="resultats1"></div>';

// Fermer la connexion MySQL
$conn->close();
?>
<script>
    // Ajoutez un événement de changement à la liste déroulante des provinces
    var selectedValue = document.getElementById("selectList").value;

// Effectuez une requête AJAX pour obtenir les communes sélectionnées
fetch('f2.php?province=' + selectedValue)
    .then(response => response.text())
    .then(data => {
        // Mettez à jour les résultats dans la div "resultats"
        document.getElementById("resultats1").innerHTML = data;
    });
    document.getElementById("selectList").addEventListener("change", function() {
        // Récupérez la valeur sélectionnée
        var selectedValue = this.value;

        // Effectuez une requête AJAX pour obtenir les résultats
        fetch('f2.php?province=' + selectedValue)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les résultats dans la div "resultats"
                document.getElementById("resultats1").innerHTML = data;
            });
    });
</script>




            </fieldset>
            <br>
            <fieldset id="groupedLabels">
                <legend style="color:#374D72;">Situation forestiére :</legend>
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
    echo '<div class="col-sm-3"><label  style="color:#E3AA01;margin-left: 26px;">Dpanef :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListDpanef" name="dpanef"  style="margin-left: 30px;">';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($lignedpanef = $resultatdpanef->fetch_assoc()) {
        $idDpanef = $lignedpanef['id'];
        $nomDpanef = $lignedpanef['name'];
        echo '<option value="' . $idDpanef . '"';

        // Vérifier si la province est celle qui a été soumise
        if (isset($row["DPANEF"]) && $row["DPANEF"] == $idDpanef) {
            echo ' selected="selected"';
        }
 

        echo '>' . $nomDpanef . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune dpanef trouvée dans la base de données.";
}




// Fermer la connexion MySQL
$conn->close();
?>

<br>
<!-- Liste déroulante pour les zones -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;">Zone forestière :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListZone" name="zone"  style="margin-left: 30px;">
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>
<br>
<!-- Liste déroulante pour les districts forestiers -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;margin-left: -11px;">District Forestier :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListDistrict" name="district"  style="margin-left: 32px;">
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>

<script>



    // Fonction pour charger les zones en fonction de DPANEF sélectionné
    function loadZones(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les zones en fonction de DPANEF
        fetch('get_zones.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des zones
                document.getElementById("selectListZone").innerHTML = data;
            });
    }

    // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
    function loadDistricts(selectedDPANEF, selectedZone) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts.php?dpanef=' + selectedDPANEF + '&zone=' + selectedZone)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict").innerHTML = data;
            });
    }
       // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
       function loadDistricts2(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts2.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict").innerHTML = data;
            });
    }
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
        loadZones(selectedDPANEF);
    // Ajoutez un événement de changement à la liste déroulante DPANEF
    document.getElementById("selectListDpanef").addEventListener("change", function() {
        var selectedDPANEF = this.value;
        loadZones(selectedDPANEF);
    });
    var selectedDPANEF =document.getElementById("selectListDpanef").value;
   // var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
  // Ajoutez un événement de changement à la liste déroulante DPANEF
document.getElementById("selectListDpanef").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
  //  var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
});
//var selectedDPANEF = document.getElementById("selectListDpanef").value;
   // var selectedZone = document.getElementById("selectListZone").value;
   // loadDistricts(selectedDPANEF, selectedZone);
// Ajoutez un événement de changement à la liste déroulante des zones
document.getElementById("selectListZone").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
    var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts(selectedDPANEF, selectedZone);
});

</script>



            </fieldset>
            <br>
            <fieldset id="groupedLabels">
                <legend style="color:#374D72;">Lieu :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 33px;">Forêt/Canton/Ilôt :</label>
                        <div class="col-sm-8">
                        <?php
                          $name = $row["Foret_canton_ilot"];
                          echo '<input type="text" name="name" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 33px;">Stade Fonciére :</label>
                    <div class="col-sm-8">
                    <?php
                          $name2 = $row["Stade_fonciere"];
                          echo '<input type="text" name="stade" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name2 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 30px;">Réferénce :</label>
                    <div class="col-sm-8">
                    <?php
                          $name3 = $row["Reference"];
                          echo '<input type="text" name="ref" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name3 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 1px;">Superficie de la parcelle en m2 :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name4 = $row["Superficie_parcelle_m2"];
                          echo '<input type="number" name="sup" min="0"  step="1" required style="margin-left: 32px;" value="' . $name4 . '">';
                          ?>
                </div>
                </div>
            </fieldset>
                <br>
                <div  class="row cf-ro">
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 20px;">Bénéficiare :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name5 = $row["Beneficiaire"];
                          echo '<input type="text" name="benef" class="form-control input-sm" required style="margin-left: 33px;" value="' . $name5. '">';
                          ?>
                </div>
                </div>
                <br>
                 <div  class="row cf-ro">
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 11px;">Projet réalisé:</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name6 = $row["Projet_realise"];
                          echo '<input type="text" name="projet" class="form-control input-sm" required style="margin-left: 33px;" value="' . $name6. '">';
                          ?>
                </div>
                </div>
                <br>
                <fieldset id="groupedLabels">
                    <legend style="color:#374D72;">Chronologie:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: 31px;">Date de Demande :</label>
                            <div class="col-sm-8">
                            <?php
                          $name7 = $row["date_demande"];
                          echo '<input type="date" name="Date" required value="' . $name7. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 31px;">Date Provinciale :</label>
                             <div class="col-sm-8"><div class="col-sm-8">
                             <?php
                          $name8 = $row["date_provinciale"];
                          echo '<input type="date" name="prov" required value="' . $name8. '">';
                          ?>
                            </div></div>
                            </div>
                        <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 31px;">Date Régionale :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name9 = $row["date_regionale"];
                          echo '<input type="date" name="reg" style="margin-left: 7px;"  value="' . $name9. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 30px;">Accord de principe :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name10 = $row["date_accord_principe"];
                          echo '<input type="date" name="Acc" style="margin-left: -16px;" required value="' . $name10. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="margin-left: -47px;color:#E3AA01;">Commission Amninistrative :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name11 = $row["date_commission_administrative"];
                          echo '<input type="date" name="Comm" required value="' . $name11. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: -9px;">Commission Expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name12 = $row["date_commission_expertise"];
                          echo '<input  type="date" name="Exp" required value="' . $name12. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 32px;">Envoi du dossier :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name13 = $row["date_envoi_dossier"];
                          echo '<input  type="date" name="Env" required value="' . $name13. '">';
                          ?>
                            </div></div>
                            </div>
                </fieldset>
                <br>
                <fieldset id="groupedLabels">
                    <legend style="color:#374D72;">Prix d'expertise en Dhs:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: 85px;">Prix en Ha :</label>
                            <div class="col-sm-8">
                            <?php
                          $name14 = $row["Prix_en_Ha"];
                          echo '<input  type="number" name="prix" min="0"  step="1" required value="' . $name14. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 62px;">Montant total :</label>
                             <div class="col-sm-8">
                             <?php
                          $name15 = $row["Montant_total"];
                          echo '<input  type="number" name="montant" min="0"  step="1" required value="' . $name15. '">';
                          ?>
                            </div>
                            </div>
                </fieldset>
                <br>
                <div  class="row cf-ro">
                    <label style="color:#E3AA01;margin-left: 41px;">Référence Décrit :</label>
                    <div class="col-sm-8">
                    <?php
                          $name16 = $row["Reference_decrit"];
                          echo '<input  type="text" name="refD" class="form-control input-sm"  value="' . $name16. '">';
                          ?>
                </div>
                </div>
                <br>
                <div  class="row cf-ro">
                    <label style="color:#E3AA01;margin-left: -10px;">Référence PV de remise :</label>
                    <div class="col-sm-8">
                    <?php
                          $name17 = $row["Reference_PV_remise"];
                          echo '<input  type="text" name="refP" class="form-control input-sm"  value="' . $name17. '">';
                          ?>
                </div>
                </div>
    

                <br>
                <div  class="row cf-ro">
                    <label style="color:#E3AA01;margin-left: 67px;">Coordonnées :</label>
                    <div class="col-sm-8">
                    <?php
include('../connexion.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération du fichier .kmz depuis la base de données
$id = $row['id']; // Remplacez 1 par l'ID du fichier .kmz que vous souhaitez récupérer
$query = "SELECT nom_fichier FROM table_kmz WHERE id_distraction = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom_fichier);
$stmt->fetch();
//$stmt->close();
//$conn->close();


// Affichage du lien
echo '<a href="https://earth.google.com/web/?kmz='.$nom_fichier.'" class="btn btn-success btn-sm" target="_blank">Ouvrir dans Google Earth</a>';

?>         
                </div>
                </div>
               <br>
              
                
 
                         


             




                <br>
                   <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 72px;
  margin-top: 30px;color:#E3AA01;">Observation :</label>
                        <div class="col-sm-8">

                        </div>
                        <?php
                          $name19 = $row["Observation"];
                          echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr" style="margin-left: 89px;">' . $name19. '</textarea>';
                          ?>
                        

                    </div>
                    <br>
                    <br>
                    <fieldset id="groupedLabels">
                    <legend style="color:#374D72;">Dossier scané (Oui/Non):</legend>
                    <label for="oui">Oui</label>
<input type="radio" id="oui" name="DossierS" value="Oui">
<br>
<label for="non">Non</label>
<input type="radio" id="non" name="DossierS" value="Non" checked>

                </fieldset>
                <div id="documentsDiv" style="display: none;">
                <?php
// Connexion à la base de données (remplacez les informations par celles de votre configuration)
include('../connexion.php');
// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des fichiers importés à partir de la base de données
$sql2 = "SELECT * FROM fichiers_importes where id_distraction =".$row['id'];
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // Afficher les fichiers importés
    echo "<h2 style=\"text-align: center;\">Fichiers importés :</h2>";
    echo "<ul>";
    while ($r = $result2->fetch_assoc()) {
        echo "<li style=\"text-align: center;margin-bottom: 10px;\"><a href='uploads/" . $r["nom_fichier"] . "' download>" . $r["nom_fichier"] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "<script>alert('Aucun fichier importé.');
            </script>";
    
}

$conn->close();
?>
    </div>
    <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton = document.getElementById("oui");
    var nonRadioButton = document.getElementById("non");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv = document.getElementById("documentsDiv");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton.addEventListener("click", function () {
        if (ouiRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv.style.display = "block";
        } 
    });
    nonRadioButton.addEventListener("click", function () {
        if (nonRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv.style.display = "none";
        } 
    });
</script>
                <br>
                <br>
                    <div class="col-sm-8">
                    <input type="hidden" name="formId" value="<?php echo $row["id"]; ?>">
                    
    <button  name="deleteForm" id="DF" class='btn btn-sm btn-danger' style="margin-left: -43px;
margin-top: -4921px;">Supprimer</button>
    <button name="updateForm" id="UF" class='btn btn-sm btn-warning' style="margin-left: 28px;
margin-top: -4921px;">Modifier</button>
                        </div>
                
                        <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton = document.getElementById("oui");
    var nonRadioButton = document.getElementById("non");
    var deleteButton = document.getElementById("DF");
    var updateButton = document.getElementById("UF");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv = document.getElementById("documentsDiv");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton.addEventListener("click", function () {
        if (ouiRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
       
            deleteButton.style.marginLeft = "-43px";
            deleteButton.style.marginTop = "-5639px"; 
            updateButton.style.marginLeft = "28px";
            updateButton.style.marginTop = "-5639px"; 
        } 
    });
    nonRadioButton.addEventListener("click", function () {
        if (nonRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
           
            deleteButton.style.marginLeft = "-43px";
            deleteButton.style.marginTop = "-4923px"; 
            updateButton.style.marginLeft = "28px";
            updateButton.style.marginTop = "-4923px"; 
        } 
    });
</script>

                   </div>
             
                 <br>
            </div>
        </div>
    </div>
    <br>
    <br>
  

    </form>
    <?php
            
        }
    } else {
        echo "<script>alert('Aucun résultat trouvé.');
              window.location.href = 'ajouter_formulaire.php';
              </script>";
    }
}      
else
{
    echo '
    <form method="post">
    <button name="delete" class=\'btn btn-sm btn-danger\' style="margin-left: 252px;
    margin-top: -56px;">Supprimer</button>
    <button name="update" class=\'btn btn-sm btn-warning\' style="margin-left: 39px;
    margin-top: -55px;">Modifier</button>
    </form>';
    if (isset($_POST["delete"])) {
        echo "<script>alert('Vous devrez rechercher le formulaire pour effectuer la suppression!!!');
            window.location.href = 'ajouter_formulaire.php';
            </script>"; 
        }
        if (isset($_POST["update"])) {
            echo "<script>alert('Vous devrez rechercher le formulaire pour effectuer la modification!!!');
                window.location.href = 'ajouter_formulaire.php';
                </script>"; 
            }
    

    
  
    
   
}

?>
            
  

 
<br>
      </div>
    </div>
  </div>
  <br>



   </section> 

                <br>
          
              
  

                <section id="acquisition" class="wat-we-do">
                    <br>
                    <h1 class="h3 mb-0 text-gray-800" style="margin-left:220px;">Acquisition</h1>
                <div class="container mt-5">
    <div class="row">
      <div class="col">
      <form method="post">
      <div class="input-group mb-3" style="width: 300px;
  margin-left: 500px;
  height: 0px;">
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button2" id="R2" name="R2" style="margin-top: 14px;">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary"  id="search-button2" type="submit" name="search-button2" style="margin-top: 14px;">Rechercher</button>
          </div>
        </div>
        </form>
        <a href='ajouter2.php' class='btn btn-sm btn-primary' style="margin-left: 150px;">Ajouter</a>
        <?php
include('../connexion.php'); // Inclure le fichier de connexion à la base de données

if (isset($_POST['search-button2'])) {
    $R = $_POST["R2"];
    
    // Requête principale pour récupérer les données de la table "distraction" en fonction de l'ID trouvé dans d'autres tables
    $query = "SELECT a.*
              FROM acquisition AS a
              LEFT JOIN provinces AS p ON a.Province = p.id_p
              LEFT JOIN communes AS c ON a.CT = c.id
              LEFT JOIN dpanef AS dp ON a.DPANEF = dp.id
              LEFT JOIN zones_forestieres AS zf ON a.ZFDT = zf.id
              LEFT JOIN distinct_forestiers AS df ON a.DFP = df.id
              WHERE p.name LIKE ? OR c.name LIKE ? OR dp.name LIKE ? OR zf.zone_name LIKE ? OR df.distinct_forestiers_name LIKE ? OR a.Nom_SociétéEntreprise LIKE ? OR a.NomPrénom_Gérant LIKE ? OR a.CIN_Gérant LIKE ? OR a.Adresse1 = ? OR a.Tél1 LIKE ? OR a.NomPrénom LIKE ? OR a.CIN = ? OR a.Adresse2 = ? OR a.Tél2 LIKE ? OR a.N_TF_Req LIKE ? OR a.Nom_Terrain LIKE ? OR a.N_parcelles LIKE ? OR a.Superficie_ha LIKE ? OR a.Occupation LIKE ? OR a.Droits_et_charges_foncières LIKE ? OR a.Valeur_vénale_en_Dh_Hectare LIKE ? OR a.Valeur_vénale_révisée_en_Dh_Hectare LIKE ? OR a.Montant_Total_en_Dh LIKE ? OR a.Année_et_marché LIKE ? OR a.Technique LIKE ? OR a.Espèce_utilisée LIKE ? ";
    
    $likeR = '%' . $R . '%';
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssssssssiiiiiiisss", $likeR, $likeR, $likeR, $likeR, $likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$R,$R,$R,$R,$R,$R,$R,$likeR, $likeR, $likeR);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Affichez les résultats
        while ($row = $result->fetch_assoc()) {
            // Traitement des résultats
            // Vous pouvez accéder aux données de la table "distraction" via $row
            ?>
            <form method="post" action="script2.php" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
            <br>
            <h2 style="text-align: center;color:#51713F;">Formulaire d'acquisition</h2>
            <br>
             <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 18px;">Personne Morale :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 44px;">Nom _Société :</label>
                        <div class="col-sm-8">
                        <?php
                          $name = $row["Nom_SociétéEntreprise"];
                          echo '<input type="text" name="NomS" class="form-control input-sm" style="margin-left: 5px;margin-left: 51px;"  value="' . $name . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 14px;">Nom&prénom_Gérant :</label>
                    <div class="col-sm-8">
                    <?php
                          $name2 = $row["NomPrénom_Gérant"];
                          echo '<input type="text" name="NomP" class="form-control input-sm" style="margin-left: 22px;"  value="' . $name2 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 50px;">CIN_Gérant :</label>
                    <div class="col-sm-8">
                    <?php
                          $name3 = $row["CIN_Gérant"];
                          echo '<input type="text" name="CIN1" class="form-control input-sm" style="margin-left: 60px;"  value="' . $name3 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 44px;">Adresse :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name4 = $row["Adresse1"];
                          echo '<input type="text" name="adresse1" class="form-control input-sm" style="margin-left: 60px;"  value="' . $name4 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                <script src="js.js"></script>
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 44px;">Tél :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name5 = $row["Tél1"];
                          echo '<input type="text" name="tel1" class="form-control input-sm" style="margin-left: 60px;"  value="' . $name5 . '" onkeyup="validerNumeroTelephone(this);">';
                          echo ' <br> <div id="validationMessage"></div>';
                          ?>
                </div>
                </div>
            </fieldset>
                
                <br>
                <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 20px;">Personne Physique :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 76px;">Nom&Prénom :</label>
                        <div class="col-sm-8">
                        <?php
                          $name6 = $row["NomPrénom"];
                          echo '<input type="text" name="NomP2" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name6 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 131px;">CIN :</label>
                    <div class="col-sm-8">
                    <?php
                          $name7 = $row["CIN"];
                          echo '<input type="text" name="CIN2" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name7 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 103px;">Adresse :</label>
                    <div class="col-sm-8">
                    <?php
                          $name8 = $row["Adresse2"];
                          echo '<input type="text" name="adresse2" class="form-control input-sm" style="margin-left: 19px;" required value="' . $name8 . '">';
                          ?>
                </div>
                </div>
                <br>
            
                <div class="row cf-ro"> 
                <script src="js2.js"></script>
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 86px;">Tél :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name9 = $row["Tél2"];
                          echo '<input type="text" name="tel2" class="form-control input-sm" style="margin-left: 51px;" required value="' . $name9 . '" onkeyup="validerNumeroTelephone2(this);">';
                          echo ' <br> <div id="validationMessage2"></div>';
                          ?>
                </div>
                </div>
            </fieldset>
            <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 20px;">Situation du terrain :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 105px;">N° TF/Réq :</label>
                        <div class="col-sm-8">
                        <?php
                          $name10 = $row["N_TF_Req"];
                          echo '<input type="text" name="NTF" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name10 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 87px;">Nom_Terrain :</label>
                    <div class="col-sm-8">
                    <?php
                          $name11 = $row["Nom_Terrain"];
                          echo '<input type="text" name="NT" class="form-control input-sm" style="margin-left: 7px;" required value="' . $name11 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 55px;">N°_des_parcelles :</label>
                    <div class="col-sm-8">
                    <?php
                          $name12 = $row["N_parcelles"];
                          echo '<input type="text" name="NP" class="form-control input-sm" style="margin-left: 11px;" required value="' . $name12 . '">';
                          ?>
                </div>
                </div>
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
$sql = "SELECT id_p, name FROM provinces";
$resultat = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 46px;">Province :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListProvince" style="margin-left: 57px;"  name="province" required>';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($ligne = $resultat->fetch_assoc()) {
        $idProvince = $ligne['id_p'];
        $nomProvince = $ligne['name'];
        
        echo '<option value="' . $idProvince . '"';

        // Vérifier si la province est celle qui a été soumise

if (isset($row["Province"]) && $row["Province"] == $idProvince) {
    echo ' selected="selected"';
}

if ($selectedProvinceId !== null && $selectedProvinceId === $idProvince) {
    echo ' selected';
}

        echo '>' . $nomProvince . '</option>';
        
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune province trouvée dans la base de données.";
}



echo '<div id="resultats2"></div>';

// Fermer la connexion MySQL
$conn->close();
?>
<script>
    // Ajoutez un événement de changement à la liste déroulante des provinces
    var selectedValue = document.getElementById("selectListProvince").value;

// Effectuez une requête AJAX pour obtenir les communes sélectionnées
fetch('f.php?province=' + selectedValue)
    .then(response => response.text())
    .then(data => {
        // Mettez à jour les résultats dans la div "resultats"
        document.getElementById("resultats2").innerHTML = data;
    });
    document.getElementById("selectListProvince").addEventListener("change", function() {
        // Récupérez la valeur sélectionnée
        var selectedValue = this.value;

        // Effectuez une requête AJAX pour obtenir les résultats
        fetch('f.php?province=' + selectedValue)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les résultats dans la div "resultats"
                document.getElementById("resultats2").innerHTML = data;
            });
    });
</script>
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
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 41px;">Dpanef :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListDpanef2" style="margin-left: 58px;" name="dpanef" required>';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($lignedpanef = $resultatdpanef->fetch_assoc()) {
        $idDpanef = $lignedpanef['id'];
        $nomDpanef = $lignedpanef['name'];
        echo '<option value="' . $idDpanef . '"';

        // Vérifier si la province est celle qui a été soumise
        if (isset($row["DPANEF"]) && $row["DPANEF"] == $idDpanef) {
            echo ' selected="selected"';
        }
 

        echo '>' . $nomDpanef . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune dpanef trouvée dans la base de données.";
}




// Fermer la connexion MySQL
$conn->close();
?>

<br>
<!-- Liste déroulante pour les zones -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;">Zone forestière :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListZone2" style="margin-left: 61px;" name="zone" required>
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>
<br>
<!-- Liste déroulante pour les districts forestiers -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;margin-left: -14px;">District Forestier :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListDistrict2" style="margin-left: 63px;" name="district" required>
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>

<script>



    // Fonction pour charger les zones en fonction de DPANEF sélectionné
    function loadZones(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les zones en fonction de DPANEF
        fetch('get_zones.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des zones
                document.getElementById("selectListZone2").innerHTML = data;
            });
    }

    // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
    function loadDistricts(selectedDPANEF, selectedZone) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts.php?dpanef=' + selectedDPANEF + '&zone=' + selectedZone)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict2").innerHTML = data;
            });
    }
       // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
       function loadDistricts2(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts2.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict2").innerHTML = data;
            });
    }
    var selectedDPANEF = document.getElementById("selectListDpanef2").value;
        loadZones(selectedDPANEF);
    // Ajoutez un événement de changement à la liste déroulante DPANEF
    document.getElementById("selectListDpanef2").addEventListener("change", function() {
        var selectedDPANEF = this.value;
        loadZones(selectedDPANEF);
    });
    var selectedDPANEF =document.getElementById("selectListDpanef2").value;
   // var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
  // Ajoutez un événement de changement à la liste déroulante DPANEF
document.getElementById("selectListDpanef2").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef2").value;
  //  var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
});
//var selectedDPANEF = document.getElementById("selectListDpanef").value;
   // var selectedZone = document.getElementById("selectListZone").value;
   // loadDistricts(selectedDPANEF, selectedZone);
// Ajoutez un événement de changement à la liste déroulante des zones
document.getElementById("selectListZone2").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef2").value;
    var selectedZone = document.getElementById("selectListZone2").value;
    loadDistricts(selectedDPANEF, selectedZone);
});

</script>
<br>
<div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style="color:#E3AA01;">Superficie de la parcelle en ha :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name13 = $row["Superficie_ha"];
                          echo '<input type="number" name="supha" id="supha" min="0" style="margin-left: 68px;" step="1" required value="' . $name13. '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style=" color: #E3AA01; margin-left: 8px;">Occupation :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name14 = $row["Occupation"];
                          echo '<input type="text" name="occ" class="form-control input-sm" style="margin-left: 69px;" required value="' . $name14 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label"  style="margin-left: 20px;
  margin-top: 30px;color:#E3AA01;">Droits et charges foncières :</label>
                        <div class="col-sm-8">

                        </div>
                        <?php
                          $name15 = $row["Droits_et_charges_foncières"];
                          echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="DCF" required>' . $name15. '</textarea>';
                          ?>
                        

                    </div>
            </fieldset>
         
            <br>
   
                <fieldset id="groupedLabels">
                    <legend style="color:#374D72;margin-left: 20px;">Chronologie:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: 48px;">Date de Demande :</label>
                            <div class="col-sm-8">
                            <?php
                          $name16 = $row["date_Demande"];
                          echo '<input type="date" name="DateD" style="margin-left: 46px;" required value="' . $name16. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: -57px;">Date Reconnaissance Provinciale :</label>
                             <div class="col-sm-8"><div class="col-sm-8">
                             <?php
                          $name17 = $row["date_Reconnaissance_Provinciale"];
                          echo '<input type="date" name="DateR" style="margin-left: 35px;"  value="' . $name17. '">';
                          ?>
                            </div></div>
                            </div>
                        <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: -51px;">Date Reconnaissance Régionale :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name18 = $row["date_Reconnaissance_Régionale"];
                          echo '<input type="date" name="DateRR"  style="margin-left: 36px;"  value="' . $name18. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: -49px;">Date Reconnaissance Natioanle :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name19 = $row["date_Reconnaissance_Nationale"];
                          echo '<input type="date" name="DateRN" style="margin-left: 37px;" value="' . $name19. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 44px;">Accord de principe :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name20 = $row["date_Accord_de_principe"];
                          echo '<input type="date" name="DateAP"  style="margin-left: 39px;" required value="' . $name20. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="margin-left: 59px;color:#E3AA01;">Date d'Expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name21 = $row["date_Expertise"];
                          echo '<input type="date" name="DateExp" style="margin-left: 39px;"  value="' . $name21. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 34px;">Révision d'expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name22 = $row["date_Révision_d_expertise"];
                          echo '<input  type="date" name="DateRExp"  style="margin-left: 41px;" value="' . $name22. '">';
                          ?>
                            </div></div>
                            </div>
                           
                </fieldset>
                <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: -28px;">Valeur vénale en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <?php
                          $name23 = $row["Valeur_vénale_en_Dh_Hectare"];
                          echo '<input  type="number" name="VDH" id="VDH" min="0"  step="1" style="margin-left: 55px;" required value="' . $name23. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: -83px;">Valeur vénale révisée en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <?php
                          $name24 = $row["Valeur_vénale_révisée_en_Dh_Hectare"];
                          echo '<input  type="number" name="VDHR" id="VDHR" min="0"  style="margin-left: 55px;" step="1"  value="' . $name24. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 30px;">Montant Total en Dh :</label>
                             <div class="col-sm-8">
                             <?php
                          $name25 = $row["Montant_Total_en_Dh"];
                          echo '<input  type="number" name="montantTD" id="montantTotal" min="0" style="margin-left: 55px;" step="1" required value="' . $name25. '">';
                          ?>
                            </div>
                            </div>
                            <script>
    // Sélectionnez les éléments d'entrée
    const suphaInput = document.getElementById('supha');
    const VDHInput = document.getElementById('VDH');
    const VDHRInput = document.getElementById('VDHR');
    const montantTotalInput = document.getElementById('montantTotal');

    // Ajoutez un écouteur d'événement pour surveiller les changements
    suphaInput.addEventListener('input', calculerMontantTotal);
    VDHInput.addEventListener('input', calculerMontantTotal);
    VDHRInput.addEventListener('input', calculerMontantTotal);

    // Fonction pour calculer le montant total
    function calculerMontantTotal() {
        const superficie = parseFloat(suphaInput.value);
        const valeurVenale = parseFloat(VDHInput.value);
        const valeurVenaleRevisée = parseFloat(VDHRInput.value);

        if (!isNaN(superficie) && !isNaN(valeurVenale)) {
            if (!isNaN(valeurVenaleRevisée)) {
                montantTotalInput.value = (superficie * valeurVenaleRevisée).toFixed(2);
            } else {
                montantTotalInput.value = (superficie * valeurVenale).toFixed(2);
            }
        } else {
            montantTotalInput.value = '';
        }
    }
</script>
               
                <br>
     
 <div  class="row cf-ro">
                    <label style="color:#E3AA01;margin-left: 67px;">Coordonnées :</label>
                    <div class="col-sm-8">
                    <?php
include('../connexion.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération du fichier .kmz depuis la base de données
$id = $row['id']; // Remplacez 1 par l'ID du fichier .kmz que vous souhaitez récupérer
$query = "SELECT nom_fichier FROM table_kmz2 WHERE id_acquisition = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nom_fichier);
$stmt->fetch();
//$stmt->close();
//$conn->close();


// Affichage du lien
echo '<a href="https://earth.google.com/web/?kmz='.$nom_fichier.'" class="btn btn-success btn-sm" target="_blank">Ouvrir dans Google Earth</a>';

?>
                       
                </div>
                </div>
                <br>
                   <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;color:#E3AA01;
  margin-top: 30px;">Observation :</label>
                        <div class="col-sm-8">

                        </div>
                        <?php
                          $name26 = $row["Observation"];
                          echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr2">' . $name26. '</textarea>';
                          ?>
                        

                    </div>
                    <br>
                    <br>
                    <?php
                         $terrainAcquis = $row["Terrain_acquis"];
                          ?>
                    <fieldset id="groupedLabels">
    <legend style="color:#374D72;">Terrain acquis (Oui/Non/en cours):</legend>
    <label for="oui1">Oui</label>
    <input type="radio" id="oui1" name="TA" value="Oui" <?php echo ($terrainAcquis === 'Oui') ? 'checked' : ''; ?>>
    <br>
    <label for="encours">en cours</label>
    <input type="radio" id="encours" name="TA" value="en cours" <?php echo ($terrainAcquis === 'en cours') ? 'checked' : ''; ?>>
    <br>
    <label for="non1">Non</label>
    <input type="radio" id="non1" name="TA" value="Non" <?php echo ($terrainAcquis === 'Non') ? 'checked' : ''; ?>>
</fieldset>
<br>
                <div id="documentsDiv2" style="display: none;">
                <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 48px;">Date d'acquistion :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name27 = $row["Date_d_acquisition"];
                          echo '<input  type="date" name="DateDA" style="margin-left: 100px;" value="' . $name27. '">';
                          ?>
                            </div></div>
                            </div>
    </div>

                <br>
                <br>
                <?php
                         $terrainReboisé = $row["Terrain_reboisé"];
                          ?>
                <fieldset id="groupedLabels">
    <legend style="color:#374D72;">Terrain reboisé (Oui/Non):</legend>
    <label for="oui2">Oui</label>
    <input type="radio" id="oui2" name="TR" value="Oui" <?php echo ($terrainReboisé === 'Oui') ? 'checked' : ''; ?>>
    <br>
    <label for="non2">Non</label>
    <input type="radio" id="non2" name="TR" value="Non" <?php echo ($terrainReboisé === 'Non') ? 'checked' : ''; ?>>
</fieldset>
<br>
                <div id="documentsDiv3" style="display: none;">
                
                <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 47px;">Année et marché :</label>
                             <div class="col-sm-8"><?php
                          $AM = $row["Année_et_marché"];
                          echo '<input  type="text" name="AM" class="form-control input-sm" style="margin-left: 110px;" value="' . $AM. '">';
                          ?></div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 94px;">Technique :</label>
                             <div class="col-sm-8"><?php
                          $TCH = $row["Technique"];
                          echo '<input  type="text" style="margin-left: 116px;" name="TCH" class="form-control input-sm" value="' . $TCH. '">';
                          ?></div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left:60px;">Espéce utilisée :</label>
                             <div class="col-sm-8"><?php
                          $EU = $row["Espèce_utilisée"];
                          echo '<input  type="text" name="EU" class="form-control input-sm" style="margin-left: 120px;" value="' . $EU. '">';
                          ?></div>
                            </div>
    </div>
    <script>
    var documentsDiv2 = document.getElementById("documentsDiv2");
    var documentsDiv3 = document.getElementById("documentsDiv3");

    // Modifier le style en fonction de la valeur de $terrainAcquis
    if ("<?php echo $terrainAcquis; ?>" === "Oui") {
        documentsDiv2.style.display = "block";
    } else {
        documentsDiv2.style.display = "none";
    }

    // Modifier le style en fonction de la valeur de $terrainReboisé
    if ("<?php echo $terrainReboisé; ?>" === "Oui") {
        documentsDiv3.style.display = "block";
    } else {
        documentsDiv3.style.display = "none";
    }
</script>
    <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");

    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv2 = document.getElementById("documentsDiv3");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton2.addEventListener("click", function () {
        if (ouiRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv2.style.display = "block";
        } 
    });
    nonRadioButton2.addEventListener("click", function () {
        if (nonRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv2.style.display = "none";
        } 
    });
  
</script>


                <br>
                <br>
                <fieldset id="groupedLabels">
                    <legend>Dossier scané (Oui/Non):</legend>
                    <label for="oui">Oui</label>
<input type="radio" id="oui" name="DossierS" value="Oui">
<br>
<label for="non">Non</label>
<input type="radio" id="non" name="DossierS" value="Non" checked>

                </fieldset>
                <div id="documentsDiv" style="display: none;">
                <?php
// Connexion à la base de données (remplacez les informations par celles de votre configuration)
include('../connexion.php');
// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des fichiers importés à partir de la base de données
$sql2 = "SELECT * FROM fichiers_importes2";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // Afficher les fichiers importés
    echo "<h2 style=\"text-align: center;\">Fichiers importés :</h2>";
    echo "<ul>";
    while ($r = $result2->fetch_assoc()) {
        echo "<li style=\"text-align: center;margin-bottom: 10px;\"><a href='uploads/" . $r["nom_fichier"] . "' download>" . $r["nom_fichier"] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "<script>alert('Aucun fichier importé.');
            </script>";
    
}

$conn->close();
?>
    </div>
    <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton = document.getElementById("oui");
    var nonRadioButton = document.getElementById("non");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv = document.getElementById("documentsDiv");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton.addEventListener("click", function () {
        if (ouiRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv.style.display = "block";
        } 
    });
    nonRadioButton.addEventListener("click", function () {
        if (nonRadioButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv.style.display = "none";
        } 
    });
</script>
 
<br>
<br>
                    <div class="col-sm-8">
                    <input type="hidden" name="formId2" value="<?php echo $row["id"]; ?>">
                    
    <button  name="deleteForm2" id="DF1" class='btn btn-sm btn-danger' style="margin-left: -43px;
margin-top: -7014px;">Supprimer</button>
    <button name="updateForm2" id="UF1" class='btn btn-sm btn-warning' style="margin-left: 28px;
margin-top:-7014px;">Modifier</button>
                        </div>
                                      
                        <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");
    var ouiRadioButton3 = document.getElementById("oui");
    var nonRadioButton3 = document.getElementById("non");
    var deleteButton1 = document.getElementById("DF1");
    var updateButton1 = document.getElementById("UF1");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
      ////
        if (ouiRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8115px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8115px";
    } 
    ////
    if (ouiRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7397px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7397px";
    } 
   ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7731px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7731px";
    } 
    ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7013px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7013px";
    }
    
  });
  nonRadioButton2.addEventListener("click", function () {
     
    ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7731px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7731px";
    }
    ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7013px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7013px";
    }
    ////
    if (encoursButton.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7646px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7646px";
    } 

  ////
    if (encoursButton.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-34px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    } 
    ////
    if (nonRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7645px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7645px";
    } 
    ////
    if (nonRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-35px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    } 
  });
  ouiRadioButton2.addEventListener("click", function () {
       ////
       if (ouiRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8115px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8115px";
    } 
        ////
    if (ouiRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7397px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7397px";
    }
   
    ////
    if (encoursButton.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-8031px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8031px";
    } 
    ////
    if (encoursButton.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7310px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7310px";
    } 
   ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8029px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8029px";
    } 
    ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7315px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7315px";
    } 
  });
  ouiRadioButton3.addEventListener("click", function () {
      ////
      if (ouiRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8115px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8115px";
    } 

    ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7731px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7731px";
    }
    ////
    if (encoursButton.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-8031px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8031px";
    }  
  ////
  if (encoursButton.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7646px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7646px";
    }   
        ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8029px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8029px";
    } 
    ////
    if (nonRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7645px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7645px";
    } 
  });
  nonRadioButton3.addEventListener("click", function () {
     ////
     if (ouiRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7397px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7397px";
    }
    ////
    if (ouiRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7013px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7013px";
    }
   ////
   if (encoursButton.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7310px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7310px";
    }  
  ////
  if (encoursButton.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-34px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    } 
       ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7315px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7315px";
    } 
   ////
   if (nonRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-35px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    } 
     });
  nonRadioButton1.addEventListener("click", function () {
       
  
    ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-8029px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8029px";
    } 
   ////
   if (nonRadioButton1.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7315px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7315px";
    }
   
     ////
     if (nonRadioButton1.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-37px";
        deleteButton1.style.marginTop = "-7645px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7645px";
    } 
 ////
 if (nonRadioButton1.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-35px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    } 
  });
  encoursButton.addEventListener("click", function () {
      ////
    if (encoursButton.checked && ouiRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-8031px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-8031px";
    } 
      ////
      if (encoursButton.checked && ouiRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7310px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7310px";
    } 
     ////
    if (encoursButton.checked && nonRadioButton2.checked && ouiRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-38px";
        deleteButton1.style.marginTop = "-7646px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7646px";
    } 
     ////
     if (encoursButton.checked && nonRadioButton2.checked && nonRadioButton3.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-34px";
        deleteButton1.style.marginTop = "-6929px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6929px";
    }  
  });
   /* nonRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7540px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7540px";
    } 
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7459px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7459px";
    } 
    });
    encoursButton.addEventListener("click", function () {
        if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7540px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7540px";
    } 
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7459px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7459px";
    } 
    });*/
</script>
                        <script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");

    // Sélectionnez les champs de saisie de texte
    var anneeEtMarcheInput = document.querySelector('input[name="AM"]');
    var techniqueInput = document.querySelector('input[name="TCH"]');
    var especeUtiliseeInput = document.querySelector('input[name="EU"]');

    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv2 = document.getElementById("documentsDiv3");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton2.addEventListener("click", function () {
        if (ouiRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv2.style.display = "block";
        } 
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Non"
    nonRadioButton2.addEventListener("click", function () {
        if (nonRadioButton2.checked) {
            // Si "Non" est sélectionné, masquez le contenu
            documentsDiv2.style.display = "none";

            // Effacez les valeurs des champs de saisie de texte
            anneeEtMarcheInput.value = "";
            techniqueInput.value = "";
            especeUtiliseeInput.value = "";
        } 
    });
</script>
<script>
    // Sélectionnez les boutons radio et le champ de date par leur ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
    var dateDAInput = document.querySelector('input[name="DateDA"]');

    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv1.style.display = "block";
        }
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Non"
    nonRadioButton1.addEventListener("click", function () {
        if (nonRadioButton1.checked || encoursButton.checked) {
            // Si "Non" ou "En cours" est sélectionné, masquez le contenu et effacez la valeur du champ de date
            documentsDiv1.style.display = "none";
            dateDAInput.value = "";
        }
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "En cours"
    encoursButton.addEventListener("click", function () {
        if (encoursButton.checked) {
            // Si "En cours" est sélectionné, masquez le contenu et effacez la valeur du champ de date
            documentsDiv1.style.display = "none";
            dateDAInput.value = "";
        }
    });
</script>        
    
                      
                   </div>
             
                 <br>
            </div>
        </div>
    </div>
    <br>
    <br>
  

    </form>
    <?php
            
        }
    } else {
        echo "<script>alert('Aucun résultat trouvé.');
              window.location.href = 'ajouter_formulaire.php';
              </script>";
    }
}     
    

    else
    {
      
        
      
        ?>  
          <form method="post" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
            <br>
            <h2 style="text-align: center;color:#51713F;">Formulaire d'acquisition</h2>
            
                <br>
             <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 18px;">Personne Morale :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 44px;">Nom _Société :</label>
                        <div class="col-sm-8">
                          <input type="text" name="NomS" class="form-control input-sm" style="margin-left: 5px;margin-left: 51px;">
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 14px;">Nom&prénom_Gérant :</label>
                    <div class="col-sm-8">
                     <input type="text" name="NomP" class="form-control input-sm" style="margin-left: 22px;">
                          
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 50px;">CIN_Gérant :</label>
                    <div class="col-sm-8">
                      <input type="text" name="CIN1" class="form-control input-sm" style="margin-left: 60px;">
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 44px;">Adresse :</label></div>
                    <div class="col-sm-8">
                     <input type="text" name="adresse1" class="form-control input-sm" style="margin-left: 60px;">
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                <script src="js.js"></script>
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 44px;">Tél :</label></div>
                    <div class="col-sm-8">
                      <input type="text" name="tel1" class="form-control input-sm" style="margin-left: 60px;"  onkeyup="validerNumeroTelephone(this);">
                      <br>
                      <div id="validationMessage"></div>
                     
                      
                </div>
                </div>
            
                
                <br>
                <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 20px;">Personne Physique :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 76px;">Nom&Prénom :</label>
                        <div class="col-sm-8">

                         <input type="text" name="NomP2" class="form-control input-sm" style="margin-left: 5px;" required>
                       
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 131px;">CIN :</label>
                    <div class="col-sm-8">
                          <input type="text" name="CIN2" class="form-control input-sm" style="margin-left: 22px;" required>
                          
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 103px;">Adresse :</label>
                    <div class="col-sm-8">
                          <input type="text" name="adresse2" class="form-control input-sm" style="margin-left: 19px;" required>
                          
                </div>
                </div>
                <br>
            
                <div class="row cf-ro"> 
                <script src="js2.js"></script>
                    <div  class="col-sm-3"><label style="color:#E3AA01;margin-left: 86px;">Tél :</label></div>
                    <div class="col-sm-8">
                    
                         <input type="text" name="tel2" class="form-control input-sm" style="margin-left: 51px;" required onkeyup="validerNumeroTelephone2(this);">
                         <br>
                         <div id="validationMessage2"></div>
              
                </div>
                </div>
            </fieldset>
            </fieldset>
            <fieldset id="groupedLabels">
                <legend style="color:#374D72;margin-left: 20px;">Situation du terrain :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label style="color:#E3AA01;margin-left: 105px;">N° TF/Réq :</label>
                        <div class="col-sm-8">
                       <input type="text" name="NTF" class="form-control input-sm" style="margin-left: 5px;" required >
                          
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 87px;">Nom_Terrain :</label>
                    <div class="col-sm-8">
                  
                         <input type="text" name="NT" class="form-control input-sm" style="margin-left: 7px;" required >
                          
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label style="color:#E3AA01;margin-left: 55px;">N°_des_parcelles :</label>
                    <div class="col-sm-8">
                  <input type="text" name="NP" class="form-control input-sm" style="margin-left: 11px;" required>
                          
                </div>
                </div>
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
$sql = "SELECT id_p, name FROM provinces";
$resultat = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($resultat->num_rows > 0) {
    echo '<div class="row cf-ro">';
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 46px;">Province :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListS" name="province"  required style="margin-left: 58px;">';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($ligne = $resultat->fetch_assoc()) {
        $idProvince = $ligne['id_p'];
        $nomProvince = $ligne['name'];
        
        echo '<option value="' . $idProvince . '"';

        // Vérifier si la province est celle qui a été soumise



if ($selectedProvinceId !== null && $selectedProvinceId === $idProvince) {
    echo ' selected';
}

        echo '>' . $nomProvince . '</option>';
        
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune province trouvée dans la base de données.";
}



echo '<div id="resultatsR"></div>';

// Fermer la connexion MySQL
$conn->close();
?>
<script>
    // Ajoutez un événement de changement à la liste déroulante des provinces
    var selectedValue = document.getElementById("selectListS").value;

// Effectuez une requête AJAX pour obtenir les communes sélectionnées
fetch('f.php?province=' + selectedValue)
    .then(response => response.text())
    .then(data => {
        // Mettez à jour les résultats dans la div "resultats"
        document.getElementById("resultatsR").innerHTML = data;
    });
    document.getElementById("selectListS").addEventListener("change", function() {
        // Récupérez la valeur sélectionnée
        var selectedValue = this.value;

        // Effectuez une requête AJAX pour obtenir les résultats
        fetch('f.php?province=' + selectedValue)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les résultats dans la div "resultats"
                document.getElementById("resultatsR").innerHTML = data;
            });
    });
</script>
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
    echo '<div class="col-sm-3"><label style="color:#E3AA01;margin-left: 41px;">Dpanef :</label></div>';
    echo '<div class="col-sm-8">';
    echo '<select class="form-control" id="selectListDpanef" name="dpanef"  required style="margin-left: 61px;">';

    // Générer les options dynamiquement en utilisant les données de la table 'provinces'
    while ($lignedpanef = $resultatdpanef->fetch_assoc()) {
        $idDpanef = $lignedpanef['id'];
        $nomDpanef = $lignedpanef['name'];
        echo '<option value="' . $idDpanef . '"';

   
 

        echo '>' . $nomDpanef . '</option>';
    }

    echo '</select>';
    echo '</div>';
    echo '</div>';
} else {
    echo "Aucune dpanef trouvée dans la base de données.";
}




// Fermer la connexion MySQL
$conn->close();
?>

<br>
<!-- Liste déroulante pour les zones -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;">Zone forestière :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListZone" name="zone" required style="margin-left: 62px;">
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>
<br>
<!-- Liste déroulante pour les districts forestiers -->
<div class="row cf-ro">
    <div class="col-sm-3"><label style="color:#E3AA01;margin-left: -14px;">District Forestier :</label></div>
    <div class="col-sm-8">
        <select class="form-control" id="selectListDistrict" name="district" required style="margin-left: 64px;">
            <!-- Générer les options dynamiquement ici -->
        </select>
    </div>
</div>

<script>



    // Fonction pour charger les zones en fonction de DPANEF sélectionné
    function loadZones(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les zones en fonction de DPANEF
        fetch('get_zones.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des zones
                document.getElementById("selectListZone").innerHTML = data;
            });
    }

    // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
    function loadDistricts(selectedDPANEF, selectedZone) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts.php?dpanef=' + selectedDPANEF + '&zone=' + selectedZone)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict").innerHTML = data;
            });
    }
       // Fonction pour charger les districts forestiers en fonction de DPANEF et de la zone sélectionnée
       function loadDistricts2(selectedDPANEF) {
        // Effectuez une requête AJAX pour obtenir les districts forestiers en fonction de DPANEF et de la zone
        fetch('get_districts2.php?dpanef=' + selectedDPANEF)
            .then(response => response.text())
            .then(data => {
                // Mettez à jour les options de la liste déroulante des districts forestiers
                document.getElementById("selectListDistrict").innerHTML = data;
            });
    }
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
        loadZones(selectedDPANEF);
    // Ajoutez un événement de changement à la liste déroulante DPANEF
    document.getElementById("selectListDpanef").addEventListener("change", function() {
        var selectedDPANEF = this.value;
        loadZones(selectedDPANEF);
    });
    var selectedDPANEF =document.getElementById("selectListDpanef").value;
   // var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
  // Ajoutez un événement de changement à la liste déroulante DPANEF
document.getElementById("selectListDpanef").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
  //  var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts2(selectedDPANEF);
});
//var selectedDPANEF = document.getElementById("selectListDpanef").value;
   // var selectedZone = document.getElementById("selectListZone").value;
   // loadDistricts(selectedDPANEF, selectedZone);
// Ajoutez un événement de changement à la liste déroulante des zones
document.getElementById("selectListZone").addEventListener("change", function() {
    var selectedDPANEF = document.getElementById("selectListDpanef").value;
    var selectedZone = document.getElementById("selectListZone").value;
    loadDistricts(selectedDPANEF, selectedZone);
});

</script>
<br>
<div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style="color:#E3AA01;">Superficie de la parcelle en ha :</label></div>
                    <div class="col-sm-8">
                    <input type="number" name="supha" id="supha" min="0"  step="1" required style="margin-left: 68px;">
                          
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label style=" color: #E3AA01; margin-left: 8px;">Occupation :</label></div>
                    <div class="col-sm-8">
                   <input type="text" name="occ" class="form-control input-sm" style="margin-left: 69px;" required>
                          
                </div>
                </div>
                
                <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
  margin-top: 30px;color:#E3AA01;">Droits et charges foncières :</label>
                        <div class="col-sm-8">

                        </div>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="DCF" required></textarea>
                          
                        

                    </div>
            </fieldset>
         
            <br>
   
                <fieldset id="groupedLabels">
                    <legend style="color:#374D72;margin-left: 20px;">Chronologie:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: 48px;">Date de Demande :</label>
                            <div class="col-sm-8">
                            <input type="date" name="DateD" required style="margin-left: 46px;">
                          
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: -57px;">Date Reconnaissance Provinciale :</label>
                             <div class="col-sm-8"><div class="col-sm-8">
                             <input type="date" name="DateR" style="margin-left: 35px;">
                          
                            </div></div>
                            </div>
                        <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: -51px;">Date Reconnaissance Régionale :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                               <input type="date" name="DateRR" style="margin-left: 36px;">
                          
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: -49px;">Date Reconnaissance Natioanle :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                              <input type="date" name="DateRN" style="margin-left: 37px;">
                          
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 44px;">Accord de principe :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                           <input type="date" name="DateAP" style="margin-left: 39px;" required>
                          
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="margin-left: 59px;color:#E3AA01;">Date d'Expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                               <input type="date" name="DateExp"  style="margin-left: 39px;">
                          
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 34px;">Révision d'expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                             <input  type="date" name="DateRExp"  style="margin-left: 41px;">
                          
                            </div></div>
                            </div>
                           
                </fieldset>
                <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: -28px;">Valeur vénale en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <input  type="number" name="VDH" id="VDH" min="0"  step="1" required style="margin-left: 55px;">
                          
                        </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                            <label style="color:#E3AA01;margin-left: -83px;">Valeur vénale révisée en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <input  type="number" name="VDHR" id="VDHR" min="0"  step="1" style="margin-left: 55px;">
                          
                        </div>
                    </div>
                    <br>
                    <div class="row cf-ro">
    <label style="color:#E3AA01;margin-left: 30px;">Montant Total en Dh :</label>
    <div class="col-sm-8">
        <input type="number" name="montantTD" id="montantTotal" min="0" step="1" required readonly style="margin-left: 55px;">
    </div>
</div>
<script>
    // Sélectionnez les éléments d'entrée
    const suphaInput = document.getElementById('supha');
    const VDHInput = document.getElementById('VDH');
    const VDHRInput = document.getElementById('VDHR');
    const montantTotalInput = document.getElementById('montantTotal');

    // Ajoutez un écouteur d'événement pour surveiller les changements
    suphaInput.addEventListener('input', calculerMontantTotal);
    VDHInput.addEventListener('input', calculerMontantTotal);
    VDHRInput.addEventListener('input', calculerMontantTotal);

    // Fonction pour calculer le montant total
    function calculerMontantTotal() {
        const superficie = parseFloat(suphaInput.value);
        const valeurVenale = parseFloat(VDHInput.value);
        const valeurVenaleRevisée = parseFloat(VDHRInput.value);

        if (!isNaN(superficie) && !isNaN(valeurVenale)) {
            if (!isNaN(valeurVenaleRevisée)) {
                montantTotalInput.value = (superficie * valeurVenaleRevisée).toFixed(2);
            } else {
                montantTotalInput.value = (superficie * valeurVenale).toFixed(2);
            }
        } else {
            montantTotalInput.value = '';
        }
    }
</script>
               
                <br>
                <label for="kmzFile" style="color:#E3AA01;">Sélectionnez un fichier KMZ :</label>
                <input type="file" name="fileToUpload" id="fileToUpload" accept=".kmz">
                <br>
                <label for="files">Sélectionner un ou plusieurs fichiers :</label>
                   <input type="file" id="files" name="files[]" multiple>
                   <br>
                   <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;color:#E3AA01;
  margin-top: 30px;">Observation :</label>
                        <div class="col-sm-8">

                        </div>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr2"></textarea>
                          
                        

                    </div>
                    <br>
                    <br>
                    <fieldset id="groupedLabels">
                    <legend style="color:#374D72;">Terrain acquis (Oui/Non/en cours):</legend>
                    <label for="oui1">Oui</label>
<input type="radio" id="oui1" name="TA" value="Oui">
<br>
<label for="encours">en cours</label>
<input type="radio" id="encours" name="TA" value="en cours">
<br>
<label for="non1">Non</label>
<input type="radio" id="non1" name="TA" value="Non" checked>

                </fieldset>
                <div id="documentsDiv2" style="display: none;">
                <div class="row cf-ro"> 
                                <label style="color:#E3AA01;margin-left: 48px;">Date d'acquistion :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                          <input  type="date" name="DateDA" style="margin-left: 100px;">
                          
                            </div></div>
                            </div>
    </div>
    
                <br>
                <br>
                <fieldset id="groupedLabels">
                    <legend style="color:#374D72;">Terrain reboisé (Oui/Non) :</legend>
                    <label for="oui2">Oui</label>
<input type="radio" id="oui2" name="TR" value="Oui">
<br>
<label for="non2">Non</label>
<input type="radio" id="non2" name="TR" value="Non" checked>

                </fieldset>
                <br>
                <div id="documentsDiv3" style="display: none;">
                
                <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 47px;">Année et marché :</label>
                             <div class="col-sm-8">
                          <input  type="text" name="AM" class="form-control input-sm" style="margin-left: 110px;">
                          </div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left: 94px;">Technique :</label>
                             <div class="col-sm-8">
                                <input  type="text" name="TCH" class="form-control input-sm" style="margin-left: 116px;">
                          </div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label style="color:#E3AA01;margin-left:60px;">Espéce utilisée :</label>
                             <div class="col-sm-8">
                                <input  type="text" name="EU" class="form-control input-sm" style="margin-left: 120px;">
                          </div>
                            </div>
    </div>

                <br>
                <br>
                <div class="col-sm-8">
                         <button type="submit" class="btn btn-success btn-sm" name="submit_button">Envoyer</button>
                         <button type="reset" id="DF1" name="deleteForm" class='btn btn-sm btn-danger' style="margin-left: -107px;
 margin-top: -6726px;">Supprimer</button>
<button name="UpdateForm" id="UF1" class='btn btn-sm btn-warning' style="margin-left: 33px;
 margin-top: -6726px;" onclick="modifierFormulaire()">Modifier</button>

<script>
function modifierFormulaire() {
    // Ajoutez ici le code que vous souhaitez exécuter lorsque le bouton "Modifier" est cliqué
    alert('Vous pouvez pas modifier le formulaire dans cette section , il faut modifier un formulaire qu\'existe deja !!!!!.');
    // Vous pouvez également ajouter d'autres actions JavaScript ici
}
</script>
<script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");

    // Sélectionnez les champs de saisie de texte
    var anneeEtMarcheInput = document.querySelector('input[name="AM"]');
    var techniqueInput = document.querySelector('input[name="TCH"]');
    var especeUtiliseeInput = document.querySelector('input[name="EU"]');

    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv2 = document.getElementById("documentsDiv3");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton2.addEventListener("click", function () {
        if (ouiRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv2.style.display = "block";
        } 
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Non"
    nonRadioButton2.addEventListener("click", function () {
        if (nonRadioButton2.checked) {
            // Si "Non" est sélectionné, masquez le contenu
            documentsDiv2.style.display = "none";

            // Effacez les valeurs des champs de saisie de texte
            anneeEtMarcheInput.value = "";
            techniqueInput.value = "";
            especeUtiliseeInput.value = "";
        } 
    });
</script>


<script>
    // Sélectionnez les boutons radio et le champ de date par leur ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
  
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");
    var dateDAInput = document.querySelector('input[name="DateDA"]');

    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv1.style.display = "block";
        }
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Non"
    nonRadioButton1.addEventListener("click", function () {
        if (nonRadioButton1.checked || encoursButton.checked) {
            // Si "Non" ou "En cours" est sélectionné, masquez le contenu et effacez la valeur du champ de date
            documentsDiv1.style.display = "none";
            dateDAInput.value = "";
        }
    });

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "En cours"
    encoursButton.addEventListener("click", function () {
        if (encoursButton.checked) {
            // Si "En cours" est sélectionné, masquez le contenu et effacez la valeur du champ de date
            documentsDiv1.style.display = "none";
            dateDAInput.value = "";
        }
    });
</script>
                
<script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");
    var deleteButton1 = document.getElementById("DF1");
    var updateButton1 = document.getElementById("UF1");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
        ////
        if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7195px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7195px";
    } 
////
    if (nonRadioButton2.checked && ouiRadioButton1.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6810px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6810px";
    } 
  });
  nonRadioButton2.addEventListener("click", function () {
     ////
    if (encoursButton.checked && nonRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6727px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6727px";
    } 
  ////
  if (nonRadioButton2.checked && ouiRadioButton1.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6810px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6810px";
    } 
    ////
    if (nonRadioButton1.checked && nonRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6726px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6726px";
    } 
  });
  ouiRadioButton2.addEventListener("click", function () {
         ////
         if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7195px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7195px";
    } 
////
    if (encoursButton.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7110px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7110px";
    } 
    ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7109px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7109px";
    } 
  });
  nonRadioButton1.addEventListener("click", function () {
         ////
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7109px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7109px";
    } 
       ////
    if (nonRadioButton1.checked && nonRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6726px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6726px";
    } 
  });
  encoursButton.addEventListener("click", function () {
      

  ////
  if (encoursButton.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7110px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7110px";
    } 
     ////
     if (encoursButton.checked && nonRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-6727px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-6727px";
    } 
  });
   /* nonRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7540px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7540px";
    } 
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7459px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7459px";
    } 
    });
    encoursButton.addEventListener("click", function () {
        if (ouiRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7540px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7540px";
    } 
    if (nonRadioButton1.checked && ouiRadioButton2.checked) {
        // Appliquez le style lorsque les deux boutons "Oui" sont cochés
        deleteButton1.style.marginLeft = "-104px";
        deleteButton1.style.marginTop = "-7459px";
        updateButton1.style.marginLeft = "28px";
        updateButton1.style.marginTop = "-7459px";
    } 
    });*/
</script>


                        </div>

                   </div>
             
                 <br>
            </div>
        </div>
    </div>
    <br>
    <br>
  

    </form>

<br>

    <?php
//session_start();
if (isset($_POST["submit_button"])) {
 
        // Étape 4a: Insérer les coordonnées dans la table "distraction"


   include('../connexion.php');

        
   $Nom_SociétéEntreprise = $_POST['NomS'];
   $NomPrénom_Gérant = $_POST['NomP'];
   $CIN_Gérant = $_POST["CIN1"];
   $Adresse1  = $_POST["adresse1"];
   $Tél1 = $_POST["tel1"];
   $NomPrénom = $_POST["NomP2"];
   $CIN = $_POST["CIN2"];
   $Adresse2 = $_POST["adresse2"];
   $Tél2 = $_POST["tel2"];
   $N_TF_Req = $_POST["NTF"];
   $Nom_Terrain  = $_POST["NT"];
   $N_parcelles = $_POST["NP"];
   $Province = $_POST["province"];
   $CT = $_POST["commune"];
   $DPANEF = $_POST["dpanef"];
   $ZFDT = $_POST["zone"];
   $DFP = $_POST["district"];
   $Superficie_ha = $_POST["supha"];
   $Occupation = $_POST["occ"];
   $Droits_et_charges_foncières = $_POST["DCF"];
   $date_Demnade = $_POST["DateD"];
   $date_Reconnaissance_Provinciale = $_POST["DateR"];
   $date_Reconnaissance_Régionale = $_POST["DateRR"];
   $date_Reconnaissance_Nationale=$_POST["DateRN"];
   $date_Accord_de_principe=$_POST["DateAP"];
   $date_Expertise = $_POST["DateExp"];
   $date_Révision_d_expertise = $_POST["DateRExp"];
   $Valeur_vénale_en_Dh_Hectare = $_POST["VDH"];
   $Valeur_vénale_révisée_en_Dh_Hectare = $_POST["VDHR"];
   $Montant_Total_en_Dh  = $_POST["montantTD"];
   $Date_d_acquisition = $_POST["DateDA"];
   $Année_et_marché = $_POST["AM"];
   $Technique = $_POST["TCH"];
   $Espèce_utilisée = $_POST["EU"];
   $Observation = $_POST["obsr2"];
   $x=$_POST["x"];
   $y=$_POST["y"];
   $Terrain_acquis=$_POST["TA"];
   $Terrain_reboisé=$_POST["TR"];
   
    // Préparer la requête d'insertion
    $sql = "INSERT INTO acquisition (Nom_SociétéEntreprise,NomPrénom_Gérant,CIN_Gérant,Adresse1,Tél1,NomPrénom,CIN,Adresse2,Tél2,N_TF_Req,Nom_Terrain,N_parcelles,Province,CT,DPANEF,ZFDT,DFP,Superficie_ha,Occupation,Droits_et_charges_foncières,date_Demande,date_Reconnaissance_Provinciale,date_Reconnaissance_Régionale,date_Reconnaissance_Nationale,date_Accord_de_principe,date_Expertise,date_Révision_d_expertise,Valeur_vénale_en_Dh_Hectare,Valeur_vénale_révisée_en_Dh_Hectare,Montant_Total_en_Dh,Date_d_acquisition,Année_et_marché,Technique,Espèce_utilisée,Observation,x,y,Terrain_acquis,Terrain_reboisé)
    VALUES ('$Nom_SociétéEntreprise', '$NomPrénom_Gérant', '$CIN_Gérant', '$Adresse1', '$Tél1', '$NomPrénom', '$CIN', '$Adresse2', '$Tél2', '$N_TF_Req', '$Nom_Terrain', '$N_parcelles', '$Province', '$CT', '$DPANEF', '$ZFDT', ' $DFP', '$Superficie_ha', '$Occupation', '$Droits_et_charges_foncières', '$date_Demnade', '$date_Reconnaissance_Provinciale','$date_Reconnaissance_Régionale','$date_Reconnaissance_Nationale','$date_Accord_de_principe','$date_Expertise','$date_Révision_d_expertise','$Valeur_vénale_en_Dh_Hectare','$Valeur_vénale_révisée_en_Dh_Hectare','$Montant_Total_en_Dh','$Date_d_acquisition','$Année_et_marché','$Technique','$Espèce_utilisée','$Observation','$x','$y','$Terrain_acquis','$Terrain_reboisé')";
        // Préparer la requête d'insertion

        if ($conn->query($sql) === TRUE) {
            //$adresseGPS = str_replace(" ","+",$nom_commune);
               // Insérer chaque paire de coordonnées dans la base de données
               $query = "SELECT a.id
               FROM acquisition AS a
               WHERE a.Nom_SociétéEntreprise LIKE ? OR a.NomPrénom_Gérant LIKE ? OR a.CIN_Gérant LIKE ? OR a.Adresse1 LIKE ? OR a.Tél1 LIKE ? OR a.NomPrénom LIKE ? OR a.CIN LIKE ? OR a.Adresse2 LIKE ? OR a.Tél2 LIKE ? OR a.N_TF_Req = ? OR a.Nom_Terrain LIKE ? OR a.N_parcelles= ? OR a.Province = ? OR a.CT = ? OR a.DPANEF = ? OR a.ZFDT = ? OR a.DFP = ? OR a.Superficie_ha = ? OR a.Occupation LIKE ? OR a.Droits_et_charges_foncières LIKE ? OR a.Valeur_vénale_en_Dh_Hectare = ? OR a.Valeur_vénale_révisée_en_Dh_Hectare = ? OR a.Montant_Total_en_Dh = ?";
     
    // $likeR = '%' . $R . '%';
     
     $stmt = $conn->prepare($query);
     $stmt->bind_param("sssssssssisiiiiiiissiii",$Nom_SociétéEntreprise,$NomPrénom_Gérant,$CIN_Gérant,$Adresse1,$Tél1,$NomPrénom,$CIN,$Adresse2,$Tél2,$N_TF_Req,$Nom_Terrain,$N_parcelles,$Province,$CT,$DPANEF,$ZFDT,$DFP,$Superficie_ha,$Occupation,$Droits_et_charges_foncières,$Valeur_vénale_en_Dh_Hectare,$Valeur_vénale_révisée_en_Dh_Hectare,$Montant_Total_en_Dh);
     $stmt->execute();
     $result = $stmt->get_result();
     
     if ($result->num_rows > 0) {
         // Affichez les résultats
         while ($rowT = $result->fetch_assoc()) {
         
           $id = $rowT['id'];
           if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["files"])) {
                $totalFichiers = count($_FILES["files"]["name"]);
                
                for ($i = 0; $i < $totalFichiers; $i++) {
                    $nomFichier = $_FILES["files"]["name"][$i];
                    $cheminTemporaire = $_FILES["files"]["tmp_name"][$i];
                    
                    // Vous pouvez maintenant insérer chaque fichier dans la base de données et les déplacer vers le dossier d'uploads
                    $cheminDestination = "uploads/" . $nomFichier;
                    
                    // Déplacer le fichier téléchargé vers le dossier d'uploads
                    if (move_uploaded_file($cheminTemporaire, $cheminDestination)) {
                        // Insérer le fichier dans la base de données
                        $sqlInsert = "INSERT INTO fichiers_importes2 (nom_fichier, chemin_fichier,id_acquisition) VALUES ('$nomFichier', '$cheminDestination','$id')";
                        if ($conn->query($sqlInsert) === TRUE) {
                            // Le fichier a été téléchargé et inséré avec succès.
                        } else {
                            // Erreur lors de l'insertion du fichier dans la base de données.
                        }
                    } else {
                        // Erreur lors du déplacement du fichier.
                    }
                }
            }
        }
           $nomFichier = $_FILES["fileToUpload"]["name"];
           $contenuFichier = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
       
           // Connexion à la base de données MySQL
           include('../connexion.php');
       
           // Vérification de la connexion
           if ($conn->connect_error) {
               die("La connexion à la base de données a échoué : " . $conn->connect_error);
           }
       
           // Préparez la requête d'insertion
           $query = "INSERT INTO table_kmz2 (nom_fichier, kmz_content ,id_acquisition) VALUES (?, ?,?)";
           $stmt = $conn->prepare($query);
           $stmt->bind_param("ssi", $nomFichier, $contenuFichier,$id);
       
           // Exécutez la requête d'insertion
           if ($stmt->execute()) {
               echo "Le fichier KMZ a été inséré avec succès dans la base de données.";
           } else {
               echo "Erreur lors de l'insertion du fichier KMZ : " . $stmt->error;
           }
       
           // Fermeture de la connexion à la base de données
          // $stmt->close();
          // $conn->close();
            
            
        
            
            




         }
        }

         echo "<script>alert('Nouvel enregistrement inséré avec succès.');</script>";

          // Ajouter la redirection ici
          echo "<script>window.location.href = 'ajouter_formulaire.php';</script>";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

        // Fermer la connexion
        $conn->close();
    
}


?>

     <?php  
    }
    
    // Construire la requête SQL en fonction des valeurs sélectionnées

            
            ?> 
            
  

 
<br>
      </div>
    </div>
  </div>
  <br>



   </section> 
                    <!-- Content Row -->
                    <br>
                    <!-- Content Row -->

                    <br>
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

else
{
    $nb_distraction = 0;
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

else
{
    $nb_acquisition = 0;
}



// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql = "SELECT SUM(Superficie_parcelle_m2) as superficie_totale FROM distraction";

// Exécuter la requête SQL
$result = mysqli_query($conn, $sql);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result) > 0) {
  // Récupérer les données de la requête
  $row = mysqli_fetch_assoc($result);
  $superficie_totale = $row["superficie_totale"];
} 

else
{
    $superficie_totale = 0;
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql2 = "SELECT SUM(Montant_total) as Montant_total FROM distraction";

// Exécuter la requête SQL
$result2 = mysqli_query($conn, $sql2);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result2) > 0) {
  // Récupérer les données de la requête
  $row2 = mysqli_fetch_assoc($result2);
  $montant_global_distraction = $row2["Montant_total"];
} 
else
{
    $montant_global_distraction = 0; 
}

// Requête SQL pour compter le nombre de dossiers avec un PV de remise en vérifiant si reference_pv_remise est vide ou non
$sql4 = "SELECT COUNT(*) as nombre_dossiers_pv_remise FROM distraction WHERE Reference_PV_remise IS NOT NULL AND Reference_PV_remise <> ''";

// Exécuter la requête SQL
$result4 = mysqli_query($conn, $sql4);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result4) > 0) {
  // Récupérer le nombre de dossiers avec un PV de remise
  $row4 = mysqli_fetch_assoc($result4);
  $nombre_dossiers_pv_remise = $row4["nombre_dossiers_pv_remise"];
} 
else{
    $nombre_dossiers_pv_remise = 0; 
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql5 = "SELECT SUM(Superficie_ha) as superficie_totale FROM acquisition";

// Exécuter la requête SQL
$result5 = mysqli_query($conn, $sql5);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result5) > 0) {
  // Récupérer les données de la requête
  $row5 = mysqli_fetch_assoc($result5);
  $superficie_totale2 = $row5["superficie_totale"];
} 
else
{
    $superficie_totale2 = 0;
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql6 = "SELECT SUM(Montant_Total_en_Dh) as MT FROM acquisition";

// Exécuter la requête SQL
$result6 = mysqli_query($conn, $sql6);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result6) > 0) {
  // Récupérer les données de la requête
  $row6 = mysqli_fetch_assoc($result6);
  $MT = $row6["MT"];
} 
else
{
    $MT =0; 
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql7 = "SELECT count(Terrain_reboisé) as TR , count(Terrain_acquis) as TA FROM acquisition where Terrain_reboisé='Oui' and Terrain_acquis='Oui' ";

// Exécuter la requête SQL
$result7 = mysqli_query($conn, $sql7);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result7) > 0) {
  // Récupérer les données de la requête
  $row7 = mysqli_fetch_assoc($result7);
  $Terrain_acquis = $row7["TA"];
  $Terrain_reboisé =$row7["TR"];
  if($Terrain_acquis!=0)
  {
    $Cal = ($Terrain_reboisé / $Terrain_acquis) * 100;
  }
  else
{
    $Cal = 0;
}

} 
else
{
    $Cal = 0;
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql8 = "SELECT count(*) as NBr1 FROM acquisition where Terrain_acquis='Oui' ";

// Exécuter la requête SQL
$result8 = mysqli_query($conn, $sql8);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result8) > 0) {
  // Récupérer les données de la requête
  $row8 = mysqli_fetch_assoc($result8);
  $TA=$row8["NBr1"];
} 
else
{
    $TA = 0;
}

// Requête SQL pour obtenir la somme de la superficie dans la table "distraction"
$sql9 = "SELECT count(*) as NBr2 FROM acquisition where Terrain_acquis='Non' ";

// Exécuter la requête SQL
$result9 = mysqli_query($conn, $sql9);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result9) > 0) {
  // Récupérer les données de la requête
  $row9 = mysqli_fetch_assoc($result9);
  $TN=$row9["NBr2"];
} 
else
{
    $TN = 0;
}
?>


<!-- Afficher les données dans un tableau de bord -->
<section id="tableau" style="margin-left: 235px;">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left: 10px;">Tableau de bord</h1>
    <?php //echo $download_link; ?>
  </div>
  <div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Superficie totale distraire dans la région</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $superficie_totale; ?> m2</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-tree fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

   
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Montant Global de distraction dans la région</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $montant_global_distraction; ?> MAD</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4" id="dashboard-card">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col-8">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre total des dossiers de distraction dans la région</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_distraction; ?></div>
          </div>
          <div class="col-4 text-center">
            <i class="fas fa-database fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nombre des dossiers de distraction par province</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 

// Requête SQL pour obtenir le nombre des dossiers de distraction par province
$sql3 = "SELECT p.name, COUNT(*) as nombre_dossiers 
        FROM distraction d
        INNER JOIN provinces p ON d.Province = p.id_p
        GROUP BY p.name";

// Exécuter la requête SQL
$result3 = mysqli_query($conn, $sql3);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result3) > 0) {
  // Afficher le nombre des dossiers par province
  while ($row3 = mysqli_fetch_assoc($result3)) {
    $province = $row3["name"];
    $nombre_dossiers = $row3["nombre_dossiers"];
    echo "$province : $nombre_dossiers <br>";
  }
} 
else
{
    echo "0";
}

?>
</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-list-ul fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Répartition des dossiers par partenaires</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            // Requête SQL pour obtenir la répartition des dossiers par partenaires
            $sql = "SELECT Beneficiaire, COUNT(*) as nombre_dossiers 
                    FROM distraction
                    GROUP BY Beneficiaire";

            // Exécuter la requête SQL
            $result = mysqli_query($conn, $sql);

            // Vérifier si la requête a renvoyé des données
            if (mysqli_num_rows($result) > 0) {
              // Afficher la répartition des dossiers par partenaires
              while ($row = mysqli_fetch_assoc($result)) {
                $partenaire = $row["Beneficiaire"];
                $nombre_dossiers = $row["nombre_dossiers"];
                echo "$partenaire : $nombre_dossiers <br>";
              }
            } else {
              echo "Aucun dossier trouvé";
            }
            ?></div>
        </div>
        <div class="col-4 text-center">
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
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Répartition des dossiers par canton</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            // Requête SQL pour obtenir la répartition des dossiers par canton
            $sql = "SELECT Foret_canton_ilot, COUNT(*) as nombre_dossiers 
                    FROM distraction
                    GROUP BY Foret_canton_ilot";

            // Exécuter la requête SQL
            $result = mysqli_query($conn, $sql);

            // Vérifier si la requête a renvoyé des données
            if (mysqli_num_rows($result) > 0) {
              // Afficher la répartition des dossiers par canton
              while ($row = mysqli_fetch_assoc($result)) {
                $canton = $row["Foret_canton_ilot"];
                $nombre_dossiers = $row["nombre_dossiers"];
                echo "$canton : $nombre_dossiers <br>";
              }
            } else {
              echo "Aucun dossier trouvé";
            }
            ?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nombre de dossiers en cours</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            // Requête SQL pour compter les dossiers en cours
            $sql = "SELECT COUNT(*) as nombre_dossiers
                    FROM distraction
                    WHERE Reference_PV_remise = '' OR Reference_PV_remise IS NULL";

            // Exécuter la requête SQL
            $result = mysqli_query($conn, $sql);

            // Récupérer le nombre de dossiers en cours
            $row = mysqli_fetch_assoc($result);
            $nombre_dossiers_en_cours = $row["nombre_dossiers"];

            echo $nombre_dossiers_en_cours;
            ?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-clock fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nombre des dossiers ayant un Pv de remise</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nombre_dossiers_pv_remise; ?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-check-circle fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">La superficie totale des terrains privés acquis au profit du Domaine Forestier en hectares (Ha).</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $superficie_totale2; ?> ha</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-tree fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Le montant total dépensé pour acquérir des terrains privés au profit du Domaine Forestier en Dirhams (MAD).</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $MT; ?> MAD</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-check-circle fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">La superficie  des terrains privés acquis au profit du Domaine Forestier par province en hectares (Ha).</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php // Requête SQL pour obtenir le nombre des dossiers de distraction par province
$sql3 = "SELECT p.name, SUM(Superficie_ha) as superficie_totale
        FROM acquisition a
        INNER JOIN provinces p ON a.Province = p.id_p
        GROUP BY p.name";

// Exécuter la requête SQL
$result3 = mysqli_query($conn, $sql3);

// Vérifier si la requête a renvoyé des données
if (mysqli_num_rows($result3) > 0) {
  // Afficher le nombre des dossiers par province
  while ($row3 = mysqli_fetch_assoc($result3)) {
    $province = $row3["name"];
    $superficie_totale = $row3["superficie_totale"];
    echo "$province : $superficie_totale <br>";
  }
}
else
{
    echo "0";
} 

?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Le pourcentage des terrains reboisés des terrains privés acquis</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Cal; ?>%</div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre des terrain privés acquis auprofit du Domaine Forestier</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $TA; ?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-tree fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

   
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col-8">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre des terrain privés non acquis auprofit du Domaine Forestier</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $TN; ?></div>
        </div>
        <div class="col-4 text-center">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-md-6 mb-4" id="dashboard-card2">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col-8">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre total des dossiers de acquisition dans la région</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_acquisition; ?></div>
          </div>
          <div class="col-4 text-center">
            <i class="fas fa-database fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
  </div>
</section>
                    

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