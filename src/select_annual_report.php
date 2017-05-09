<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Affichage du nom des données

$reponse = $bdd->query('SELECT * FROM projet');
$output = '
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th width="7%">Code</th>
                    <th width="10%">Projet</th>
                    <th width="10%">Client</th>
                    <th width="10%">Commande</th>
                    <th width="10%">Produit AMA</th>
                    <th width="10%">Produit STT</th>
                    <th width="7%">Jours vendus</th>
                    <th width="10%">TJM vendu</th>
                    <th width="7%">Jours produits</th>
                    <th width="7%">RAF</th>
                    <th width="10%">TJ projet</th>
                    <th width="2%">CA restant</th>
                </tr>
            </thead>';

/* // Somme des jours produits
    $AMA = $bdd->query('SELECT SUM(jours)
                        AS total_AMA
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe="AMA"
                        AND actif="1"');
    $AMA->execute(array(
    'code_projet' => $code,
    ));

    // Affichage du total AMA
    $somme_AMA = $AMA->fetch();
    $output .= '
        <td>'.$somme_AMA["total_AMA"].'</td>
    ';*/

// Affichage des données
while ($donnees = $reponse->fetch())
{
     $output .= '
          <tr>
               <td>'.$donnees["code"].'</td>
               <td>'.$donnees["nom"].'</td>
               <td>'.$donnees["client"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["jours_vendus"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["jours_produits"].'</td>
               <td>'.$donnees["RAF_reel"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["id"].'</td>
          </tr>
     ';
}

// Affichage des totaux
$output .= '
    <tr class="bg-primary">
        <th>Totaux</th>
        <th></th>
        <th></th>
        <th>Total</th>
        <th>Total</th>
        <th>Total</th>
        <th>Total</th>
        <th></th>
        <th>Total</th>
        <th>Total</th>
        <th></th>
        <th>Total</th>
    </tr>
';

 $output .= '</table>
      </div>';
 echo $output;
 ?>
