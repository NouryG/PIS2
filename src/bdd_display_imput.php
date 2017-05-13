<?php

  $conn = new mysqli('localhost', 'root', 'root', 'actemedia') or die ('Cannot connect to db');
  $date_imput=$_POST['date_imput'];
  $code_collab=$_POST['code_collab'];
  $result = $conn->query("select * from imputation WHERE date_imput LIKE '$date_imput' AND code_collab LIKE '$code_collab'");

if($result->num_rows == 0){

?>

<label style="color: white; margin-bottom: 30px;">Le collaborateur n'a pas d'imputation pour le mois sélectionné.</label><br>
<?php 
}else{
  
  ?>

<label style="color: white; margin-bottom: 30px;">Voici les imputations du collaborateur pour le mois choisi :</label><br>

<table class="table table-striped table-bordered">
  <thead>
      <tr>
        <th>Code Projet</th>
        <th>Imputations</th>
      </tr>
  </thead>
  
  <tbody>
    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
          <td><?php echo $row['code_projet']; ?></td>
          <td><?php echo $row['jours']; ?></td>
      </tr>
    <?php }} ?>
  </tbody>
</table>