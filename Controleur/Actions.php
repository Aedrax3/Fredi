<?php

function Actions($action) {
    $lesActions = array();
    $lesActions["defaut"] = "Accueildefault.php";
    $lesActions["connexion"] = "Connexion.php";
    $lesActions["déconnexion"] = "déconnexion.php";
    $lesActions["inscription"] = "Inscription.php";
    $lesActions["notedefrais"] = "Notedefrais.php";
    $lesActions["add"] = "AddNote.php";
    $lesActions["profil"] = "Pageprofil.php";
    $lesActions["modifierprofil"] = "Modifierprofil.php";
    

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}

?>