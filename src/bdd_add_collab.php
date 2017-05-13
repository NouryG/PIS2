<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['code']) && isset($_POST['societe']) && isset($_POST['TJ'])){

    // Création du collaborateur
	$req = $bdd->prepare('INSERT INTO collaborateurs(nom, prenom, code, societe, TJ, actif) VALUES(:nom, :prenom, :code, :societe, :TJ, :actif)');
	$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'code' => $_POST['code'],
    'societe' => $_POST['societe'],
    'TJ' => $_POST['TJ'],
    'actif' => $_POST['actif']
    ));

    // Création des imputations par défaut (nulles) pour ce collaborateur
        //Sélection de tous les projets
    $selectprojects = $bdd->query('SELECT * FROM projet');

        // Création d'une imputation nulle pour chaque projet
    while ($donnees = $selectprojects->fetch())
    {
        $code = $donnees['code'];
        $req = $bdd->prepare('INSERT INTO imputation(code_projet, code_collab, jours) VALUES(:code_projet, :code_collab, :jours)');
        $req->execute(array(
        'code_projet' => $code,
        'code_collab' => $_POST['code'],
        'jours' => 0
        ));
    }
}

else{
	echo "L'ajout n'a pas abouti..";
}
?>
