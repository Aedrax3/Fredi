<?php
include 'fonction/fonction.php';

if(isset($_POST['N°licence'])){
	$testAdhérent=($_POST['N°licence']);
}else{
	$testAdhérent="";
}

if(!empty($testAdhérent)){
vérifAdhérent($testAdhérent);
}

if (LogOn()==true){
	$mailad=getDemandeur($testAdhérent);
	if($mailad['adresse_mail']==$_POST['Courriel']){
		echo 'Vous vous êtes déjà enregistrer une première fois.
		<a href="./?action=connexion">Aller à la connexion</a>';
	}else{
	if($_POST['Courriel']){
		$mail=$_POST['Courriel'];
		$mdp=$_POST['Mdp1'];
		ajoutDemandeur($mail,$mdp);
	}
	include 'Controleur/Home.php';
	}
}else{ 
	include 'Vue/include/head.html';
    include 'Vue/vueInscription.php';
    include 'Vue/include/footer.html';
}


session_destroy();


?>