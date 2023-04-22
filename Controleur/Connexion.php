
<?php
include 'fonction/fonction.php';

if(isset($_POST['N°licence']) && isset($_POST['Mdp1'])){
	$numdem=($_POST['N°licence']);
	$mdpdem=($_POST['Mdp1']);
}else{
	$numdem="";
	$mdpdem="";
}

if(!empty($numdem) && !empty($mdpdem)){
	if(LogIn($numdem,$mdpdem)==true){
		include 'Controleur/Home.php';
		session_write_close();
	}
}else{
	include 'Vue/include/head.html';
	include 'Vue/vueConnexion.php';
	include 'Vue/include/footer.html';
}




?>