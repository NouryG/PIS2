<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['collab_name']) && isset($_POST['collab_surname']) && isset($_POST['collab_company']) && isset($_POST['collab_price'])){

	$req = $bdd->prepare('INSERT INTO collaborateurs(nom, prenom, societe, TJ) VALUES(:nom, :prenom, :societe, :TJ)');
	$req->execute(array(
    'nom' => $_POST['collab_name'],
    'prenom' => $_POST['collab_surname'],
    'societe' => $_POST['collab_company'],
    'TJ' => $_POST['collab_price']
    ));

	echo "L'ajout a réussi!";
    }

else{
	echo "L'ajout n'a pas abouti..";
}



?>