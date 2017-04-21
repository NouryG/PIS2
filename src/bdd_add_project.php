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

    if (isset($_POST['RAF_reel'])){
        $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus, RAF_reel) VALUES(:nom, :code, :client, :date_debut, :jours_vendus, :RAF_reel)');
        $req->execute(array(
        'nom' => $_POST['nom'],
        'code' => $_POST['code'],
        'client' => $_POST['client'],
        'date_debut' => $_POST['date_debut'],
        'jours_vendus' => $_POST['jours_vendus'],
        'RAF_reel' => $_POST['RAF_reel']
        ));
    }
    else{
        $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus, RAF_reel) VALUES(:nom, :code, :client, :date_debut, :jours_vendus, 0)');
        $req->execute(array(
        'nom' => $_POST['nom'],
        'code' => $_POST['code'],
        'client' => $_POST['client'],
        'date_debut' => $_POST['date_debut'],
        'jours_vendus' => $_POST['jours_vendus']
        ));
    }
}

else{
	echo "L'ajout n'a pas abouti..";
}
?>