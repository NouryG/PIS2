<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (isset($_POST['date_imput']) && isset($_POST['code_projet']) && isset($_POST['code_collab']) && isset($_POST['jours'])) {

	// Vérification de l'existence de l'imputation, si oui on met à jour, si non on la crée
    $check = $bdd->prepare('SELECT * FROM imputation WHERE code_projet LIKE :code_projet AND code_collab LIKE :code_collab AND date_imput LIKE :date_imput');
	$check->execute(array(
	'code_projet' => $_POST['code_projet'],
	'code_collab' => $_POST['code_collab'],
	'date_imput' => $_POST['date_imput'],
	));

    if ($check->rowCount() > 0) {
        $req = $bdd->prepare('UPDATE imputation
        					SET  jours = :jours
        					WHERE date_imput LIKE :date_imput AND code_projet LIKE :code_projet AND code_collab LIKE :code_collab');
        $req->execute(array(
        'date_imput' => $_POST['date_imput'],
		'code_projet' => $_POST['code_projet'],
		'code_collab' => $_POST['code_collab'],
		'jours' => $_POST['jours']
		));
    }
    else {
        $req = $bdd->prepare('INSERT INTO imputation(date_imput, code_projet, code_collab, jours) VALUES(:date_imput, :code_projet, :code_collab, :jours)');
		$req->execute(array(
		'date_imput' => $_POST['date_imput'],
		'code_projet' => $_POST['code_projet'],
		'code_collab' => $_POST['code_collab'],
		'jours' => $_POST['jours']
		));

		// On initialise aussi une imputation pour chaque autre projet pour le nouveau mois
		$projets = $bdd->prepare('SELECT * FROM projet WHERE code <> :code_projet');
		$projets->execute(array(
			'code_projet' => $_POST['code_projet']
		));

		while ($donnees = $projets->fetch()) {
			$req = $bdd->prepare('INSERT INTO imputation(date_imput, code_projet, code_collab, jours) VALUES(:date_imput, :code_projet, :code_collab, :jours)');
			$req->execute(array(
			'date_imput' => $_POST['date_imput'],
			'code_projet' => $donnees['code'],
			'code_collab' => $_POST['code_collab'],
			'jours' => 0
			));
		}
    }
}

else {
	echo "L'ajout n'a pas abouti...";
}
?>
