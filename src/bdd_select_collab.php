<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


 $reponse = $bdd->query('SELECT * FROM collaborateurs');
 $output = '
      <div class="table-responsive">
           <table class="table table-bordered">
           <thead>
             <tr class="bg-primary" style="background-color: #2F93DB;">
               <th width="10%">Code</th>
               <th width="20%">Nom</th>
               <th width="20%">Prénom</th>
               <th width="10%">Société</th>
               <th width="10%">TJ</th>
               <th width="10%">Actif</th>
               <th width="10%" style="text-align: center;">Action</th>
             </tr>
           </thead>';



while ($donnees = $reponse->fetch())
{
     $output .= '
          <tr>
               <td class="code" data-id1="'.$donnees["id"].'" contenteditable>'.$donnees["code"].'</td>
               <td class="nom" data-id1="'.$donnees["id"].'" contenteditable>'.$donnees["nom"].'</td>
               <td class="prenom" data-id2="'.$donnees["id"].'" contenteditable>'.$donnees["prenom"].'</td>
               <td class="societe" data-id2="'.$donnees["id"].'" contenteditable>'.$donnees["societe"].'</td>
               <td class="tj" data-id2="'.$donnees["id"].'" contenteditable>' .number_format($donnees["TJ"], 0, ",", " ").' €</td>
               <td class="actif" data-id2="'.$donnees["id"].'" contenteditable>'.$donnees["actif"].'</td>
               <td style="text-align: center;"><button type="button" name="delete_btn" data-id3="'.$donnees["code"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
          </tr>
     ';
}
$output .= '
     <tr>
          <td id="code" contenteditable></td>
          <td id="nom" contenteditable></td>
          <td id="prenom" contenteditable></td>
          <td id="societe" contenteditable></td>
          <td id="tj" contenteditable></td>
          <td id="actif" contenteditable></td>
          <td style="text-align: center;"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
     </tr>
';
 $output .= '</table>
      </div>';
 echo $output;
 ?>
