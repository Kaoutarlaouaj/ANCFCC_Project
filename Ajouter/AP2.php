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
                <a class="nav-link" href="ajouter_formulaire.php#distraction">
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
          <input type="text" class="form-control" placeholder="Recherche" aria-label="Recherche" aria-describedby="search-button" id="R2" name="R2" style="margin-top: 14px;">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary"  id="search-button2" type="submit" name="search-button" style="margin-top: 14px;">Rechercher</button>
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
            <form method="post" action="script2.php">
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
            <br>
            <h2 style="text-align: center;">Formulaire d'acquisition</h2>
            <br>
            <fieldset id="groupedLabels">
                <legend>Demandeur :</legend>
                <br>
             <fieldset id="groupedLabels">
                <legend>Personne Morale :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label>Nom _Société :</label>
                        <div class="col-sm-8">
                        <?php
                          $name = $row["Nom_SociétéEntreprise"];
                          echo '<input type="text" name="NomS" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>Nom&prénom_Gérant :</label>
                    <div class="col-sm-8">
                    <?php
                          $name2 = $row["NomPrénom_Gérant"];
                          echo '<input type="text" name="NomP" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name2 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>CIN_Gérant :</label>
                    <div class="col-sm-8">
                    <?php
                          $name3 = $row["CIN_Gérant"];
                          echo '<input type="text" name="CIN1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name3 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label>Adresse :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name4 = $row["Adresse1"];
                          echo '<input type="text" name="adresse1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name4 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                <script src="js.js"></script>
                    <div  class="col-sm-3"><label>Tél :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name5 = $row["Tél1"];
                          echo '<input type="text" name="tel1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name5 . '" onkeyup="validerNumeroTelephone(this);">';
                          echo ' <br> <div id="validationMessage"></div>';
                          ?>
                </div>
                </div>
            </fieldset>
                
                <br>
                <fieldset id="groupedLabels">
                <legend>Personne Physique :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label>Nom&Prénom :</label>
                        <div class="col-sm-8">
                        <?php
                          $name6 = $row["NomPrénom"];
                          echo '<input type="text" name="NomP2" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name6 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>CIN :</label>
                    <div class="col-sm-8">
                    <?php
                          $name7 = $row["CIN"];
                          echo '<input type="text" name="CIN2" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name7 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>Adresse :</label>
                    <div class="col-sm-8">
                    <?php
                          $name8 = $row["Adresse2"];
                          echo '<input type="text" name="adresse2" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name8 . '">';
                          ?>
                </div>
                </div>
                <br>
            
                <div class="row cf-ro"> 
                <script src="js2.js"></script>
                    <div  class="col-sm-3"><label>Tél :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name9 = $row["Tél2"];
                          echo '<input type="text" name="tel2" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name9 . '" onkeyup="validerNumeroTelephone2(this);">';
                          echo ' <br> <div id="validationMessage2"></div>';
                          ?>
                </div>
                </div>
            </fieldset>
            </fieldset>
            <fieldset id="groupedLabels">
                <legend>Situation du terrain :</legend>
                <br>
                <div class="row cf-ro"> 
                        <label>N° TF/Réq :</label>
                        <div class="col-sm-8">
                        <?php
                          $name10 = $row["N_TF_Req"];
                          echo '<input type="text" name="NTF" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name10 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>Nom_Terrain :</label>
                    <div class="col-sm-8">
                    <?php
                          $name11 = $row["Nom_Terrain"];
                          echo '<input type="text" name="NT" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name11 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <label>N°_des_parcelles :</label>
                    <div class="col-sm-8">
                    <?php
                          $name12 = $row["N_parcelles"];
                          echo '<input type="text" name="NP" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name12 . '">';
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
<br>
<div class="row cf-ro"> 
                    <div  class="col-sm-3"><label>Superficie de la parcelle en ha :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name13 = $row["Superficie_ha"];
                          echo '<input type="number" name="supha" id="supha" min="0"  step="1" required value="' . $name13. '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                    <div  class="col-sm-3"><label>Occupation :</label></div>
                    <div class="col-sm-8">
                    <?php
                          $name14 = $row["Occupation"];
                          echo '<input type="text" name="occ" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name14 . '">';
                          ?>
                </div>
                </div>
                <br>
                <div class="row cf-ro"> 
                        <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
  margin-top: 30px;">Droits et charges foncières :</label>
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
                    <legend>Chronologie:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label>Date de Demande :</label>
                            <div class="col-sm-8">
                            <?php
                          $name16 = $row["date_Demande"];
                          echo '<input type="date" name="DateD" required value="' . $name16. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label>Date Reconnaissance Provinciale :</label>
                             <div class="col-sm-8"><div class="col-sm-8">
                             <?php
                          $name17 = $row["date_Reconnaissance_Provinciale"];
                          echo '<input type="date" name="DateR" required value="' . $name17. '">';
                          ?>
                            </div></div>
                            </div>
                        <br>
                            <div class="row cf-ro"> 
                                <label>Date Reconnaissance Régionale :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name18 = $row["date_Reconnaissance_Régionale"];
                          echo '<input type="date" name="DateRR" style="margin-left: 7px;" required value="' . $name18. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Date Reconnaissance Natioanle :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name19 = $row["date_Reconnaissance_Nationale"];
                          echo '<input type="date" name="DateRN" style="margin-left: 7px;" required value="' . $name19. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Accord de principe :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name20 = $row["date_Accord_de_principe"];
                          echo '<input type="date" name="DateAP" style="margin-left: -20px;" required value="' . $name20. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label style="margin-left: -28px;">Date d'Expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name21 = $row["date_Expertise"];
                          echo '<input type="date" name="DateExp" required value="' . $name21. '">';
                          ?>
                            </div></div>
                            </div>
                            <br>
                            <div class="row cf-ro"> 
                                <label>Révision d'expertise :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name22 = $row["date_Révision_d_expertise"];
                          echo '<input  type="date" name="DateRExp" required value="' . $name22. '">';
                          ?>
                            </div></div>
                            </div>
                           
                </fieldset>
                <br>
                    <div class="row cf-ro"> 
                            <label>Valeur vénale en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <?php
                          $name23 = $row["Valeur_vénale_en_Dh_Hectare"];
                          echo '<input  type="number" name="VDH" id="VDH" min="0"  step="1" required value="' . $name23. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                    <div class="row cf-ro"> 
                            <label>Valeur vénale révisée en Dh/Hectare :</label>
                            <div class="col-sm-8">
                            <?php
                          $name24 = $row["Valeur_vénale_révisée_en_Dh_Hectare"];
                          echo '<input  type="number" name="VDHR" id="VDHR" min="0"  step="1" required value="' . $name24. '">';
                          ?>
                        </div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label>Montant Total en Dh :</label>
                             <div class="col-sm-8">
                             <?php
                          $name25 = $row["Montant_Total_en_Dh"];
                          echo '<input  type="number" name="montantTD" id="montantTotal" min="0"  step="1" required value="' . $name25. '">';
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
                          $name26 = $row["Observation"];
                          echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr2" required>' . $name26. '</textarea>';
                          ?>
                        

                    </div>
                    <br>
                    <br>
                    <?php
                         $terrainAcquis = $row["Terrain_acquis"];
                          ?>
                    <fieldset id="groupedLabels">
    <legend>Terrain acquis (Oui/Non/en cours):</legend>
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
                                <label>Date d'acquistion :</label>
                                <div class="col-sm-8"><div class="col-sm-8">
                                <?php
                          $name27 = $row["Date_d_acquisition"];
                          echo '<input  type="date" name="DateDA"  value="' . $name27. '">';
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
    <legend>Terrain reboisé (Oui/Non):</legend>
    <label for="oui2">Oui</label>
    <input type="radio" id="oui2" name="TR" value="Oui" <?php echo ($terrainReboisé === 'Oui') ? 'checked' : ''; ?>>
    <br>
    <label for="non2">Non</label>
    <input type="radio" id="non2" name="TR" value="Non" <?php echo ($terrainReboisé === 'Non') ? 'checked' : ''; ?>>
