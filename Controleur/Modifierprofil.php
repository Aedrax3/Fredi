<?php
include 'fonction/fonction.php';

if ($_GET['action']=="modifierprofil"){
   
    if(isset($_POST['submit']) OR !empty($_POST['submit'])){

        $nom = $_POST['nom'];
    
        $prenom =$_POST['prenom'];
        
        $mail = $_POST['mail'];
    
        $rue = $_POST['rue'];
    
        $cp = $_POST['cp'];
        
        $ville = $_POST['ville'];

    modifierProfil($nom,$prenom,$mail,$rue,$cp,$ville);

}else{

    include 'Vue/include/head.html';
	include 'Vue/include/menu.html';
	include 'Vue/ModifierProfil.php';
	include 'Vue/include/footer.html';

}

}