<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php
include_once 'adm/utilisateurs.php';

if(authentifie() == FALSE)
  header('Location: index.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fiche CONTACT - Service RELATION STAGIAIRES</title>
    <link rel="stylesheet" type="text/css" href="adm_afpa.css">
  </head>
  <body>
    <div id="page">
      <div id="cadre-en-tete">
        <div id="cadre-en-tete-logo2-intitule">
          <div id="cadre-en-tete-logo2-intitule-haut">
            <div class="centrage">
            <p> Service Relation STAGIAIRES </p>
            <p> ACCUEIL </p>
            </div>
          </div>
          <div id="cadre-en-tete-logo2-intitule-bas">
          </div>
        </div>
        <div>
          <div class="centrage">
          </div>
        </div>
      </div>
      <a class="bouton-logout" href="adm/logout.php"> Déconnexion </a>
      <div class="centrage"> <p> AFPA Rochefort </p> <p> ANNUAIRE DES CANDIDATS-STAGIAIRES </p> </div>
      <button onclick="location.href='adm_index.php?page=contenu-annu'" type="button"> Accès à l'annuaire </button>
      <button onclick="location.href='adm/adm_export_table_vers_csv.php'" type="button"> Exporter au format CSV </button>
      <button onclick="location.href='adm_index.php'" type="button"> Accueil </button>
      <!--
      <button onclick="location.href='adm_index.php?page=recherche-annu'" type="button"> Rechercher de contacts </button>
      <button onclick="location.href='formulaire.php'" type="button"> Formulaire de saisie </button>
      -->

      <div class="centrage">
        <?php
          if(isset($_GET['page']))
            switch($_GET['page']) {
            case 'contenu-annu':
              include 'adm/adm_contenu_annuaire.php';
              include 'adm/bouton_retour.php';
              break;
            case 'fiche':
              include 'adm/adm_fiche.php';
              include 'adm/bouton_retour.php';
              break;
            case 'recherche-annu':
              include 'adm/adm_recherche_annu.php';
              include 'adm/bouton_retour.php';
              break;
            case 'dl-csv':
              include 'adm/adm_dl-csv.php';
              include 'adm/bouton_retour.php';
              break;
            default:
              include 'adm/bienvenue.htm';
              }
           else
             include 'adm/bienvenue.htm';
        ?>
      </div>
    </div>

  </body>
</html>
