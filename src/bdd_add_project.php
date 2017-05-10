<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['code']) && isset($_POST['client']) && isset($_POST['date_debut']) && isset($_POST['jours_vendus']) && isset($_POST['cout_projet'])){

    if (isset($_POST['RAF_reel'])){
        $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus, CA_vendu, RAF_reel) VALUES(:nom, :code, :client, :date_debut, :jours_vendus, :CA_vendu, :RAF_reel)');
        $req->execute(array(
        'nom' => $_POST['nom'],
        'code' => $_POST['code'],
        'client' => $_POST['client'],
        'date_debut' => $_POST['date_debut'],
        'jours_vendus' => $_POST['jours_vendus'],
        'CA_vendu' => $_POST['CA_vendu'],
        'RAF_reel' => $_POST['RAF_reel']
        ));
    }
    else{
        $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus, CA_vendu, RAF_reel) VALUES(:nom, :code, :client, :date_debut, :jours_vendus, :CA_vendu, 0)');
        $req->execute(array(
        'nom' => $_POST['nom'],
        'code' => $_POST['code'],
        'client' => $_POST['client'],
        'date_debut' => $_POST['date_debut'],
        'jours_vendus' => $_POST['jours_vendus'],
        'CA_vendu' => $_POST['CA_vendu']
        ));
    }
}

else{
	echo "L'ajout n'a pas abouti..";
}
?>