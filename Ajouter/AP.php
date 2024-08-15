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
                <a class="nav-link" href="ajouter_formulaire.php#acquisition">
                <i class="fas fa-shopping-cart"></i>
                    <span style="font-size: 1rem;">Acquisition</span></a>
            </li>

    
            <hr class="sidebar-divider">

<!-- Nav Item - Dashboard -->
<li class="nav-item"  href="#tableau">
    <a class="nav-link" href="ajouter_formulaire.php#tableau">
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


    //$R = $_POST["R"];
    
    // Requête principale pour récupérer les données de la table "distraction" en fonction de l'ID trouvé dans d'autres tables
   

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
                  WHERE p.name LIKE ? OR c.name LIKE ? OR dp.name LIKE ? OR zf.zone_name LIKE ? OR df.distinct_forestiers_name LIKE ? OR d.Foret_canton_ilot LIKE ? OR d.Stade_fonciere LIKE ? OR d.Reference LIKE ? OR d.Superficie_parcelle_m2 = ? OR d.Beneficiaire LIKE ? OR d.Projet_realise LIKE ? OR d.Prix_en_Ha = ? OR d.Montant_total = ? OR d.Reference_decrit LIKE ? OR d.Reference_PV_remise LIKE ?";
        
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
                <form method="post" action="script.php">
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
    $sql = "SELECT id_p, name FROM provinces";
    $resultat = $conn->query($sql);
    
    // Vérifiez s'il y a des résultats
    if ($resultat->num_rows > 0) {
        echo '<div class="row cf-ro">';
        echo '<div class="col-sm-3"><label>Province :</label></div>';
        echo '<div class="col-sm-8">';
        echo '<select class="form-control" id="selectList" name="province" required>';
    
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
    
    
    
    echo '<div id="resultats"></div>';
    
    // Fermer la connexion MySQL
    $conn->close();
    ?>
    <script>
        // Ajoutez un événement de changement à la liste déroulante des provinces
        var selectedValue = document.getElementById("selectList").value;
    
    // Effectuez une requête AJAX pour obtenir les communes sélectionnées
    fetch('f.php?province=' + selectedValue)
        .then(response => response.text())
        .then(data => {
            // Mettez à jour les résultats dans la div "resultats"
            document.getElementById("resultats").innerHTML = data;
        });
        document.getElementById("selectList").addEventListener("change", function() {
            // Récupérez la valeur sélectionnée
            var selectedValue = this.value;
    
            // Effectuez une requête AJAX pour obtenir les résultats
            fetch('f.php?province=' + selectedValue)
                .then(response => response.text())
                .then(data => {
                    // Mettez à jour les résultats dans la div "resultats"
                    document.getElementById("resultats").innerHTML = data;
                });
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
        <div class="col-sm-3"><label>Zone forestière :</label></div>
        <div class="col-sm-8">
            <select class="form-control" id="selectListZone" name="zone" required>
                <!-- Générer les options dynamiquement ici -->
            </select>
        </div>
    </div>
    <br>
    <!-- Liste déroulante pour les districts forestiers -->
    <div class="row cf-ro">
        <div class="col-sm-3"><label>District Forestier :</label></div>
        <div class="col-sm-8">
            <select class="form-control" id="selectListDistrict" name="district" required>
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
                    <legend>Lieu :</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label>Forêt/Canton/Ilôt :</label>
                            <div class="col-sm-8">
                            <?php
                              $name = $row["Foret_canton_ilot"];
                              echo '<input type="text" name="name" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name . '">';
                              ?>
                    </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                        <label>Stade Fonciére :</label>
                        <div class="col-sm-8">
                        <?php
                              $name2 = $row["Stade_fonciere"];
                              echo '<input type="text" name="stade" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name2 . '">';
                              ?>
                    </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                        <label>Réferénce :</label>
                        <div class="col-sm-8">
                        <?php
                              $name3 = $row["Reference"];
                              echo '<input type="text" name="ref" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name3 . '">';
                              ?>
                    </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                        <div  class="col-sm-3"><label>Superficie de la parcelle en m2 :</label></div>
                        <div class="col-sm-8">
                        <?php
                              $name4 = $row["Superficie_parcelle_m2"];
                              echo '<input type="number" name="sup" min="0"  step="1" required value="' . $name4 . '">';
                              ?>
                    </div>
                    </div>
                </fieldset>
                    <br>
                    <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Bénéficiare :</label></div>
                        <div class="col-sm-8">
                        <?php
                              $name5 = $row["Beneficiaire"];
                              echo '<input type="text" name="benef" class="form-control input-sm" required value="' . $name5. '">';
                              ?>
                    </div>
                    </div>
                    <br>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Projet réalisé:</label></div>
                        <div class="col-sm-8">
                        <?php
                              $name6 = $row["Projet_realise"];
                              echo '<input type="text" name="projet" class="form-control input-sm" required value="' . $name6. '">';
                              ?>
                    </div>
                    </div>
                    <br>
                    <fieldset id="groupedLabels">
                        <legend>Chronologie:</legend>
                        <br>
                        <div class="row cf-ro"> 
                                <label>Date de Demande :</label>
                                <div class="col-sm-8">
                                <?php
                              $name7 = $row["date_demande"];
                              echo '<input type="date" name="Date" required value="' . $name7. '">';
                              ?>
                            </div>
                        </div>
                        <br>
                                <div class="row cf-ro"> 
                                 <label>Date Provinciale :</label>
                                 <div class="col-sm-8"><div class="col-sm-8">
                                 <?php
                              $name8 = $row["date_provinciale"];
                              echo '<input type="date" name="prov" required value="' . $name8. '">';
                              ?>
                                </div></div>
                                </div>
                            <br>
                                <div class="row cf-ro"> 
                                    <label>Date Régionale :</label>
                                    <div class="col-sm-8"><div class="col-sm-8">
                                    <?php
                              $name9 = $row["date_regionale"];
                              echo '<input type="date" name="reg" style="margin-left: 7px;" required value="' . $name9. '">';
                              ?>
                                </div></div>
                                </div>
                                <br>
                                <div class="row cf-ro"> 
                                    <label>Accord de principe :</label>
                                    <div class="col-sm-8"><div class="col-sm-8">
                                    <?php
                              $name10 = $row["date_accord_principe"];
                              echo '<input type="date" name="Acc" style="margin-left: -20px;" required value="' . $name10. '">';
                              ?>
                                </div></div>
                                </div>
                                <br>
                                <div class="row cf-ro"> 
                                    <label style="margin-left: -28px;">Commission Amninistrative :</label>
                                    <div class="col-sm-8"><div class="col-sm-8">
                                    <?php
                              $name11 = $row["date_commission_administrative"];
                              echo '<input type="date" name="Comm" required value="' . $name11. '">';
                              ?>
                                </div></div>
                                </div>
                                <br>
                                <div class="row cf-ro"> 
                                    <label>Commission Expertise :</label>
                                    <div class="col-sm-8"><div class="col-sm-8">
                                    <?php
                              $name12 = $row["date_commission_expertise"];
                              echo '<input  type="date" name="Exp" required value="' . $name12. '">';
                              ?>
                                </div></div>
                                </div>
                                <br>
                                <div class="row cf-ro"> 
                                    <label>Envoi du dossier :</label>
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
                        <legend>Prix d'expertise en Dhs:</legend>
                        <br>
                        <div class="row cf-ro"> 
                                <label>Prix en Ha :</label>
                                <div class="col-sm-8">
                                <?php
                              $name14 = $row["Prix_en_Ha"];
                              echo '<input  type="number" name="prix" min="0"  step="1" required value="' . $name14. '">';
                              ?>
                            </div>
                        </div>
                        <br>
                                <div class="row cf-ro"> 
                                 <label>Montant total :</label>
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
                        <label>Référence Décrit :</label>
                        <div class="col-sm-8">
                        <?php
                              $name16 = $row["Reference_decrit"];
                              echo '<input  type="text" name="refD" class="form-control input-sm" required value="' . $name16. '">';
                              ?>
                    </div>
                    </div>
                    <br>
                    <div  class="row cf-ro">
                        <label>Référence PV de remise :</label>
                        <div class="col-sm-8">
                        <?php
                              $name17 = $row["Reference_PV_remise"];
                              echo '<input  type="text" name="refP" class="form-control input-sm" required value="' . $name17. '">';
                              ?>
                    </div>
                    </div>
        
                    <fieldset id="groupedLabels">
                        <legend>Coordonnées:</legend>
                        <br>
                        <div class="row cf-ro"> 
                                <label>X :</label>
                                <div class="col-sm-8"><?php
                              $x = $row["x"];
                              echo '<input  type="text" name="x" class="form-control input-sm" required value="' . $x. '">';
                              ?></div>
                        </div>
                        <br>
                                <div class="row cf-ro"> 
                                 <label>Y :</label>
                                 <div class="col-sm-8"><?php
                              $y = $row["y"];
                              echo '<input  type="text" name="y" class="form-control input-sm" required value="' . $y. '">';
                              ?></div>
                                </div>
                    </fieldset>
                    <br>
                    <iframe src="https://maps.google.com/maps?&q=<?php echo $x.','.$y?>&output=embed" width="100%" height="500"></iframe>
                       <div class="row cf-ro"> 
                            <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
      margin-top: 30px;">Observation :</label>
                            <div class="col-sm-8">
    
                            </div>
                            <?php
                              $name19 = $row["Observation"];
                              echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr" required>' . $name19. '</textarea>';
                              ?>
                            
    
                        </div>
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
    $sql2 = "SELECT * FROM fichiers_importes";
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
    margin-top: -6170px;">Supprimer</button>
        <button name="updateForm" id="UF" class='btn btn-sm btn-warning' style="margin-left: 28px;
    margin-top: -6170px;">Modifier</button>
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
                deleteButton.style.marginTop = "-6898px"; 
                updateButton.style.marginLeft = "28px";
                updateButton.style.marginTop = "-6898px"; 
            } 
        });
        nonRadioButton.addEventListener("click", function () {
            if (nonRadioButton.checked) {
                // Si "Oui" est sélectionné, affichez le contenu
               
                deleteButton.style.marginLeft = "-43px";
                deleteButton.style.marginTop = "-6170px"; 
                updateButton.style.marginLeft = "28px";
                updateButton.style.marginTop = "-6170px"; 
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
                  window.location.href = 'ajouter2.php';
                  </script>";
        }
    }
    else
    {
        $query = "SELECT d.*
        FROM distraction AS d
        LEFT JOIN provinces AS p ON d.Province = p.id_p
        LEFT JOIN communes AS c ON d.Commune = c.id
        LEFT JOIN dpanef AS dp ON d.DPANEF = dp.id
        LEFT JOIN zones_forestieres AS zf ON d.Zone_forestiere = zf.id
        LEFT JOIN distinct_forestiers AS df ON d.District_forestier = df.id";



$stmt = $conn->prepare($query);
// $stmt->bind_param("ssssssssissiissss", $likeR, $likeR, $likeR, $likeR, $likeR, $likeR, $likeR, $likeR,$R, $likeR, $likeR,$R,$R, $likeR, $likeR,$R,$R);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Affichez les résultats
  while ($row = $result->fetch_assoc()) {
      // Traitement des résultats
      // Vous pouvez accéder aux données de la table "distraction" via $row
      ?>
      <form method="post" action="script.php">
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
$sql = "SELECT id_p, name FROM provinces";
$resultat = $conn->query($sql);

// Vérifiez s'il y a des résultats
if ($resultat->num_rows > 0) {
echo '<div class="row cf-ro">';
echo '<div class="col-sm-3"><label>Province :</label></div>';
echo '<div class="col-sm-8">';
echo '<select class="form-control" id="selectList" name="province" required>';

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



echo '<div id="resultats"></div>';

// Fermer la connexion MySQL
$conn->close();
?>
<script>
// Ajoutez un événement de changement à la liste déroulante des provinces
var selectedValue = document.getElementById("selectList").value;

// Effectuez une requête AJAX pour obtenir les communes sélectionnées
fetch('f.php?province=' + selectedValue)
.then(response => response.text())
.then(data => {
  // Mettez à jour les résultats dans la div "resultats"
  document.getElementById("resultats").innerHTML = data;
});
document.getElementById("selectList").addEventListener("change", function() {
  // Récupérez la valeur sélectionnée
  var selectedValue = this.value;

  // Effectuez une requête AJAX pour obtenir les résultats
  fetch('f.php?province=' + selectedValue)
      .then(response => response.text())
      .then(data => {
          // Mettez à jour les résultats dans la div "resultats"
          document.getElementById("resultats").innerHTML = data;
      });
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
<div class="col-sm-3"><label>Zone forestière :</label></div>
<div class="col-sm-8">
  <select class="form-control" id="selectListZone" name="zone" required>
      <!-- Générer les options dynamiquement ici -->
  </select>
</div>
</div>
<br>
<!-- Liste déroulante pour les districts forestiers -->
<div class="row cf-ro">
<div class="col-sm-3"><label>District Forestier :</label></div>
<div class="col-sm-8">
  <select class="form-control" id="selectListDistrict" name="district" required>
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
          <legend>Lieu :</legend>
          <br>
          <div class="row cf-ro"> 
                  <label>Forêt/Canton/Ilôt :</label>
                  <div class="col-sm-8">
                  <?php
                    $name = $row["Foret_canton_ilot"];
                    echo '<input type="text" name="name" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name . '">';
                    ?>
          </div>
          </div>
          <br>
          <div class="row cf-ro"> 
              <label>Stade Fonciére :</label>
              <div class="col-sm-8">
              <?php
                    $name2 = $row["Stade_fonciere"];
                    echo '<input type="text" name="stade" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name2 . '">';
                    ?>
          </div>
          </div>
          <br>
          <div class="row cf-ro"> 
              <label>Réferénce :</label>
              <div class="col-sm-8">
              <?php
                    $name3 = $row["Reference"];
                    echo '<input type="text" name="ref" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name3 . '">';
                    ?>
          </div>
          </div>
          <br>
          <div class="row cf-ro"> 
              <div  class="col-sm-3"><label>Superficie de la parcelle en m2 :</label></div>
              <div class="col-sm-8">
              <?php
                    $name4 = $row["Superficie_parcelle_m2"];
                    echo '<input type="number" name="sup" min="0"  step="1" required value="' . $name4 . '">';
                    ?>
          </div>
          </div>
      </fieldset>
          <br>
          <div  class="row cf-ro">
              <div  class="col-sm-3"><label>Bénéficiare :</label></div>
              <div class="col-sm-8">
              <?php
                    $name5 = $row["Beneficiaire"];
                    echo '<input type="text" name="benef" class="form-control input-sm" required value="' . $name5. '">';
                    ?>
          </div>
          </div>
          <br>
           <div  class="row cf-ro">
              <div  class="col-sm-3"><label>Projet réalisé:</label></div>
              <div class="col-sm-8">
              <?php
                    $name6 = $row["Projet_realise"];
                    echo '<input type="text" name="projet" class="form-control input-sm" required value="' . $name6. '">';
                    ?>
          </div>
          </div>
          <br>
          <fieldset id="groupedLabels">
              <legend>Chronologie:</legend>
              <br>
              <div class="row cf-ro"> 
                      <label>Date de Demande :</label>
                      <div class="col-sm-8">
                      <?php
                    $name7 = $row["date_demande"];
                    echo '<input type="date" name="Date" required value="' . $name7. '">';
                    ?>
                  </div>
              </div>
              <br>
                      <div class="row cf-ro"> 
                       <label>Date Provinciale :</label>
                       <div class="col-sm-8"><div class="col-sm-8">
                       <?php
                    $name8 = $row["date_provinciale"];
                    echo '<input type="date" name="prov" required value="' . $name8. '">';
                    ?>
                      </div></div>
                      </div>
                  <br>
                      <div class="row cf-ro"> 
                          <label>Date Régionale :</label>
                          <div class="col-sm-8"><div class="col-sm-8">
                          <?php
                    $name9 = $row["date_regionale"];
                    echo '<input type="date" name="reg" style="margin-left: 7px;" required value="' . $name9. '">';
                    ?>
                      </div></div>
                      </div>
                      <br>
                      <div class="row cf-ro"> 
                          <label>Accord de principe :</label>
                          <div class="col-sm-8"><div class="col-sm-8">
                          <?php
                    $name10 = $row["date_accord_principe"];
                    echo '<input type="date" name="Acc" style="margin-left: -20px;" required value="' . $name10. '">';
                    ?>
                      </div></div>
                      </div>
                      <br>
                      <div class="row cf-ro"> 
                          <label style="margin-left: -28px;">Commission Amninistrative :</label>
                          <div class="col-sm-8"><div class="col-sm-8">
                          <?php
                    $name11 = $row["date_commission_administrative"];
                    echo '<input type="date" name="Comm" required value="' . $name11. '">';
                    ?>
                      </div></div>
                      </div>
                      <br>
                      <div class="row cf-ro"> 
                          <label>Commission Expertise :</label>
                          <div class="col-sm-8"><div class="col-sm-8">
                          <?php
                    $name12 = $row["date_commission_expertise"];
                    echo '<input  type="date" name="Exp" required value="' . $name12. '">';
                    ?>
                      </div></div>
                      </div>
                      <br>
                      <div class="row cf-ro"> 
                          <label>Envoi du dossier :</label>
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
              <legend>Prix d'expertise en Dhs:</legend>
              <br>
              <div class="row cf-ro"> 
                      <label>Prix en Ha :</label>
                      <div class="col-sm-8">
                      <?php
                    $name14 = $row["Prix_en_Ha"];
                    echo '<input  type="number" name="prix" min="0"  step="1" required value="' . $name14. '">';
                    ?>
                  </div>
              </div>
              <br>
                      <div class="row cf-ro"> 
                       <label>Montant total :</label>
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
              <label>Référence Décrit :</label>
              <div class="col-sm-8">
              <?php
                    $name16 = $row["Reference_decrit"];
                    echo '<input  type="text" name="refD" class="form-control input-sm" required value="' . $name16. '">';
                    ?>
          </div>
          </div>
          <br>
          <div  class="row cf-ro">
              <label>Référence PV de remise :</label>
              <div class="col-sm-8">
              <?php
                    $name17 = $row["Reference_PV_remise"];
                    echo '<input  type="text" name="refP" class="form-control input-sm" required value="' . $name17. '">';
                    ?>
          </div>
          </div>

          <fieldset id="groupedLabels">
              <legend>Coordonnées:</legend>
              <br>
              <div class="row cf-ro"> 
                      <label>X :</label>
                      <div class="col-sm-8"><?php
                    $x = $row["x"];
                    echo '<input  type="text" name="x" class="form-control input-sm" required value="' . $x. '">';
                    ?></div>
              </div>
              <br>
                      <div class="row cf-ro"> 
                       <label>Y :</label>
                       <div class="col-sm-8"><?php
                    $y = $row["y"];
                    echo '<input  type="text" name="y" class="form-control input-sm" required value="' . $y. '">';
                    ?></div>
                      </div>
          </fieldset>
          <br>
          <iframe src="https://maps.google.com/maps?&q=<?php echo $x.','.$y?>&output=embed" width="100%" height="500"></iframe>
             <div class="row cf-ro"> 
                  <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
margin-top: 30px;">Observation :</label>
                  <div class="col-sm-8">

                  </div>
                  <?php
                    $name19 = $row["Observation"];
                    echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr" required>' . $name19. '</textarea>';
                    ?>
                  

              </div>
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
$sql2 = "SELECT * FROM fichiers_importes";
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

//$conn->close();
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
margin-top: -6170px;">Supprimer</button>
<button name="updateForm" id="UF" class='btn btn-sm btn-warning' style="margin-left: 28px;
margin-top: -6170px;">Modifier</button>
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
      deleteButton.style.marginTop = "-6898px"; 
      updateButton.style.marginLeft = "28px";
      updateButton.style.marginTop = "-6898px"; 
  } 
});
nonRadioButton.addEventListener("click", function () {
  if (nonRadioButton.checked) {
      // Si "Oui" est sélectionné, affichez le contenu
     
      deleteButton.style.marginLeft = "-43px";
      deleteButton.style.marginTop = "-6170px"; 
      updateButton.style.marginLeft = "28px";
      updateButton.style.marginTop = "-6170px"; 
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
} 
        
    
        
      
        
       
    }

?>
            
  

 
<br>
      </div>
    </div>
  </div>
  <br>



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
  