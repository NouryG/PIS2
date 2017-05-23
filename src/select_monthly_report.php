<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$chosen_month=$_POST['chosen_month'];
$result = $bdd->query("SELECT * from imputation WHERE date_imput LIKE '$chosen_month'");

if ($result->rowCount() == 0) {

?>

<label style=" margin-bottom: 30px;">Le mois séléctionné n'a pas d'imputation.</label><br>

<?php

}

else{

?>

<label style=" margin-bottom: 30px;">Voici les imputations pour le mois choisi :</label><br>

<?php

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
             <td style="background-color: #FAFAFA;"></td>';


// Affichage des collaborateurs AMA
while ($donnees = $reponse1->fetch())
{
     $output .= '
          <th style="background-color: #E7E7E7; text-align: center; color: #2C2C2C; font-weight: normal">'.$donnees["code"].'</th>
     ';
}

$output .= '
      <th style="background-color: #37ABFF; text-align: center;">AMA</th>';

// Sélection des collaborateurs externes
$reponse2 = $bdd->query('SELECT *
                        FROM collaborateurs
                        WHERE societe<>"AMA"
                        AND actif="1"');

// Affichage des collaborateurs externes
while ($donnees = $reponse2->fetch())
{
     $output .= '
          <th style="background-color: #E7E7E7; text-align: center; color: #2C2C2C; font-weight: normal">'.$donnees["code"].'</th>
     ';
}

$output .= '
      <th style="background-color: #37ABFF; text-align: center;">EXT</th>
      <th style="background-color: #2F93DB; text-align: center;">TOT</th>
    </tr>
</thead>
';

// Sélection des projets
$reponse3 = $bdd->query('SELECT *
                        FROM projet');

// Affichage des projets
while ($donnees = $reponse3->fetch()) {

    $code = $donnees['code'];

    // Affichage du code projet
    $output .= '
        <tr>
            <td style="background-color: #E7E7E7; color: #2C2C2C;">'.$code.'</td>
    ';

    // Affichage des imputations AMA pour ce projet
    $req = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND date_imput LIKE :chosen_month
                        AND societe="AMA"
                        AND actif="1"');
    $req->execute(array(
    'code_projet' => $code,
    'chosen_month' => $chosen_month,
    ));

    while ($donnees2 = $req->fetch()) {
        $output .= '
                <td>'.$donnees2["jours"].'</td>
        ';
    }

    // Récupération du total AMA
    $AMA = $bdd->prepare('SELECT SUM(jours)
                        AS total_AMA
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND date_imput LIKE :chosen_month
                        AND societe="AMA"
                        AND actif="1"');
    $AMA->execute(array(
    'code_projet' => $code,
    'chosen_month' => $chosen_month,
    ));

    // Affichage du total AMA
    $somme_AMA = $AMA->fetch();
    $output .= '
        <td style="font-weight: bold">'.$somme_AMA["total_AMA"].'</td>
    ';

    // Affichage des imputations externes pour ce projet
    $req = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND date_imput LIKE :chosen_month
                        AND societe <> "AMA"
                        AND actif="1"');
    $req->execute(array(
    'code_projet' => $code,
    'chosen_month' => $chosen_month,
    ));

    while ($donnees2 = $req->fetch()) {
        $output .= '
                <td>'.$donnees2["jours"].'</td>
        ';
    }

    // Récupération du total AMA
    $EXT = $bdd->prepare('SELECT SUM(jours)
                        AS total_EXT
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND date_imput LIKE :chosen_month
                        AND societe <> "AMA"
                        AND actif="1"');
    $EXT->execute(array(
    'code_projet' => $code,
    'chosen_month' => $chosen_month,
    ));

    // Affichage du total externe
    $somme_EXT = $EXT->fetch();
    $output .= '
        <td style="font-weight: bold">'.$somme_EXT["total_EXT"].'</td>
    ';

    // Affichage du total complet
    $somme = $somme_AMA["total_AMA"] + $somme_EXT["total_EXT"];
    $output .= '
        <td style="font-weight: bold">'.$somme.'</td>
    ';


    // Fin de la ligne du projet sélectionné
    $output .= '
        </tr>
    ';
}

$output .= '
      </table>
      </div>';
echo $output;

}

?>
