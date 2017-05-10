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
                    <th width="7%">RAF estimé</th>
                    <th width="20%">RAF réel (0 par défaut)</th>
                    <th width="10%">TJ projet</th>
                    <th width="2%">CA restant</th>
                </tr>
            </thead>';

// Affichage des données
while ($donnees = $reponse->fetch())
{
    $code = $donnees['code'];
     $output .= '
          <tr>
               <td>'.$donnees["code"].'</td>
               <td>'.$donnees["nom"].'</td>
               <td>'.$donnees["client"].'</td>
               <td>'.$donnees["CA_vendu"].' €</td>
      ';

    // Calcul des jours produits AMA pour le projet sélectionné
    $AMA = $bdd->prepare('SELECT SUM(jours)
                        AS produit_AMA
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe="AMA"
                        AND actif="1"');
    $AMA->execute(array(
    'code_projet' => $code,
    ));

    // Affichage des jours produits AMA
    $produit_AMA = $AMA->fetch();
    $output .= '
        <td>'.$produit_AMA["produit_AMA"].'</td>
    ';

    // Calcul des jours produits sous-traitant pour le projet sélectionné
    $STT = $bdd->prepare('SELECT SUM(jours)
                        AS produit_STT
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe <> "AMA"
                        AND actif="1"');
    $STT->execute(array(
    'code_projet' => $code,
    ));

    // Affichage des jours produits sous-traitant
    $produit_STT = $STT->fetch();
    $output .= '
        <td>'.$produit_STT["produit_STT"].'</td>
    ';

    $temp_Produits = $produit_AMA["produit_AMA"] + $produit_STT["produit_STT"];
    $temp_RAF = $donnees["jours_vendus"] - $temp_Produits;
    $output .= '
               <td>'.$donnees["jours_vendus"].'</td>
               <td>'.$donnees["id"].'</td>
               <td>'.$temp_Produits.'</td>
               <td>'.$temp_RAF.'</td>
               <td contenteditable>'.$donnees["RAF_reel"].'</td>
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
    <th>'.$somme_CA["somme_CA_vendu"].' €</th>
';

// Somme du produit AMA
$AMA = $bdd->query('SELECT SUM(jours)
                    AS produit_AMA
                    FROM collaborateurs as c, imputation as i
                    WHERE c.code = i.code_collab
                    AND societe="AMA"
                    AND actif="1"');

// Affichage de la somme des jours produits AMA
$produit_AMA = $AMA->fetch();
$output .= '
    <td>'.$produit_AMA["produit_AMA"].'</td>
';

// Somme du produit STT
$STT = $bdd->query('SELECT SUM(jours)
                    AS produit_STT
                    FROM collaborateurs as c, imputation as i
                    WHERE c.code = i.code_collab
                    AND societe<>"AMA"
                    AND actif="1"');

// Affichage de la somme des jours produits AMA
$produit_STT = $STT->fetch();
$output .= '
    <td>'.$produit_STT["produit_STT"].'</td>
';

// Somme des jours vendus
$JV = $bdd->query('SELECT SUM(jours_vendus) AS somme_JV FROM projet');

// Affichage du total jours vendus
$somme_JV = $JV->fetch();
$output .= '
    <th>'.$somme_JV["somme_JV"].'</th>
    <th></th>
';

// Affichage du total jours produits
$somme_JP = $produit_AMA["produit_AMA"] + $produit_STT["produit_STT"];
$output .= '
    <th>'.$somme_JP.'</th>
';

$temp = $somme_JV["somme_JV"] - $somme_JP["somme_JP"];
$output .= '
    <th>'.$temp.'</th>
';

// Somme des RAF réels
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
