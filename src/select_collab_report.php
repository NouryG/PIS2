<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Sélection des collaborateurs AMA
$reponse1 = $bdd->query('SELECT *
                        FROM collaborateurs
                        WHERE societe="AMA"
                        AND actif="1"');

$output = '
      <div class="table-responsive">
           <table class="table table-bordered">
           <thead>
             <tr class="bg-primary">
             <td style="background-color: lightgrey;"></td>';



while ($donnees = $reponse1->fetch())
{
     $output .= '
          <th>'.$donnees["code"].'</th>
     ';
}

$output .= '
      <th style="background-color: lightblue;">AMA</th>';

$reponse2 = $bdd->query('SELECT *
                        FROM collaborateurs
                        WHERE societe<>"AMA"
                        AND actif="1"');

while ($donnees = $reponse2->fetch())
{
     $output .= '
          <th>'.$donnees["code"].'</th>
     ';
}

$output .= '
      <th style="background-color: lightblue;">EXT</th>
      <th style="background-color: darkblue;">TOT</th>
      </tr>
      </thead>
      ';

$reponse3 = $bdd->query('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND actif="1"');

while ($donnees = $reponse3->fetch())
{
     $output .= '
          <tr>
               <td style="background-color: lightblue;">'.$donnees["code_projet"].'</td>
               <td>'.$donnees["jours"].'</td>
          </tr>
     ';
}

$output .= '
      </table>
      </div>';
echo $output;
?>
