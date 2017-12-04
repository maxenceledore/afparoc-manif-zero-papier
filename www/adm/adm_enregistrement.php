<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php
include_once 'utilisateurs.php';
/*
 * prévention d'injections :
 * strip_tags : Supprime les balises HTML et PHP d'une chaîne.
 */

$media_connaissance_manif;
/* coordonées */
if(isset($_POST['nom']))            $nom = strip_tags($_POST['nom']);
if(isset($_POST['prenom']))         $prenom = strip_tags($_POST['prenom']);
if(isset($_POST['date_naissance'])) $date_naissance   = strip_tags($_POST['date_naissance']);
if(isset($_POST['lieu_naissance'])) $lieu_naissance   = strip_tags($_POST['lieu_naissance']);
if(isset($_POST['nationalite']))    $nationalite      = strip_tags($_POST['nationalite']);
if(isset($_POST['tel_fix']))        $tel_fix          = strip_tags($_POST['tel_fix']);
if(isset($_POST['tel_mobile']))     $tel_mobile       = strip_tags($_POST['tel_mobile']);
if(isset($_POST['email']))          $email            = strip_tags($_POST['email']);
if(isset($_POST['adresse_voie']))   $adresse_voie     = strip_tags($_POST['adresse_voie']);
if(isset($_POST['adresse_ville']))  $adresse_ville    = strip_tags($_POST['adresse_ville']);
if(isset($_POST['adresse_cp']))     $adresse_cp       = strip_tags($_POST['adresse_cp']);
if(isset($_POST['diplome_classe'])) $diplome_classe   = strip_tags($_POST['diplome_classe']);

/* situation */

$status_actif = ' ';

foreach($_POST['status_actif'] as $valeur) {

  if($valeur == 'dmd_emploi')
    $status_actif .= 'Inscrit à Pôle Emploi. ';
  if($valeur == 'CSP')
    $status_actif .= 'CSP. ';
  if($valeur == 'salarie_public')
    $status_actif .= 'Salarié public. ';
  if($valeur == 'salarie_prive')
    $status_actif .= 'Salarié privé. ';
}

if(isset($_POST['contrat_salarie']))
  $contrat_salarie = strip_tags($_POST['contrat_salarie']);

if(isset($_POST['identifiant_pe']))
  $identifiant_pe = strip_tags($_POST['identifiant_pe']);

$anciens_salaries_situ_5ans = 0;
if(isset($_POST['anciens_salaries_situ_5ans']))
  if($_POST['anciens_salaries_situ_5ans'] == 'true')
    $anciens_salaries_situ_5ans = 1;

$anciens_salaries_situ_12mois = 0;
if(isset($_POST['anciens_salaries_situ_12mois']))
  if($_POST['anciens_salaries_situ_12mois'] == 'true')
    $anciens_salaries_situ_12mois = 1;

$anciens_interim_situ_18mois = 0;
if(isset($_POST['anciens_interim_situ_18mois']))
  if($_POST['anciens_interim_situ_18mois'] == 'true')
    $anciens_interim_situ_18mois = 1;

$str_accomp = ' ';

foreach($_POST['str_accomp'] as $valeur) {

  if($valeur == 'pe')
    $str_accomp .= 'Pôle Emploi. ';
  if($valeur == 'ml')
    $str_accomp .= 'Mission locale. ';
  if($valeur == 'ce')
    $str_accomp .= 'Cap Emploi. ';
  if($valeur == 'ladom')
    $str_accomp .= 'LADOM. ';
  if($valeur == 'adm_pen')
    $str_accomp .= 'Admininstration pénitentiaire. ';
}

if(isset($_POST['accompagnement_referent_nom'])) $accompagnement_referent_nom = strip_tags($_POST['accompagnement_referent_nom']);

if(isset($_POST['accompagnement_referent_mail'])) $accompagnement_referent_mail = strip_tags($_POST['accompagnement_referent_mail']);

if(isset($_POST['accompagnement_referent_tel'])) $accompagnement_referent_tel = strip_tags($_POST['accompagnement_referent_tel']);

/* projet */

if(isset($_POST['secteur_ou_metier_cible'])) $secteur_ou_metier_cible = strip_tags($_POST['secteur_ou_metier_cible']);
if(isset($_POST['formation_cible_nom'])) $formation_cible_nom = strip_tags($_POST['formation_cible_nom']);
if(isset($_POST['formation_cible_lieu'])) $formation_cible_lieu = strip_tags($_POST['formation_cible_lieu']);
/* commentaires */
if(isset($_POST['commentaires'])) $commentaires = strip_tags($_POST['commentaires']);
/* suite donnée (réservé administration) */
/*
if(isset($_POST['saisie_brique'])) $saisie_brique = strip_tags($_POST['saisie_brique']);
if(isset($_POST['suivi'])) $suivi = strip_tags($_POST['suivi']);
*/

$mysqli = new mysqli('localhost',$login, $mdp, $bdd);

if (mysqli_connect_errno())
    header('Location: ../index.php?page=err');

$nom = strtoupper($nom);
$adresse_ville = strtoupper($adresse_ville);

$requete_enregistrement= "INSERT INTO Fiche_contacts".
                         "(nom,prenom,date_naissance,lieu_naissance,nationalite,".
                         " tel_fix,tel_mobile,email,adresse_voie,adresse_ville,".
                         " adresse_cp,diplome_classe,status_actif,contrat_salarie,identifiant_pe,".
                         " anciens_salaries_situ_5ans,".
                         " anciens_salaries_situ_12mois,".
                         " anciens_interim_situ_18mois,".
                         " structure_accompagnement,".
                         " accompagnement_referent_nom,".
                         " accompagnement_referent_mail,".
                         " accompagnement_referent_tel,".
                         " secteur_ou_metier_cible,".
                         " formation_cible_nom,".
                         " formation_cible_lieu,".
                         " commentaires".
                         ") ".
                         "VALUES ('$nom', '$prenom','$date_naissance',".
                         "'$lieu_naissance','$nationalite','$tel_fix','$tel_mobile',".
                         "'$email','$adresse_voie','$adresse_ville',".
                         "'$adresse_cp','$diplome_classe','$status_actif','$contrat_salarie',".
                         "'$identifiant_pe',".
                         "'$anciens_salaries_situ_5ans',".
                         "'$anciens_salaries_situ_12mois',".
                         "'$anciens_interim_situ_18mois',".
                         "'$str_accomp',".
                         "'$accompagnement_referent_nom',".
                         "'$accompagnement_referent_mail',".
                         "'$accompagnement_referent_tel',".
                         "'$secteur_ou_metier_cible',".
                         "'$formation_cible_nom',".
                         "'$formation_cible_lieu',".
                         "'$commentaires'".
                         ")";

//TODO: abandon pour requête préparée
// tel quel, empeche l'enregistrement si champ(s) vide(s)
// $requete_enregistrement = $mysqli->real_escape_string($requete_enregistrement);

$mysqli->query($requete_enregistrement);


header('Location: ../index.php?page=postsaisiesucces');
?>
