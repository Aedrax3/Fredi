<?php
include 'fonction/fonction.php';

session_start();


$notedefrais=affichenotedefrais();

if (isset($_GET['id']) && !empty($_GET['id'])){
	supprimerNote($_GET['id']);
}

	include 'Vue/include/head.html';
	include 'Vue/include/menu.html';
	include 'Vue/vueNotedefrais.php';
	include 'Vue/include/footer.html';

?>