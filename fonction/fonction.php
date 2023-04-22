<?php

include_once 'Modele/connexionbd.php';

function getAdhérent($num){
	$resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from adherents where numero_licence=:num");
        $req->bindValue(':num', $num, PDO::PARAM_INT);
     
     $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function vérifAdhérent($num) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $résult = getAdhérent($num);
    $numlicence = $résult["numero_licence"];

    if ($numlicence == $num) {
        $_SESSION["numerolicence"]=$numlicence;
    }

}

function ajoutDemandeur($mail,$mdp){
	   try {
        $cnx = connexionPDO();
        $req = $cnx->prepare('insert into demandeurs (adresse_mail,mdp, nom, prenom, rue, cp, ville) VALUES (:adresse_mail,:mdp," "," "," ",0," ")');
        $req->bindValue(':adresse_mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);

     $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProfilDemandeur($num){
	$resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from demandeurs where id=:num");
        $req->bindValue(':num', $num, PDO::PARAM_INT);
     
     $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function LogOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["numerolicence"])) {
        $num = getAdhérent($_SESSION["numerolicence"]);
        if ($num["numero_licence"] == $_SESSION["numerolicence"]) {
            $ret = true;
        }
    }
    return $ret;
}

function LogIn($id,$mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    $profildem=getProfilDemandeur($id);
    if (isset($profildem)) {
        if ($profildem["mdp"] == $mdp) {
            $ret = true;
            $_SESSION["numerodem"]=$id;

        }
    }
    return $ret;
}

function getDemandeur($num){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT d.*
            FROM demandeurs d
            INNER JOIN lien l ON l.id_demandeurs = d.id
            INNER JOIN adherents a ON a.numero_licence = l.num_licence
            WHERE a.numero_licence = ?;");
     
     $req->execute([$num]);

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function ajoutNotedefrais($date, $motif, $trajetD, $trajetA, $km, $cout_p, $cout_r, $cout_h){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO note_de_frais(dates, motif, trajet_départ, trajet_arrivé, km_parcourus, cout_peage, cout_repas, cout_hebergement) VALUES (:dates, :motif, :trajetD, :trajetA, :km, :cout_p, :cout_r, :cout_h)");
        $req->bindValue(':dates', $date, PDO::PARAM_STR);
        $req->bindValue(':motif', $motif, PDO::PARAM_STR);
        $req->bindValue(':trajetD', $trajetD, PDO::PARAM_STR);
        $req->bindValue(':trajetA', $trajetA, PDO::PARAM_STR);
        $req->bindValue(':km', $km, PDO::PARAM_INT);
        $req->bindValue(':cout_p', $cout_p, PDO::PARAM_INT);
        $req->bindValue(':cout_r', $cout_r, PDO::PARAM_INT);
        $req->bindValue(':cout_h', $cout_h, PDO::PARAM_INT);

        $req->execute();

        return true;
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getID(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT n.id 
        FROM note_de_frais n 
        ORDER BY n.id DESC LIMIT 1");
     
     $req->execute([]);

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function ajoutlien($num){
    try {
        $cnx = connexionPDO();
        $id=getID();
        $req = $cnx->prepare("INSERT INTO lien(num_licence, id_demandeurs, id_note) 
                                VALUES (:num_l, :id_dem, :id_note)");

        $req->bindValue(':num_l', $num, PDO::PARAM_INT);
        $req->bindValue(':id_dem', $_SESSION['numerodem'], PDO::PARAM_INT);
        $req->bindValue(':id_note',$id['id'], PDO::PARAM_INT);
        
        $req->execute();
    }
    catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function affichenotedefrais(){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT n.*
            FROM note_de_frais n
            JOIN lien l ON l.id_note = n.id
            WHERE l.id_demandeurs = ?");
     
     $req->execute([$_SESSION['numerodem']]);

        $resultat = $req->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function supprimerNote($idN){
    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM note_de_frais
            WHERE id= ?");

    $req->execute([$idN]);
    }catch (PDOExeptioon $e) {
        print "Erreur !: ".$e->getMessage();
        die();
    }
}


function modifierProfil($nom,$prenom,$mail,$rue,$cp,$ville){

    try {
     $cnx = connexionPDO();
     $req = $cnx->prepare(' UPDATE demandeurs 
                            SET `adresse_mail` = :mail, `nom` = :nom, `prenom` = :prenom, `rue` = :rue, `cp` = :cp, `ville` = :ville 
                            WHERE demandeurs.id = :id');
     $req->bindValue(':nom', $nom, PDO::PARAM_STR);
     $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
     $req->bindValue(':adresse_mail', $mail, PDO::PARAM_STR);
     $req->bindValue(':rue', $rue, PDO::PARAM_STR);
     $req->bindValue(':cp', $cp, PDO::PARAM_INT);
     $req->bindValue(':ville', $ville, PDO::PARAM_STR);
     $req->bindValue(':id',$_SESSION["numerolicence"], PDO::PARAM_INT);

  $req->execute();

 } catch (PDOException $e) {
     print "Erreur !: " . $e->getMessage();
     die();
 }
}



?>