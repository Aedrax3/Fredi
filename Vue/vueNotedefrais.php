<link rel="stylesheet" href="http://localhost/fredi/CSS/note.css"/>
<script src="http://localhost/fredi/_assets/js/fichier.js" defer></script>
    

<div class="cadreNote">
  <h1> Vos notes de frais </h1>

  <?php 

  if (empty($notedefrais)){?>
    <div class="response">
    <p>Vous n'avez aucune Note de frais. </p>
    </div>
 <?php }else{ ?>
<table class="table-responsive">
  <thead>
    <tr>
      <th>Sélect </th>
      <th>Date</th>
      <th>Motif</th>
      <th>Trajet départ</th>
      <th>Trajet arrivé</th>
      <th>Kms parcourus</th>
      <th>Coût trajet </th>
      <th>Péages</th>
      <th>Repas</th>
      <th>Hébergement</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($notedefrais as $index =>$row): 
    ?>
    <tr>
      <td>
        <form action="select.php" method="post">
          <input type="checkbox" name="selected[]" value="<?php echo $row['id']; ?>">
        </form>
      </td>
      <td><?php echo $row['dates']; ?></td>
      <td><?php echo $row['motif']; ?></td>
      <td><?php echo $row['trajet_départ']; ?></td>
      <td><?php echo $row['trajet_arrivé']; ?></td>
      <td><?php echo $row['km_parcourus']; ?></td>
      <td><?php  $coutrajet=$row['km_parcourus']*0.28;
      echo $coutrajet; ?></td>
      <td><?php echo $row['cout_peage']; ?></td>
      <td><?php echo $row['cout_repas']; ?></td>
      <td><?php echo $row['cout_hebergement']; ?></td>
      <td><?php  $total=$coutrajet+$row['cout_peage']+$row['cout_repas']+$row['cout_hebergement'];
      echo $total ?></td>
     
      <td>
        <div class="boutonnote">
          <a href="./?action=notedefrais&id=<?=$row['id']?>">Supprimer</a>
        </div>
      </td>
    </tr>

    <?php endforeach ?>
      </tbody>
    <?php }?>
  
</table>


<div class="box">
  <a href="./?action=add" class="btn btn-primary">Ajouter </a>
</div>

<div class="box">
  <a href="" class="btn btn-primary">Envoyer </a>
</div>

</div>