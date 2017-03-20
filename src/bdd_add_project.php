<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['project_name']) && isset($_POST['project_code']) && isset($_POST['project_client']) && isset($_POST['project_date']) && isset($_POST['project_sold_days'])){

	$req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus) VALUES(:nom, :code, :client, :date_debut, :jours_vendus)');
	$req->execute(array(
    'nom' => $_POST['project_name'],
    'code' => $_POST['project_code'],
    'client' => $_POST['project_client'],
    'date_debut' => $_POST['project_date'],
    'jours_vendus' => $_POST['project_sold_days']
    ));

	echo "L'ajout a réussi!";
    }

else{
	echo "L'ajout n'a pas abouti..";
}



?>