</fieldset>
<br>
                <div id="documentsDiv3" style="display: none;">
                
                <div class="row cf-ro"> 
                             <label>Année et marché :</label>
                             <div class="col-sm-8"><?php
                          $AM = $row["Année_et_marché"];
                          echo '<input  type="text" name="AM" class="form-control input-sm"  value="' . $AM. '">';
                          ?></div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label>Technique :</label>
                             <div class="col-sm-8"><?php
                          $TCH = $row["Technique"];
                          echo '<input  type="text" name="TCH" class="form-control input-sm" value="' . $TCH. '">';
                          ?></div>
                            </div>
                            <br>
                            
                            <div class="row cf-ro"> 
                             <label>Espéce utilisée :</label>
                             <div class="col-sm-8"><?php
                          $EU = $row["Espèce_utilisée"];
                          echo '<input  type="text" name="EU" class="form-control input-sm"  value="' . $EU. '">';
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

<script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton2 = document.getElementById("oui2");
    var nonRadioButton2 = document.getElementById("non2");
    var deleteButton1 = document.getElementById("DF1");
    var updateButton1 = document.getElementById("UF1");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv2 = document.getElementById("documentsDiv3");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton2.addEventListener("click", function () {
        if (ouiRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
       
            deleteButton1.style.marginLeft = "-43px";
            deleteButton1.style.marginTop = "-6402px"; 
            updateButton1.style.marginLeft = "28px";
            updateButton1.style.marginTop = "-6402px"; 
        } 
    });
    nonRadioButton2.addEventListener("click", function () {
        if (nonRadioButton2.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
           
            deleteButton1.style.marginLeft = "-43px";
            deleteButton1.style.marginTop = "-5671px"; 
            updateButton1.style.marginLeft = "28px";
            updateButton1.style.marginTop = "-5671px"; 
        } 
    });
