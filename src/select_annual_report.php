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
<div class="col-sm-12"
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>Code</th>
                    <th>Projet</th>
                    <th>Client</th>
                    <th>Commande</th>
                    <th>Produit AMA</th>
                    <th>Produit STT</th>
                    <th>Jours vendus</th>
                    <th>TJM vendu</th>
                    <th>Jours produits</th>
                    <th>RAF estimé</th>
                    <th>RAF réel (0 par défaut)</th>
                    <th>TJ projet</th>
                    <th>CA restant</th>
                </tr>
            </thead>';

$total_Produit_AMA = 0; // Pour le total des jours produits AMA
$total_Produit_STT = 0; // Pour le total des jours produits EXT
$total_TJM_vendu = 0; // Pour le total TJM vendu
$total_TJ_projet = 0; // Pour le total TJ projet
$TJ_projet_count = 0;
$total_CA_restant = 0; // Pour le total du CA restant

// Affichage des données
while ($donnees = $reponse->fetch())
{
    $code = $donnees['code'];
    $output .= '
        <tr style="height: 50px;">
            <td>'.$donnees["code"].'</td>
            <td>'.$donnees["nom"].'</td>
            <td>'.$donnees["client"].'</td>
            <td>'.$donnees["CA_vendu"].' €</td>
    ';

    // Calcul du produit AMA pour le projet sélectionné
    $prod_AMA = 0;
    $collab_AMA = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe="AMA"
                        AND actif="1"');
    $collab_AMA->execute(array(
    'code_projet' => $code,
    ));

    while ($collab = $collab_AMA->fetch())
    {
        $prod_AMA += $collab["jours"] * $collab["TJ"];
    }

    $total_Produit_AMA += $prod_AMA; // Ajout du produit de ce collaborateur au total produit AMA

    // Affichage du produit AMA
    $output .= '
        <td>'.$prod_AMA.' €</td>
    ';

    // Calcul du produit STT pour le projet sélectionné
    $prod_STT = 0;
    $collab_STT = $bdd->prepare('SELECT *
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe<>"AMA"
                        AND actif="1"');
    $collab_STT->execute(array(
    'code_projet' => $code,
    ));

    while ($collab = $collab_STT->fetch())
    {
        $prod_STT += $collab["jours"] * $collab["TJ"];
    }

    $total_Produit_STT += $prod_STT; // Ajout du produit de ce collaborateur au total produit AMA

    // Affichage du produit STT
    $output .= '
        <td>'.$prod_STT.' €</td>
    ';

    // Affichage des jours vendus
    $output .= '
               <td>'.$donnees["jours_vendus"].'</td>
    ';

    // Calcul du TJM vendu
    $tjm = round($donnees["CA_vendu"] / $donnees["jours_vendus"]);
    $total_TJM_vendu += $tjm;

    // Affichage du TJM vendu
    $output .= '
               <td>'.$tjm.' €</td>
    ';

    // Calcul du RAF estimé
    $AMA = $bdd->prepare('SELECT SUM(jours)
                        AS produit_AMA
                        FROM collaborateurs as c, imputation as i
                        WHERE c.code = i.code_collab
                        AND code_projet LIKE :code_projet
                        AND societe = "AMA"
                        AND actif="1"');
    $AMA->execute(array(
    'code_projet' => $code,
    ));
    $produit_AMA = $AMA->fetch();

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
    $produit_STT = $STT->fetch();

    $temp_Produits = $produit_AMA["produit_AMA"] + $produit_STT["produit_STT"];
    $temp_RAF = $donnees["jours_vendus"] - $temp_Produits;
    $output .= '
               <td>'.$temp_Produits.'</td>
               <td>'.$temp_RAF.'</td>
               <td class="RAF_reel" data-id1="'.$donnees["id"].'" contenteditable>'.$donnees["RAF_reel"].'</td>
    ';

    // Calcul du TJ projet
    if ($donnees["RAF_reel"] == 0) {
        $TJ_Projet = round($donnees["CA_vendu"] / ($temp_Produits + $temp_RAF));
        $RAF_final = $temp_RAF;
    }
    else {
        $TJ_Projet = round($donnees["CA_vendu"] / ($temp_Produits + $donnees["RAF_reel"]));
        $RAF_final = $donnees["RAF_reel"];
    }
    $total_TJ_projet += $TJ_Projet;
    $TJ_projet_count += 1;

    // Affichage du TJ projet
    $output .= '
        <td>'.$TJ_Projet.' €</td>
    ';

    // Calcul du CA restant
    $CA_restant = $RAF_final * $TJ_Projet;
    $total_CA_restant += $CA_restant;

    // Affichage du CA restant
    $output .= '
        <td>'.$CA_restant.' €</td>
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

// Total du produit AMA
$output .= '
    <td>'.$total_Produit_AMA.' €</td>
';

// Total du produit AMA
$output .= '
    <td>'.$total_Produit_STT.' €</td>
';

// Somme des jours vendus
$JV = $bdd->query('SELECT SUM(jours_vendus) AS somme_JV FROM projet');

// Affichage du total jours vendus
$somme_JV = $JV->fetch();
$output .= '
    <th>'.$somme_JV["somme_JV"].'</th>
';

// Affichage du total TJM vendu
$output .= '
    <th>'.$total_TJM_vendu.' €</th>
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
';

// Affichage total TJ projet et CA restant total
$temp_TJ_projet = round($total_TJ_projet / $TJ_projet_count);
$output .= '
    <th>'.$temp_TJ_projet.' €</th>
    <th>'.$total_CA_restant.' €</th>
';

// Fin de la ligne des totaux
$output .= '
    </tr>
';

 $output .= '</table>
      </div>
    </div>';

 echo $output;
 ?>
