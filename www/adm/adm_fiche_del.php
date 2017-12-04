<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php
include_once 'utilisateurs.php';

if(authentifie() == FALSE)
  header('Location: ../index.php');

if(!isset($_GET['nf']))
    header('Location: ../adm_index.php');

$id_fiche = $_GET['nf'];

$mysqli = new mysqli('localhost',$login, $mdp, $bdd);

if (mysqli_connect_errno())
    header('Location: ../index.php?page=err');

$req_del_fiche = "DELETE FROM Fiche_contacts WHERE id=$id_fiche";

//TODO: abandon pour requête préparée
$req_del_fiche = $mysqli->real_escape_string($req_del_fiche);
  
$mysqli->query($req_del_fiche);
header('Location: ../adm_index.php?page=contenu-annu');

?>
