<?php
// Votre code de connexion à la base de données
include('../connexion.php');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["deleteForm2"])) {
        $formId = $_POST['formId2'];

        // Échapper les données pour éviter les failles d'injection SQL
        $formId = $conn->real_escape_string($formId);

        // Écrivez la requête de suppression du formulaire et des données associées
        $sql1 = "DELETE FROM fichiers_importes2 WHERE id_acquisition = $formId";
        $sql2 = "DELETE FROM table_kmz2 WHERE id_acquisition = $formId";
        $sql = "DELETE FROM acquisition WHERE id = $formId";


        if ($conn->query($sql1) === TRUE) {
           
        }
        if ($conn->query($sql2) === TRUE) {
           
        }

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Formulaire et données supprimés avec succès.');
            window.location.href = 'ajouter_formulaire.php';
            </script>";
        } else {
            echo "Erreur lors de la suppression du formulaire et des données : " . $conn->error;
        }
    }

 
}

$conn->close();
?>
<?php
// Votre code de connexion à la base de données
include('../connexion.php');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["updateForm2"])) {
        // Récupérez l'ID du formulaire que vous souhaitez mettre à jour
        $id = $_POST['formId2']; // Assurez-vous que vous avez un champ 'id' dans votre formulaire

        // Échapper les données pour éviter les failles d'injection SQL
        $id = $conn->real_escape_string($id);

        // Récupérez les nouvelles valeurs des champs du formulaire
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
        $date_Demande = $_POST["DateD"];
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
        $Terrain_acquis=$_POST["TA"];
        $Terrain_reboisé=$_POST["TR"];
        // Écrivez la requête de mise à jour
        $sql = "UPDATE acquisition SET Nom_SociétéEntreprise = '$Nom_SociétéEntreprise', NomPrénom_Gérant  = '$NomPrénom_Gérant' , CIN_Gérant = '$CIN_Gérant' , Adresse1 = '$Adresse1' , Tél1 = '$Tél1' , NomPrénom = '$NomPrénom' , CIN ='$CIN' , Adresse2 = '$Adresse2' , Tél2 = '$Tél2' , N_TF_Req = '$N_TF_Req' , Nom_Terrain = '$Nom_Terrain' , N_parcelles = '$N_parcelles' , Province = '$Province' , CT = '$CT' , DPANEF = '$DPANEF' , ZFDT = '$ZFDT' , DFP = '$DFP' , Superficie_ha = '$Superficie_ha' , Occupation = '$Occupation' , Droits_et_charges_foncières = '$Droits_et_charges_foncières' , date_Demande = '$date_Demande' , date_Reconnaissance_Provinciale = '$date_Reconnaissance_Provinciale' , date_Reconnaissance_Régionale = '$date_Reconnaissance_Régionale',date_Reconnaissance_Nationale = '$date_Reconnaissance_Nationale',date_Accord_de_principe = '$date_Accord_de_principe', date_Expertise = '$date_Expertise', date_Révision_d_expertise  = '$date_Révision_d_expertise', Valeur_vénale_en_Dh_Hectare  = '$Valeur_vénale_en_Dh_Hectare', Valeur_vénale_révisée_en_Dh_Hectare  = '$Valeur_vénale_révisée_en_Dh_Hectare', Montant_Total_en_Dh = '$Montant_Total_en_Dh', Date_d_acquisition  = '$Date_d_acquisition', Année_et_marché  = '$Année_et_marché', Technique  = '$Technique', Espèce_utilisée  = '$Espèce_utilisée', Observation  = '$Observation',  Terrain_acquis='$Terrain_acquis' ,Terrain_reboisé='$Terrain_reboisé' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Formulaire mis à jour avec succès.');
            window.location.href = 'ajouter_formulaire.php';
            </script>";
            
        } else {
            echo "Erreur lors de la mise à jour du formulaire : " . $conn->error;
        }
    }
}

$conn->close();
?>