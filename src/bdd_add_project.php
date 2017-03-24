<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['code']) && isset($_POST['client']) && isset($_POST['date_debut']) && isset($_POST['jours_vendus'])){

    $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus) VALUES(:nom, :code, :client, :date_debut, :jours_vendus)');
	$req->execute(array(
    'nom' => $_POST['nom'],
    'code' => $_POST['code'],
    'client' => $_POST['client'],
    'date_debut' => $_POST['date_debut'],
    'jours_vendus' => $_POST['jours_vendus']
    ));
    }

else{
	echo "L'ajout n'a pas abouti..";
}
?>