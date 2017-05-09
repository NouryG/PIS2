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


// Affichage des collaborateurs AMA
while ($donnees = $reponse1->fetch())
{
     $output .= '
          <th>'.$donnees["code"].'</th>
     ';
}

$output .= '
      <th style="background-color: lightblue;">AMA</th>';

// Sélection des collaborateurs externes
$reponse2 = $bdd->query('SELECT *
                        FROM collaborateurs
                        WHERE societe<>"AMA"
                        AND actif="1"');

// Affichage des collaborateurs AMA
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

// Selectionner tous les projets, les parcourir, et pour chaque projet, créer 2 valeurs tampons = somme et afficher les jours dans l'ordre

// Sélection des projets
$reponse3 = $bdd->query('SELECT *
                        FROM projet');

// Affichage des projets
while ($donnees = $reponse3->fetch()) {

    $code = $donnees['code'];

    // Affichage du code projet
    $output .= '
        <tr>
            <td>'.$code.'</td>
    ';

    // Affichage des imputations AMA pour ce projet
    $req = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe="AMA"
                        AND actif="1"');
    $req->execute(array(
    'code_projet' => $code,
    ));

    while ($donnees2 = $req->fetch()) {
        $output .= '
                <td>'.$donnees2["jours"].'</td>
        ';
    }

    // Récupération du total AMA
    $AMA = $bdd->query('SELECT SUM(jours)
                        AS total_AMA
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe="AMA"
                        AND actif="1"');

    // Affichage du total AMA
    $output .= '
        <td>'.$AMA["total_AMA"].'</td>
    ';

    // Affichage des imputations externes pour ce projet
    $req = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe <> "AMA"
                        AND actif="1"');
    $req->execute(array(
    'code_projet' => $code,
    ));

    while ($donnees2 = $req->fetch()) {
        $output .= '
                <td>'.$donnees2["jours"].'</td>
        ';
    }

    // Récupération du total externe
    $EXT = $bdd->query('SELECT SUM(jours)
                        AS total_EXT
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe <> "AMA"
                        AND actif="1"');

    // Affichage du total externe
    $output .= '
        <td>'.$EXT["total_EXT"].'</td>
    ';

    // Affichage du total complet
    /*$output .= '
        <td>'.$AMA["total_AMA"]. + .$EXT["total_EXT"].'</td>
    ';*/


    // Fin de la ligne du projet sélectionné
    $output .= '
        </tr>
    ';
}

/*// Sélection des projets
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
}*/

$output .= '
      </table>
      </div>';
echo $output;
?>
