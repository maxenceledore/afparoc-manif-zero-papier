<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php

if(!isset($_GET['nf'])) {
//  header('Location: index.php');
  echo '<p> Entrée non définie. </p>'; return;
  }
  else
    $id_fiche = $_GET['nf'];

$mysqli = new mysqli('localhost',$login, $mdp, $bdd);

if (mysqli_connect_errno()) {
    header('Location: ../index.php?page=err');
    exit();
}

$req_fiche = "SELECT * FROM Fiche_contacts WHERE id=$id_fiche";

//TODO: abandon pour requête préparée
$req_fiche = $mysqli->real_escape_string($req_fiche);

$res_fiche = $mysqli->query($req_fiche);
$fiche = mysqli_fetch_array($res_fiche);

//$n_champs = count($fiche);

echo '<p> FICHE CANDIDAT </p>';

echo "<p> Nom : ". htmlspecialchars($fiche['nom'])."</p>";
echo "<p> Prénom : ". htmlspecialchars($fiche['prenom'])."</p>";
echo "<p> Date de naissance : ". htmlspecialchars($fiche['date_naissance'])."</p>";
echo "<p> Lieu de naissance : ". htmlspecialchars($fiche['lieu_naissance'])."</p>";
echo "<p> Nationalité : ". htmlspecialchars($fiche['nationalite'])."</p>";
echo "<p> Ligne fixe : ". htmlspecialchars($fiche['tel_fixe'])."</p>";
echo "<p> Ligne mobile : ". htmlspecialchars($fiche['tel_mobile'])."</p>";
echo "<p> E-mail : ". htmlspecialchars($fiche['email'])."</p>";
echo "<p> Adresse : ". htmlspecialchars($fiche['adresse_voie'])."</p>";
echo "<p> Ville : ". htmlspecialchars($fiche['adresse_ville'])."</p>";
echo "<p> Code postal: ". htmlspecialchars($fiche['adresse_cp'])."</p>";
echo "<p> Diplome ou denière classe fréquentée : ". htmlspecialchars($fiche['diplome_classe'])."</p>";

echo "<p> Status : ". htmlspecialchars($fiche['status_actif'])."</p>";
echo "<p> Type de contrat (si salarié) : ". htmlspecialchars($fiche['contrat_salarie'])."</p>";
echo "<p> Identifiant Pôle Emploi : ". htmlspecialchars($fiche['identifiant_pe'])."</p>";

echo " <p> A travaillé 24 mois au cours des 5 dernières années : ";
if($fiche['anciens_salaries_situ_5ans'] == 0) echo 'NON';
else echo 'OUI';
echo "</p>";

echo " <p> A travaillé 4 mois au cours des 12 derniers mois, en CDD : ";
if($fiche['anciens_salaries_situ_12mois'] == 0) echo 'NON';
else echo 'OUI';
echo "</p>";

echo " <p> A travaillé 1600 heures en qualité d'interimaire au cours des 18 derniers mois : ";
if($fiche['anciens_interim_situ_18mois'] == 0) echo 'NON';
else echo 'OUI';
echo "</p>";

echo "<p> Structure d'accompagnement : ". htmlspecialchars($fiche['structure_accompagnement'])."</p>";
echo "<p> Nom du référent : ". htmlspecialchars($fiche['accompagnement_referent_nom'])."</p>";
echo "<p> E-mail du référent : ". htmlspecialchars($fiche['accompagnement_referent_mail'])."</p>";
echo "<p> Ligne du référent : ". htmlspecialchars($fiche['accompagnement_referent_tel'])."</p>";

echo "<p> Secteur professionnel/métier visé : ". htmlspecialchars($fiche['secteur_ou_metier_cible'])."</p>";
echo "<p> Formation souhaitée : ". htmlspecialchars($fiche['formation_cible_nom'])."</p>";
echo "<p> Lieu : ". htmlspecialchars($fiche['formation_cible_lieu'])."</p>";

echo "<p> Commentaires : </p><p>". htmlspecialchars($fiche['commentaires'])."</p>";

echo "<p> Comment avez-vous eu connaissance de la manifestation ? </p><p>". htmlspecialchars($fiche['media_connaissance_manif'])."</p>";

echo "<p> Date enregistrement : ". htmlspecialchars($fiche['date_envoi_form'])."</p>";


?>