</script>
<script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv1.style.display = "block";
        } 
    });
    nonRadioButton1.addEventListener("click", function () {
        if (nonRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv1.style.display = "none";
        } 
    });
    encoursButton.addEventListener("click", function () {
        if (encoursButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
            documentsDiv1.style.display = "none";
        } 
    });
</script>
                
<script>
    // Sélectionnez le bouton radio "Oui" par son ID
    var ouiRadioButton1 = document.getElementById("oui1");
    var nonRadioButton1 = document.getElementById("non1");
    var encoursButton = document.getElementById("encours");
    var deleteButton1 = document.getElementById("DF1");
    var updateButton1 = document.getElementById("UF1");
    // Sélectionnez la div contenant le contenu à afficher
    var documentsDiv1 = document.getElementById("documentsDiv2");

    // Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
    ouiRadioButton1.addEventListener("click", function () {
        if (ouiRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
       
            deleteButton1.style.marginLeft = "-43px";
            deleteButton1.style.marginTop = "-6402px"; 
            updateButton1.style.marginLeft = "28px";
            updateButton1.style.marginTop = "-6402px"; 
        } 
    });
    nonRadioButton1.addEventListener("click", function () {
        if (nonRadioButton1.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
           
            deleteButton1.style.marginLeft = "-43px";
            deleteButton1.style.marginTop = "-5671px"; 
            updateButton1.style.marginLeft = "28px";
            updateButton1.style.marginTop = "-5671px"; 
        } 
    });
    encoursButton.addEventListener("click", function () {
        if (encoursButton.checked) {
            // Si "Oui" est sélectionné, affichez le contenu
           
            deleteButton1.style.marginLeft = "-43px";
            deleteButton1.style.marginTop = "-5671px"; 
            updateButton1.style.marginLeft = "28px";
            updateButton1.style.marginTop = "-5671px"; 
        } 
    });
