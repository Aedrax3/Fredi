<?php

include 'fonction/fonction.php';

if(isset($_POST['submit']) OR !empty($_POST['submit'])){

    $date1 = $_POST['date'];

    $motif1 =$_POST['motif'];
    
    $trajet1 = $_POST["trajet1"];

    $trajet2 = $_POST['trajet2'];

    $km_parcouru = $_POST['km'];
    
    $cout_p = $_POST['coutpeage'];

    $cout_r = $_POST['coutrepas'];
    
    $cout_h = $_POST['coutheberg'];

    if (ajoutNotedefrais($date1,$motif1,$trajet1,$trajet2,$km_parcouru,$cout_p,$cout_r,$cout_h)==true){
        
        session_start();

        ajoutlien(1);

        $_SESSION['date']=$date1;

        $_SESSION['motif']=$motif1; 
    
        $SESSION['départ']=$trajet1; 

        $_SESSION['arrivé']=$trajet2; 

        $_SESSION['km']=$km_parcouru; 
    
        $_SESSION['peage']=$cout_p; 

        $_SESSION['repas']=$cout_r; 
    
        $_SESSION['hebergement']=$cout_h;
    
    session_write_close();

        include 'Controleur/ConfirmeAjout.php';
    }

    }else{

    include 'Vue/include/head.html';
	include 'Vue/include/menu.html';
	include 'Vue/AddNotedefrais.php';
	include 'Vue/include/footer.html';

    }
?>