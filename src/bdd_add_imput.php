<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['code_projet']) && isset($_POST['code_collab']) && isset($_POST['jours'])) {

	// Vérification de l'existence de l'imputation, si oui on met à jour, si non on la crée
    $check = $bdd->prepare('SELECT * FROM imputation WHERE code_projet LIKE :code_projet AND code_collab LIKE :code_collab');
	$check->execute(array(
	'code_projet' => $_POST['code_projet'],
	'code_collab' => $_POST['code_collab'],
	));

    if ($check->rowCount() > 0) {
        $req = $bdd->prepare('UPDATE imputation
        					SET jours = :jours
        					WHERE code_projet LIKE :code_projet AND code_collab LIKE :code_collab');
        $req->execute(array(
		'code_projet' => $_POST['code_projet'],
		'code_collab' => $_POST['code_collab'],
		'jours' => $_POST['jours']
		));
    }
    else {
        $req = $bdd->prepare('INSERT INTO imputation(code_projet, code_collab, jours) VALUES(:code_projet, :code_collab, :jours)');
		$req->execute(array(
		'code_projet' => $_POST['code_projet'],
		'code_collab' => $_POST['code_collab'],
		'jours' => $_POST['jours']
		));
    }
}

else {
	echo "L'ajout n'a pas abouti..";
}
?>