</script>
                <br>
                <br>
                    <div class="col-sm-8">
                    <input type="hidden" name="formId2" value="<?php echo $row["id"]; ?>">
                    
    <button  name="deleteForm2" id="DF1" class='btn btn-sm btn-danger' style="margin-left: -43px;
margin-top: -5671px;">Supprimer</button>
    <button name="updateForm2" id="UF1" class='btn btn-sm btn-warning' style="margin-left: 28px;
margin-top: -5671px;">Modifier</button>
                        </div>
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
          // Requête principale pour récupérer les données de la table "distraction" en fonction de l'ID trouvé dans d'autres tables
    $query = "SELECT a.*
    FROM acquisition AS a
    LEFT JOIN provinces AS p ON a.Province = p.id_p
    LEFT JOIN communes AS c ON a.CT = c.id
    LEFT JOIN dpanef AS dp ON a.DPANEF = dp.id
    LEFT JOIN zones_forestieres AS zf ON a.ZFDT = zf.id
    LEFT JOIN distinct_forestiers AS df ON a.DFP = df.id";

//$likeR = '%' . $R . '%';

$stmt = $conn->prepare($query);
//$stmt->bind_param("ssssssssssssssssiiiiiiisss", $likeR, $likeR, $likeR, $likeR, $likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$likeR,$R,$R,$R,$R,$R,$R,$R,$likeR, $likeR, $likeR);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
// Affichez les résultats
while ($row = $result->fetch_assoc()) {
  // Traitement des résultats
  // Vous pouvez accéder aux données de la table "distraction" via $row
  ?>
  <form method="post" action="script2.php">
<div class="row justify-content-center">
<div  class="col-sm-6 cop-ck">
  <br>
  <h2 style="text-align: center;">Formulaire d'acquisition</h2>
  <br>
  <fieldset id="groupedLabels">
      <legend>Demandeur :</legend>
      <br>
   <fieldset id="groupedLabels">
      <legend>Personne Morale :</legend>
      <br>
      <div class="row cf-ro"> 
              <label>Nom _Société :</label>
              <div class="col-sm-8">
              <?php
                $name = $row["Nom_SociétéEntreprise"];
                echo '<input type="text" name="NomS" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>Nom&prénom_Gérant :</label>
          <div class="col-sm-8">
          <?php
                $name2 = $row["NomPrénom_Gérant"];
                echo '<input type="text" name="NomP" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name2 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>CIN_Gérant :</label>
          <div class="col-sm-8">
          <?php
                $name3 = $row["CIN_Gérant"];
                echo '<input type="text" name="CIN1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name3 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <div  class="col-sm-3"><label>Adresse :</label></div>
          <div class="col-sm-8">
          <?php
                $name4 = $row["Adresse1"];
                echo '<input type="text" name="adresse1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name4 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
      <script src="js.js"></script>
          <div  class="col-sm-3"><label>Tél :</label></div>
          <div class="col-sm-8">
          <?php
                $name5 = $row["Tél1"];
                echo '<input type="text" name="tel1" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name5 . '" onkeyup="validerNumeroTelephone(this);">';
                echo ' <br> <div id="validationMessage"></div>';
                ?>
      </div>
      </div>
  </fieldset>
      
      <br>
      <fieldset id="groupedLabels">
      <legend>Personne Physique :</legend>
      <br>
      <div class="row cf-ro"> 
              <label>Nom&Prénom :</label>
              <div class="col-sm-8">
              <?php
                $name6 = $row["NomPrénom"];
                echo '<input type="text" name="NomP2" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name6 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>CIN :</label>
          <div class="col-sm-8">
          <?php
                $name7 = $row["CIN"];
                echo '<input type="text" name="CIN2" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name7 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>Adresse :</label>
          <div class="col-sm-8">
          <?php
                $name8 = $row["Adresse2"];
                echo '<input type="text" name="adresse2" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name8 . '">';
                ?>
      </div>
      </div>
      <br>
  
      <div class="row cf-ro"> 
      <script src="js2.js"></script>
          <div  class="col-sm-3"><label>Tél :</label></div>
          <div class="col-sm-8">
          <?php
                $name9 = $row["Tél2"];
                echo '<input type="text" name="tel2" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name9 . '" onkeyup="validerNumeroTelephone2(this);">';
                echo ' <br> <div id="validationMessage2"></div>';
                ?>
      </div>
      </div>
  </fieldset>
  </fieldset>
  <fieldset id="groupedLabels">
      <legend>Situation du terrain :</legend>
      <br>
      <div class="row cf-ro"> 
              <label>N° TF/Réq :</label>
              <div class="col-sm-8">
              <?php
                $name10 = $row["N_TF_Req"];
                echo '<input type="text" name="NTF" class="form-control input-sm" style="margin-left: 5px;" required value="' . $name10 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>Nom_Terrain :</label>
          <div class="col-sm-8">
          <?php
                $name11 = $row["Nom_Terrain"];
                echo '<input type="text" name="NT" class="form-control input-sm" style="margin-left: 22px;" required value="' . $name11 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <label>N°_des_parcelles :</label>
          <div class="col-sm-8">
          <?php
                $name12 = $row["N_parcelles"];
                echo '<input type="text" name="NP" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name12 . '">';
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
<br>
<div class="row cf-ro"> 
          <div  class="col-sm-3"><label>Superficie de la parcelle en ha :</label></div>
          <div class="col-sm-8">
          <?php
                $name13 = $row["Superficie_ha"];
                echo '<input type="number" name="supha" id="supha" min="0"  step="1" required value="' . $name13. '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
          <div  class="col-sm-3"><label>Occupation :</label></div>
          <div class="col-sm-8">
          <?php
                $name14 = $row["Occupation"];
                echo '<input type="text" name="occ" class="form-control input-sm" style="margin-left: 60px;" required value="' . $name14 . '">';
                ?>
      </div>
      </div>
      <br>
      <div class="row cf-ro"> 
              <label for="exampleFormControlTextarea1" class="form-label" style="margin-left: 20px;
margin-top: 30px;">Droits et charges foncières :</label>
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
          <legend>Chronologie:</legend>
          <br>
          <div class="row cf-ro"> 
                  <label>Date de Demande :</label>
                  <div class="col-sm-8">
                  <?php
                $name16 = $row["date_Demande"];
                echo '<input type="date" name="DateD" required value="' . $name16. '">';
                ?>
              </div>
          </div>
          <br>
                  <div class="row cf-ro"> 
                   <label>Date Reconnaissance Provinciale :</label>
                   <div class="col-sm-8"><div class="col-sm-8">
                   <?php
                $name17 = $row["date_Reconnaissance_Provinciale"];
                echo '<input type="date" name="DateR" required value="' . $name17. '">';
                ?>
                  </div></div>
                  </div>
              <br>
                  <div class="row cf-ro"> 
                      <label>Date Reconnaissance Régionale :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name18 = $row["date_Reconnaissance_Régionale"];
                echo '<input type="date" name="DateRR" style="margin-left: 7px;" required value="' . $name18. '">';
                ?>
                  </div></div>
                  </div>
                  <br>
                  <div class="row cf-ro"> 
                      <label>Date Reconnaissance Natioanle :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name19 = $row["date_Reconnaissance_Nationale"];
                echo '<input type="date" name="DateRN" style="margin-left: 7px;" required value="' . $name19. '">';
                ?>
                  </div></div>
                  </div>
                  <br>
                  <div class="row cf-ro"> 
                      <label>Accord de principe :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name20 = $row["date_Accord_de_principe"];
                echo '<input type="date" name="DateAP" style="margin-left: -20px;" required value="' . $name20. '">';
                ?>
                  </div></div>
                  </div>
                  <br>
                  <div class="row cf-ro"> 
                      <label style="margin-left: -28px;">Date d'Expertise :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name21 = $row["date_Expertise"];
                echo '<input type="date" name="DateExp" required value="' . $name21. '">';
                ?>
                  </div></div>
                  </div>
                  <br>
                  <div class="row cf-ro"> 
                      <label>Révision d'expertise :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name22 = $row["date_Révision_d_expertise"];
                echo '<input  type="date" name="DateRExp" required value="' . $name22. '">';
                ?>
                  </div></div>
                  </div>
                 
      </fieldset>
      <br>
          <div class="row cf-ro"> 
                  <label>Valeur vénale en Dh/Hectare :</label>
                  <div class="col-sm-8">
                  <?php
                $name23 = $row["Valeur_vénale_en_Dh_Hectare"];
                echo '<input  type="number" name="VDH" id="VDH" min="0"  step="1" required value="' . $name23. '">';
                ?>
              </div>
          </div>
          <br>
          <div class="row cf-ro"> 
                  <label>Valeur vénale révisée en Dh/Hectare :</label>
                  <div class="col-sm-8">
                  <?php
                $name24 = $row["Valeur_vénale_révisée_en_Dh_Hectare"];
                echo '<input  type="number" name="VDHR" id="VDHR" min="0"  step="1" required value="' . $name24. '">';
                ?>
              </div>
          </div>
          <br>
                  <div class="row cf-ro"> 
                   <label>Montant Total en Dh :</label>
                   <div class="col-sm-8">
                   <?php
                $name25 = $row["Montant_Total_en_Dh"];
                echo '<input  type="number" name="montantTD" id="montantTotal" min="0"  step="1" required value="' . $name25. '">';
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
                $name26 = $row["Observation"];
                echo '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obsr2" required>' . $name26. '</textarea>';
                ?>
              

          </div>
          <br>
          <br>
          <?php
               $terrainAcquis = $row["Terrain_acquis"];
                ?>
          <fieldset id="groupedLabels">
<legend>Terrain acquis (Oui/Non/en cours):</legend>
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
                      <label>Date d'acquistion :</label>
                      <div class="col-sm-8"><div class="col-sm-8">
                      <?php
                $name27 = $row["Date_d_acquisition"];
                echo '<input  type="date" name="DateDA"  value="' . $name27. '">';
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
<legend>Terrain reboisé (Oui/Non):</legend>
<label for="oui2">Oui</label>
<input type="radio" id="oui2" name="TR" value="Oui" <?php echo ($terrainReboisé === 'Oui') ? 'checked' : ''; ?>>
<br>
<label for="non2">Non</label>
<input type="radio" id="non2" name="TR" value="Non" <?php echo ($terrainReboisé === 'Non') ? 'checked' : ''; ?>>
</fieldset>
<br>
      <div id="documentsDiv3" style="display: none;">
      
      <div class="row cf-ro"> 
                   <label>Année et marché :</label>
                   <div class="col-sm-8"><?php
                $AM = $row["Année_et_marché"];
                echo '<input  type="text" name="AM" class="form-control input-sm"  value="' . $AM. '">';
                ?></div>
                  </div>
                  <br>
                  
                  <div class="row cf-ro"> 
                   <label>Technique :</label>
                   <div class="col-sm-8"><?php
                $TCH = $row["Technique"];
                echo '<input  type="text" name="TCH" class="form-control input-sm" value="' . $TCH. '">';
                ?></div>
                  </div>
                  <br>
                  
                  <div class="row cf-ro"> 
                   <label>Espéce utilisée :</label>
                   <div class="col-sm-8"><?php
                $EU = $row["Espèce_utilisée"];
                echo '<input  type="text" name="EU" class="form-control input-sm"  value="' . $EU. '">';
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

<script>
// Sélectionnez le bouton radio "Oui" par son ID
var ouiRadioButton2 = document.getElementById("oui2");
var nonRadioButton2 = document.getElementById("non2");
var deleteButton1 = document.getElementById("DF1");
var updateButton1 = document.getElementById("UF1");
// Sélectionnez la div contenant le contenu à afficher
var documentsDiv2 = document.getElementById("documentsDiv3");

// Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
ouiRadioButton2.addEventListener("click", function () {
if (ouiRadioButton2.checked) {
  // Si "Oui" est sélectionné, affichez le contenu

  deleteButton1.style.marginLeft = "-43px";
  deleteButton1.style.marginTop = "-6402px"; 
  updateButton1.style.marginLeft = "28px";
  updateButton1.style.marginTop = "-6402px"; 
} 
});
nonRadioButton2.addEventListener("click", function () {
if (nonRadioButton2.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
 
  deleteButton1.style.marginLeft = "-43px";
  deleteButton1.style.marginTop = "-5671px"; 
  updateButton1.style.marginLeft = "28px";
  updateButton1.style.marginTop = "-5671px"; 
} 
});
</script>
<script>
// Sélectionnez le bouton radio "Oui" par son ID
var ouiRadioButton1 = document.getElementById("oui1");
var nonRadioButton1 = document.getElementById("non1");
var encoursButton = document.getElementById("encours");
// Sélectionnez la div contenant le contenu à afficher
var documentsDiv1 = document.getElementById("documentsDiv2");

// Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
ouiRadioButton1.addEventListener("click", function () {
if (ouiRadioButton1.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
  documentsDiv1.style.display = "block";
} 
});
nonRadioButton1.addEventListener("click", function () {
if (nonRadioButton1.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
  documentsDiv1.style.display = "none";
} 
});
encoursButton.addEventListener("click", function () {
if (encoursButton.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
  documentsDiv1.style.display = "none";
} 
});
</script>
      
<script>
// Sélectionnez le bouton radio "Oui" par son ID
var ouiRadioButton1 = document.getElementById("oui1");
var nonRadioButton1 = document.getElementById("non1");
var encoursButton = document.getElementById("encours");
var deleteButton1 = document.getElementById("DF1");
var updateButton1 = document.getElementById("UF1");
// Sélectionnez la div contenant le contenu à afficher
var documentsDiv1 = document.getElementById("documentsDiv2");

// Ajoutez un gestionnaire d'événement pour le clic sur le bouton "Oui"
ouiRadioButton1.addEventListener("click", function () {
if (ouiRadioButton1.checked) {
  // Si "Oui" est sélectionné, affichez le contenu

  deleteButton1.style.marginLeft = "-43px";
  deleteButton1.style.marginTop = "-6402px"; 
  updateButton1.style.marginLeft = "28px";
  updateButton1.style.marginTop = "-6402px"; 
} 
});
nonRadioButton1.addEventListener("click", function () {
if (nonRadioButton1.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
 
  deleteButton1.style.marginLeft = "-43px";
  deleteButton1.style.marginTop = "-5671px"; 
  updateButton1.style.marginLeft = "28px";
  updateButton1.style.marginTop = "-5671px"; 
} 
});
encoursButton.addEventListener("click", function () {
if (encoursButton.checked) {
  // Si "Oui" est sélectionné, affichez le contenu
 
  deleteButton1.style.marginLeft = "-43px";
  deleteButton1.style.marginTop = "-5671px"; 
  updateButton1.style.marginLeft = "28px";
  updateButton1.style.marginTop = "-5671px"; 
} 
});
</script>
      <br>
      <br>
          <div class="col-sm-8">
          <input type="hidden" name="formId2" value="<?php echo $row["id"]; ?>">
          
<button  name="deleteForm2" id="DF1" class='btn btn-sm btn-danger' style="margin-left: -43px;
margin-top: -5671px;">Supprimer</button>
<button name="updateForm2" id="UF1" class='btn btn-sm btn-warning' style="margin-left: 28px;
margin-top: -5671px;">Modifier</button>
              </div>
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
} 
        
    }
    
    // Construire la requête SQL en fonction des valeurs sélectionnées

            
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
  