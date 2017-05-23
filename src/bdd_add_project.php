<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if( isset($_POST['nom']) && isset($_POST['code']) && isset($_POST['client']) && isset($_POST['date_debut']) && isset($_POST['jours_vendus']) && isset($_POST['CA_vendu'])){

	$code_projet = strtoupper($_POST['code']);
    if (isset($_POST['RAF_reel'])){
        $req = $bdd->prepare('INSERT INTO projet(nom, code, client, date_debut, jours_vendus, CA_vendu, RAF_reel) VALUES(:nom, :code, :client, :date_debut, :jours_vendus, :CA_vendu, :RAF_reel)');
        $req->execute(array(
        'nom' => $_POST['nom'],
        'code' => $code_projet,
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
        'code' => $code_projet,
        'client' => $_POST['client'],
        'date_debut' => $_POST['date_debut'],
        'jours_vendus' => $_POST['jours_vendus'],
        'CA_vendu' => $_POST['CA_vendu']
        ));
    }

    // Ajout d'une imputation à 0 jours sur ce nouveau projet pour chaque collaborateur existant
    $reponse = $bdd->query('SELECT * FROM collaborateurs'); // Sélection de tous les collaborateurs
    $mois_debut_projet = substr($_POST['date_debut'], -10, 7) . '-01'; // Date de l'imputation : 1er jour du mois de début du projet

    while ($donnees = $reponse->fetch())
    {
        $req = $bdd->prepare('INSERT INTO imputation(date_imput, code_projet, code_collab, jours) VALUES(:date_imput, :code_projet, :code_collab, :jours)');
        $req->execute(array(
            'date_imput' => $mois_debut_projet,
            'code_projet' => $code_projet,
            'code_collab' => $donnees['code'],
            'jours' => 0
        ));
    }

}

else{
	echo "L'ajout n'a pas abouti...";
}
?>