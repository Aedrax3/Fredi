<link rel="stylesheet" href="http://localhost/fredi/CSS/note.css"/>
</head>

<body>
<div class="cadre">
    <h1>Récapitulatif</h1>
    <div class="confirme">
        <p><b>Date :</b> <?php echo $_SESSION['date'] ?></p>
        <p><b>Motif :</b> <?php echo $_SESSION['motif'] ?></p>
        <p><b>Départ :</b> <?php echo $SESSION['départ'] ?></p>
        <p><b>Arrivé :</b> <?php echo $_SESSION['arrivé'] ?></p>
        <p><b>Km Parcourus :</b> <?php echo $_SESSION['km'] ?></p>
        <p><b>Coût péage :</b> <?php echo $_SESSION['peage'] ?></p>
        <p><b>Coût repas :</b> <?php echo $_SESSION['repas'] ?></p>
        <p><b>Coût hébergement :</b> <?php echo $_SESSION['hebergement'] ?></p>
        <div class="bouton">
            <a href="./?action=notedefrais">Continuer</a>
        </div>
    </div>
</div>
