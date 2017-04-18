<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['societe']) && isset($_POST['tj'])){

	$req = $bdd->prepare('INSERT INTO collaborateurs(nom, prenom, societe, tj,actif) VALUES(:nom, :prenom, :societe, :tj,:actif)');
	$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'societe' => $_POST['societe'],
    'tj' => $_POST['tj'],
		'actif' => $_POST['actif']


    ));
    }

else{
	echo "L'ajout n'a pas abouti..";
}
?>
