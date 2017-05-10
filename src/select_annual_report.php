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

// Affichage des données
while ($donnees = $reponse->fetch())
{
     $output .= '
          <tr>
               <td>'.$donnees["code"].'</td>
               <td>'.$donnees["nom"].'</td>
               <td>'.$donnees["client"].'</td>
               <td>'.$donnees["CA_vendu"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["jours_vendus"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$donnees["jours_produits"].'</td>
               <td>'.$donnees["RAF_reel"].'</td>
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
';

// Somme des commandes
$CA_vendu = $bdd->query('SELECT SUM(CA_vendu) AS somme_CA_vendu FROM projet');

// Affichage du total commande
$somme_CA = $CA_vendu->fetch();
$output .= '
    <th>'.$somme_CA["somme_CA_vendu"].'</th>
    <th></th>
    <th></th>
';

/*// Somme du produit AMA
$cmd = $bdd->query('SELECT SUM(cout_projet) AS somme_cout FROM projet');

// Affichage du total produit AMA
$somme_commande = $cmd->fetch();
$output .= '
    <th>'.$somme_commande["somme_cout"].'</th>
';*/

/*// Somme du produit STT
$cmd = $bdd->query('SELECT SUM(cout_projet) AS somme_cout FROM projet');

// Affichage du total produit STT
$somme_commande = $cmd->fetch();
$output .= '
    <th>'.$somme_commande["somme_cout"].'</th>
';*/

// Somme des jours vendus
$JV = $bdd->query('SELECT SUM(jours_vendus) AS somme_JV FROM projet');

// Affichage du total jours vendus
$somme_JV = $JV->fetch();
$output .= '
    <th>'.$somme_JV["somme_JV"].'</th>
    <th></th>
';

// Somme des jours produits
$JP = $bdd->query('SELECT SUM(jours_produits) AS somme_JP FROM projet');

// Affichage du total jours produits
$somme_JP = $JP->fetch();
$output .= '
    <th>'.$somme_JP["somme_JP"].'</th>
';

// Somme des RAF
$RAF = $bdd->query('SELECT SUM(RAF_reel) AS somme_RAF FROM projet');

// Affichage du total jours produits
$somme_RAF = $RAF->fetch();
$output .= '
    <th>'.$somme_RAF["somme_RAF"].'</th>
    <th></th>
    <th></th>
';

// Fin de la ligne des totaux
$output .= '
    </tr>
';

 $output .= '</table>
      </div>';
 echo $output;
 ?>
