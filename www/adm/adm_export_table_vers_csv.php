<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php

include_once 'utilisateurs.php';

if(authentifie() == FALSE)
  header('Location: ../index.php');

$separateur = ',';

$mysqli = new mysqli('localhost',$login, $mdp, $bdd);

if (mysqli_connect_errno())
    header('Location: ../index.php?page=err');


$req_export_csv = "SELECT * FROM Fiche_contacts";

//TODO: abandon pour requête préparée
$req_export_csv = $mysqli->real_escape_string($req_export_csv);

$res_export_csv = $mysqli->query($req_export_csv);


$nom_fichier = 'export-fiches'.date(DATE_ATOM).'.csv';

/* remplacer le '+' dans le nom de fichier par un tiret ('-') */
$nom_fichier = str_replace("+","-",$nom_fichier);

$fichier = fopen('../tmp/'.$nom_fichier, "w");

if ($fichier) {

  fwrite($fichier, 'nom,prenom,date_naissance,lieu_naissance,nationalite,tel_fix,tel_mobile,');
  fwrite($fichier, 'email,adresse_voie,adresse_ville,adresse_cp,diplome_classe,');
  fwrite($fichier, 'structure_accompagnement,accompagnement_referent_nom,accompagnement_referent_mail,');
  fwrite($fichier, 'secteur_ou_metier_cible,formation_cible_nom,formation_cible_lieu,');
  fwrite($fichier, 'accompagnement_referent_tel,');
  fwrite($fichier, 'secteur_ou_metier_cible,formation_cible_nom,formation_cible_lieu,');
  fwrite($fichier, 'commentaires,');
  fwrite($fichier, 'media_connaissance_manif');
  fwrite($fichier, PHP_EOL);
}


while ($fiche = mysqli_fetch_array($res_export_csv)) {

  fwrite($fichier, $fiche['nom'].','.$fiche['prenom'].','.$fiche['date_naissance'].','.$fiche['lieu_naissance'].',');
  fwrite($fichier, $fiche['nationalite'].','.$fiche['tel_fix'].','.$fiche['tel_mobile'].','.$fiche['email'].',');
  fwrite($fichier, $fiche['adresse_voie'].','.$fiche['adresse_ville'].','.$fiche['adresse_cp'].','.$fiche['diplome_classe'].',');
  fwrite($fichier, $fiche['structure_accompagnement'].','.$fiche['accompagnement_referent_nom'].',');
  fwrite($fichier, $fiche['accompagnement_referent_mail'].','.$fiche['accompagnement_referent_tel'].',');
  fwrite($fichier, $fiche['secteur_ou_metier_cible'].','.$fiche['formation_cible_nom'].',');
  fwrite($fichier, $fiche['formation_cible_lieu'].','.$fiche['commentaires']);
  fwrite($fichier, PHP_EOL);
}

fclose($fichier);

$url_redir_dl = "../adm_index.php?page=dl-csv&f=".$nom_fichier;
header('Location:'.$url_redir_dl);

/*
  echo
  $fichier, $fiche['nom'].','.$fiche['prenom'].','.$fiche['date_naissance'].','.$fiche['lieu_naissance'].','.
  $fiche['nationalite'].','.$fiche['tel_fix'].','.$fiche['tel_mobile'].','.$fiche['email'].','.
  $fiche['adresse_voie'].','.$fiche['adresse_ville'].','.$fiche['adresse_cp'].','.$fiche['diplome_classe'].','.

  $fiche['structure_accompagnement'].','.$fiche['accompagnement_referent_nom'].','.
  $fiche['accompagnement_referent_mail'].','.$fiche['accompagnement_referent_tel'].','.

  $fiche['secteur_ou_metier_cible'].','.$fiche['formation_cible_nom'].','.
  $fiche['formation_cible_lieu'].','.$fiche['commentaires'];
  
  echo PHP_EOL;
*/
/*
echo 'nom,prenom,date_naissance,lieu_naissance,nationalite,tel_fix,tel_mobile,';
echo 'email,adresse_voie,adresse_ville,adresse_cp,diplome_classe,';

echo 'structure_accompagnement,accompagnement_referent_nom,accompagnement_referent_mail,';
echo 'accompagnement_referent_tel,';

echo 'secteur_ou_metier_cible,formation_cible_nom,formation_cible_lieu,';
echo 'commentaires,';

echo 'media_connaissance_manif';
echo PHP_EOL;
*/
?>
