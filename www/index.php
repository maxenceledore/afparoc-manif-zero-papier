<!DOCTYPE html>
<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<html>
  <head>
    <meta charset="UTF-8">
    <title>CONTACT - Service RELATION STAGIAIRES</title>
    <link rel="stylesheet" type="text/css" href="afpa.css">
  </head>
  <body>
    <div id="cadre-en-tete">
      <a class="bouton-log" href="index.php?page=auth"> CONNEXION </a>
    </div>
    <div class="bandeau-vert-clair">
      <div class="bandeau-vert-fonce"> </div>
    </div>
    <div id="bandeau-image">
    </div>
    <div id="corps">
      <div class="centrage">
        <?php
          if(isset($_GET['page']))
            switch($_GET['page']) {
            case 'auth':
              include 'adm/adm_log.php';
              break;
            case 'err':
              include 'visiteurs/erreur.php';
              break;
            case 'postsaisiesucces':
              include 'visiteurs/saisie-succes.php';
              break;
            default:
              include 'visiteurs/invitation-candidature.php';
              }
           else
             include 'visiteurs/invitation-candidature.php';
        ?>
      </div>
    </div>
    <div class="bandeau-vert-clair"></div>
  </body>
</html>
