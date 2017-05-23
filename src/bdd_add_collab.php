<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['code']) && isset($_POST['societe']) && isset($_POST['TJ']) && isset($_POST['actif'])){

    $code_collab = strtoupper($_POST['code']);
    $societe = strtoupper($_POST['societe']);
    // Création du collaborateur
	$req = $bdd->prepare('INSERT INTO collaborateurs(nom, prenom, code, societe, TJ, actif) VALUES(:nom, :prenom, :code, :societe, :TJ, :actif)');
	$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'code' => $code_collab,
    'societe' => $societe,
    'TJ' => $_POST['TJ'],
    'actif' => $_POST['actif']
    ));

    // Création des imputations par défaut (nulles) pour ce collaborateur
        //Sélection de tous les projets
    $selectprojects = $bdd->query('SELECT * FROM projet');
        // Création d'une imputation nulle pour chaque projet
    while ($donnees = $selectprojects->fetch())
    {
        $mois_debut_projet = substr($donnees['date_debut'], -10, 7) . '-01';

        $req = $bdd->prepare('INSERT INTO imputation(code_projet, code_collab, jours, date_imput) VALUES(:code_projet, :code_collab, :jours, :date_imput)');
        $req->execute(array(
            'code_projet' => $donnees['code'],
            'code_collab' => $code_collab,
            'jours' => 0,
            'date_imput' => $mois_debut_projet
        ));
    }
}

else{
	echo "L'ajout n'a pas abouti...";
}
?>
