
<?php

  $conn = new mysqli('localhost', 'root', 'root', 'actemedia') or die ('Cannot connect to db');
  $date_imput=$_POST['date_imput'];
  $code_collab=$_POST['code_collab'];
  $result = $conn->query("select * from imputation WHERE date_imput LIKE '$date_imput' AND code_collab LIKE '$code_collab' AND jours <> 0");

if($result->num_rows == 0){

?>

<label style="color: white; margin-bottom: 30px;">Le collaborateur n'a pas d'imputation pour le mois sélectionné.</label><br>
<?php
}else{

  ?>

<label style="color: white; margin-bottom: 30px;">Voici les imputations du collaborateur pour le mois choisi :</label><br>

<table class="table table-striped table-bordered">
  <thead style="background-color: #ECECEC; color: #232323;">
      <tr>
        <th style="text-align: center;">Code Projet</th>
        <th style="text-align: center;">Jours travaillés (modifiable)</th>
        <th style="text-align: center;">Supprimer</th>
      </tr>
  </thead>

  <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr style="background-color: white;">
          <td><?php echo $row['code_projet']; ?></td>
          <td class="jours" data-id1="<?php echo $row['id']; ?>" contenteditable><?php echo $row['jours']; ?></td>
          <td><button type="button" name="delete_btn" data-id2="<?php echo $row['id']; ?>" class="btn btn-xs btn-danger btn_delete">x</button></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>
