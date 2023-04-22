<?php
include "compléments.php";
include "$dossier/Controleur/Actions.php";


if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

$fichier = Actions($action);
include "$dossier/controleur/$fichier";




?>