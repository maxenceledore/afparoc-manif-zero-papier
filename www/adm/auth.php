<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php 

include_once 'utilisateurs.php';

sleep(1);

if (!isset($_POST['login']) || !isset($_POST['mdp'])) {

  header('Location: ../index.php?page=auth');
}

if ($login == $_POST['login'] && $mdp == $_POST['mdp']) {

  if ('root' == $_POST['login'])
     header ('location: ../index.php');

  session_start();

  $_SESSION['login'] = strip_tags($_POST['login']);
  $_SESSION['mdp']   = strip_tags($_POST['mdp']);
    header ('location: ../adm_index.php');

}
else {
  header ('location: ../index.php');
}

?>
