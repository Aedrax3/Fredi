<link rel="stylesheet" href="http://localhost/fredi/CSS/note.css"/>
</head>
<body>
<div class="cadre">
  
      <h1>Modifier le profil</h1>
<main>


<form action="./?action=modifierprofil" method="post">
<div class="form">
          <p>  Nom :
      <input type="text" name="nom" placeholder="Nom" required> </p>
    
          <p>  Prénom :
        <input type="text" name="prenom" placeholder="Prénom"required> </p>
     
           <p> Adresse mail :
        <input type="text" name="mail" placeholder="Adresse Mail"required> </p>
        
            <p> Rue :
        <input type="text" name="rue" placeholder="Rue"required> </p>
       
          <p>  Code Postal :
     <input type="number" name="cp" placeholder="Code Postal" required> </p>
          
          <p>  Ville :
     <input type="text" name="ville" placeholder="Ville" required> </p>
</div>
  
    <input type="submit" name="submit" value="Modifier">
    <input type="reset" id="annuler" name="Annuler">
    </form>
</div>

  </main>