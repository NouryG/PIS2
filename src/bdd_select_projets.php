<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


 $reponse = $bdd->query('SELECT * FROM projet');
 $output = '
      <div class="table-responsive">
           <table class="table table-bordered">
           <thead>
             <tr class="bg-primary" style="background-color: #2F93DB;">
               <th width="10%">Code</th>
               <th width="20%">Nom</th>
               <th width="20%">Client</th>
               <th width="20%">Date de début</th>
               <th width="20%">Jours Vendus</th>
               <th width="20%">CA Vendu</th>
             </tr>
           </thead>';



while ($donnees = $reponse->fetch())
{
     $output .= '
          <tr>
               <td>'.$donnees["code"].'</td>
               <td>'.$donnees["nom"].'</td>
               <td>'.$donnees["client"].'</td>
               <td>'.$donnees["date_debut"].'</td>
               <td>'.$donnees["jours_vendus"].'</td>
               <td>'.$donnees["CA_vendu"].' €</td>
               <td width="7%"><button type="button" name="delete_btn" data-id3="'.$donnees["code"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
          </tr>
     ';
}

$output .= '</table>
      </div>';
echo $output;
?>
