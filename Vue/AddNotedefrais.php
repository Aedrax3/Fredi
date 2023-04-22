<link rel="stylesheet" href="http://localhost/fredi/CSS/note.css"/>
</head>
<body>
<div class="cadre">
  
      <h1>Enregistrements</h1>
<main>


<form action="./?action=add" method="post">
<div class="form">
          <p>  Date :
      <input type="date" name="date" placeholder="Date" required> </p>
    
          <p>  Motif :
        <input type="text" name="motif" placeholder="Motif"required> </p>
     
           <p> Trajet départ :
        <input type="text" name="trajet1" placeholder="Trajet"required> </p>
        
            <p> Trajet arrivé :
        <input type="text" name="trajet2" placeholder="Trajet"required> </p>
       
          <p>  km parcourus :
     <input type="number" name="km" placeholder="km" required> </p>
          
          <p>  Coût peage :
     <input type="number" name="coutpeage" placeholder="cout peage" required> </p>
     
            <p> Coût repas :
  <input type="number" name="coutrepas" placeholder="cout repas" required> </p>
  
          <p>  Coût hebergement :
  <input type="number" name="coutheberg" placeholder="cout hebergement" required> </p>

</div>
  
    <input type="submit" name="submit" value="Envoyer">
    <input type="reset" id="annuler" name="Annuler">
    </form>
</div>

  </main>