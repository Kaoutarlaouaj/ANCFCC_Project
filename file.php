<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: logout.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/assets2/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/assets2/css/style.css" rel="stylesheet">

    <title>La première page</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="assets/images/logo.jpg" style="border-radius: 10px;">
                </div>
                <div>
          <a href="logout.php" class="btn btn-warning btn-lg btn-block" style="margin-left: 560px;
  margin-top: -163px;
  width: 40%; background-color:#98D5E8;">Deconnexion</a>
        </div>
                <div class="container mt-5">
    <div class="row">
      <div class="col">
        <div class="mb-3">
          <a href="Ajouter/ajouter_formulaire.php" class="btn btn-primary btn-lg btn-block" style="background-color:#305649;margin-top: 100px;">Ajouter</a>
        </div>
        <div class="mb-3">
          <a href="supprimer_formulaire.html" class="btn btn-danger btn-lg btn-block" style="background-color:#AB873D;">Supprimer</a>
        </div>
        <div>
          <a href="modifier_formulaire.html" class="btn btn-warning btn-lg btn-block">Modifier</a>
        </div>
      </div>
    </div>
  </div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    


  </body>
</html>
                <!-- Affichage du formulaire de filtrage -->
                <section id="distraction" class="wat-we-do">
   <form method="post">
    <div class="row justify-content-center">
        <div  class="col-sm-6 cop-ck">
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
    });
    
</script>
<script>
    // Ajouter un événement de changement à la liste déroulante des provinces
    document.getElementById("selectZones").addEventListener("change", function() {
        // Soumettre automatiquement le formulaire lorsque la province est sélectionnée
        this.form.submit();
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
//session_start();
if (isset($_POST["submit_button"])) {
if ($_SERVER["REQUEST_METHOD"] === "POST") {
        include('../connexion.php');

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion a échoué: " . $conn->connect_error);
        }

        // Récupérer les valeurs du formulaire
        // ...
            // Récupérer les valeurs du formulaire
    $province = $_POST["province"];
    // Récupérer les autres valeurs du formulaire ici
    $commune = $_POST["commune"];
    $dpanef = $_POST["dpanef"];
    $zone_forestiere = $_POST["zones"];
    $district_forestier = $_POST["distinct"];
    $foret_canton_ilot = $_POST["name"];
    $stade_fonciere = $_POST["stade"];
    $reference = $_POST["ref"];
    $superficie_parcelle_m2 = $_POST["sup"];
    $beneficiaire = $_POST["benef"];
    $projet_realise = $_POST["projet"];
    $date_demande = $_POST["Date"];
    $date_provinciale = $_POST["prov"];
    $date_regionale = $_POST["reg"];
    $date_accord_principe = $_POST["Acc"];
    $date_commission_administrative = $_POST["Comm"];
    $date_commission_expertise = $_POST["Exp"];
    $date_envoi_dossier = $_POST["Env"];
    $prix_en_ha = $_POST["prix"];
    $montant_total = $_POST["montant"];
    $reference_decrit = $_POST["refD"];
    $reference_pv_remise = $_POST["refP"];
    $observation = $_POST["obsr"];
    // Préparer la requête d'insertion
    $sql = "INSERT INTO distraction (Province, Commune, DPANEF, Zone_forestiere, District_forestier, Foret_canton_ilot, Stade_fonciere, Reference, Superficie_parcelle_m2, Beneficiaire, Projet_realise, date_demande, date_provinciale, date_regionale, date_accord_principe, date_commission_administrative, date_commission_expertise, date_envoi_dossier, Prix_en_Ha, Montant_total, Reference_decrit, Reference_PV_remise, Observation)
    VALUES ('$province', '$commune', '$dpanef', '$zone_forestiere', '$district_forestier', '$foret_canton_ilot', '$stade_fonciere', '$reference', '$superficie_parcelle_m2', '$beneficiaire', '$projet_realise', '$date_demande', '$date_provinciale', '$date_regionale', '$date_accord_principe', '$date_commission_administrative', '$date_commission_expertise', '$date_envoi_dossier', '$prix_en_ha', '$montant_total', '$reference_decrit', '$reference_pv_remise','$observation')";
        // Préparer la requête d'insertion
        // ...

        if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Nouvel enregistrement inséré avec succès.');</script>";

          // Ajouter la redirection ici
          echo "<script>window.location.href = 'ajouter_formulaire.php';</script>";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

        // Fermer la connexion
        $conn->close();
    }
}
?>


   </section> 