<?php
if (!isset($_SESSION)) {
    session_start();
}
unset($_SESSION["numerolicence"]);

include 'Vue/include/head.html';
include 'Vue/vueAccueil.php';
include 'Vue/include/footer.html';

?>