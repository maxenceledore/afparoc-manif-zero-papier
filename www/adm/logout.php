<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php

session_start ();

session_unset ();

session_destroy ();

header ('location: ../index.php');

?>
