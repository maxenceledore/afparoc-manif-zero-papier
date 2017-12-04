<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php

/* TODO: renseignée en dur. pas terrible ...
/* coincide pour le moment avec l'utilsateur de la base de données. */
$login = 'gestrel';
$mdp   = 'HappyAFPA2017';
$bdd   = 'Relation_stagiaires';

function authentifie () {

  session_start();
  session_regenerate_id();

  if(!isset($_SESSION['login']) || !isset($_SESSION['mdp']))
    return FALSE;

  return TRUE;
}

?>
