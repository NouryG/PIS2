<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['societe']) && isset($_POST['TJ'])){

	$req = $bdd->prepare('INSERT INTO collaborateurs(nom, prenom, societe, TJ) VALUES(:nom, :prenom, :societe, :TJ)');
	$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'societe' => $_POST['societe'],
    'TJ' => $_POST['TJ']
    ));
    }

else{
	echo "L'ajout n'a pas abouti..";
}
?>
