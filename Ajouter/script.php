<?php
// Votre code de connexion à la base de données
include('../connexion.php');

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["deleteForm"])) {
        $formId = $_POST['formId'];

        // Échapper les données pour éviter les failles d'injection SQL
        $formId = $conn->real_escape_string($formId);

        // Écrivez la requête de suppression du formulaire et des données associées
        $sql1 = "DELETE FROM fichiers_importes WHERE id_distraction = $formId";
        $sql2 = "DELETE FROM table_kmz WHERE id_distraction = $formId";
        $sql = "DELETE FROM distraction WHERE id = $formId";

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
    if (isset($_POST["updateForm"])) {
        // Récupérez l'ID du formulaire que vous souhaitez mettre à jour
        $id = $_POST['formId']; // Assurez-vous que vous avez un champ 'id' dans votre formulaire

        // Échapper les données pour éviter les failles d'injection SQL
        $id = $conn->real_escape_string($id);

        // Récupérez les nouvelles valeurs des champs du formulaire
        $province = $_POST['province'];
        $commune = $_POST['commune'];
        $dpanef = $_POST["dpanef"];
        $zone_forestiere = $_POST["zone"];
        $district_forestier = $_POST["district"];
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
        // Écrivez la requête de mise à jour
        $sql = "UPDATE distraction SET Province = '$province', Commune = '$commune' , DPANEF = '$dpanef' , Zone_forestiere = '$zone_forestiere' , District_forestier = '$district_forestier' , Foret_canton_ilot = '$foret_canton_ilot' , Stade_fonciere ='$stade_fonciere' , Reference = '$reference' , Superficie_parcelle_m2 = '$superficie_parcelle_m2' , Beneficiaire = '$beneficiaire' , Projet_realise = '$projet_realise' , date_demande = '$date_demande' , date_provinciale = '$date_provinciale' , date_regionale = '$date_regionale' , date_accord_principe = '$date_accord_principe' , date_commission_administrative = '$date_commission_administrative' , date_commission_expertise = '$date_commission_expertise' , date_envoi_dossier = '$date_envoi_dossier' , Prix_en_Ha = '$prix_en_ha' , Montant_total = '$montant_total' , Reference_decrit = '$reference_decrit' , Reference_PV_remise = '$reference_pv_remise' ,Observation = '$observation' WHERE id = $id";

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
