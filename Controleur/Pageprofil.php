<?php
include 'fonction/fonction.php';

session_start();

if($_GET['action']=="profil"){

    $pageprofil=getProfilDemandeur($_SESSION["numerodem"]);

include 'Vue/include/head.html';
include 'Vue/include/menu.html';
include 'Vue/vueProfil.php';
include 'Vue/include/footer.html';

}

?>