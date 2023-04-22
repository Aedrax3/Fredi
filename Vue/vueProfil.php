<link rel="stylesheet" href="http://localhost/fredi/CSS/note.css"/>
</head>

<body>
<div class="cadre">
    <h1>Profil</h1>
    <div class="confirme">
        <p><b>Nom :</b> <?php echo $pageprofil['nom'] ?></p>
        <p><b>Prénom</b> <?php echo $pageprofil['prenom'] ?></p>
        <p><b>Adresse mail :</b> <?php echo $pageprofil['adresse_mail'] ?></p>
        <p><b>Rue :</b> <?php echo $pageprofil['rue'] ?></p>
        <p><b>Code Postal :</b> <?php echo $pageprofil['cp'] ?></p>
        <p><b>Ville :</b> <?php echo $pageprofil['ville'] ?></p>
        <div class="bouton">
            <a href="./?action=modifierprofil">Modifier</a>
        </div>
    </div>
</div>
