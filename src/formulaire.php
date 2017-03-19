<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ACTEMEDIA;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Interface de Saisie</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css">



        <!-- Favicon pour logo des pages -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
        <link rel="manifest" href="assets/ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>

        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text">
                            <h1><strong>Interface de Saisie</strong></h1>
                            <div class="description">
                            	<p>
	                            	Bienvenue dans la page de gestion. Merci de sélectionner l'action que vous souhaitez réaliser.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-box">
                        	<div class="form-group">
							  <label for="entry">Actions de saisie:</label>
								  <select class="form-control" id="entry">
								  		<option value="original" selected disabled>Séléction...</option>
									    <option value="new_project">Saisir Projet</option>
									    <option value="new_collab">Saisir Collaborateur (en cours)</option>
									    <option value="new_imput">Saisir Imputation (en cours)</option>
								  </select>
							</div>
                        </div>
                        <div class="col-sm-6 form-box">
                        	<div class="form-group">
							  <label for="display">Actions d'affichage: </label>
								  <select class="form-control" id="display">
								  		<option value="original" selected disabled>Séléction...</option>
									    <option value="display_projects">Afficher Projets</option>
									    <option>Autre (?)</option>
									    <option>Autre (?)</option>
								  </select>
							</div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-8 form-box col-sm-offset-2" id="forms" >
                    			<div style="display: none;" id="project_form">
                    				<form role="form"  action="SCRIPT_PHP_BDD.php" method="post">
				                        <div class="form-group">
				                        	<label style="color: white">Ajout de Projet</label>
				                        	<input type="text" placeholder="Entrez le nom du projet..." class="form-control" name="project_name">
				                        	<input type="text" placeholder="Entrez le code du projet..." class="form-control" name="project_code">
				                        	<input type="text" placeholder="Entrez le nom du client..." class="form-control" name="project_client">
				                        	<div class="input-group date form_date col-sm-8" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="width: 100%">
							                    <input class="form-control" size="16" type="text" name="project_date" readonly>
							                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                							</div>
				                        	<input type="number" value=0 placeholder="Entrez le nombre de jours vendus" class="form-control" name="project_sold_days">
				                        </div>
			                        <button type="submit" class="btn">Ajouter</button>
			                     </form>
                    			</div>

                                <div style="display: none;" id="collab_form">
                                    <form role="form"  action="SCRIPT_PHP_BDD.php" method="post">
                                        <div class="form-group">
                                            <label style="color: white">Ajout de Collaborateur</label>
                                        </div>
                                    </form>
                                </div>

                                <div style="display: none;" id="imput_form">
                                    <form role="form"  action="SCRIPT_PHP_BDD.php" method="post">
                                        <div class="form-group">
                                            <label style="color: white">Ajout d'imputation</label>
                                        </div>
                                    </form>
                                </div>

                    	</div>
                        <div class="col-sm-8 form-box col-sm-offset-2" id="displays">
                            <div style="display: none;" id="project_display">
                            <form action="bdd_display_projects.php" method="post">
                                <button type="submit" class="btn">Afficher les projets de la BDD</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/form.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.fr.js"></script>
        <script type="text/javascript">
		$('.form_date').datetimepicker({
	        language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
   		 });
</script>


    </body>

</html>

<!--
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Formulaires</title>
       <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   </head>
   
</html>


	<body>

		<h1> CONTENU BDD : </h1>
		<?php
		$reponse = $bdd->query('SELECT * FROM jeux_video');
		while ($donnees = $reponse->fetch())
		{
			?>
			<p>
				<strong>Nom du jeu : </strong><?php echo $donnees['nom']?>
			</p>
		
		<?php
		}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
		

		<h1>FORMULAIRE POUR TTH</h1>
		<p>Affichage les jeux d'une personne:</p>
		
		<form action="bdd.php" method="post">
			<p>
				<input type="text" name="possesseur" /> 
				<!-- <textarea name="message" rows="8" cols="45">Votre message ici.</textarea>
				<select name="choix">
					<option value="choix1">Choix 1</option>
					<option value="choix2">Choix 2</option>
					<option value="choix3">Choix 3</option>
					<option value="choix4">Choix 4</option>
					</select>
				<input type="checkbox" name="case" id="case" /> <label for="case">Ma case à cocher</label>
				<input type="submit" value="Valider" />
			</p>
		</form>

		<p>Ajouter un jeu à la BDD:</p>
		<form method="post" action="bdd_modify.php"> 
		<p>Nom du jeu:</p>
        <input type="text" name="nom" maxlength="30"/>
        <p>Possesseur:</p> 
        <input type="text" name="possesseur" /> 
        <p>Console:</p> 
        <input type="text" name="console" /> 
        <p>Prix:</p>
        <input type="text" name="prix" /> 
        <p>Nombre de joueurs max :</p>
        <input type="text" name="nbre_joueurs_max" /> 
        <p>Description du jeu:</p>
        <textarea name="commentaires" rows="8" cols="45"></textarea> 
        <input type="submit" value="" id="submit" name="submit" />
    </form> 

    <p>Modifier une entrée d'un jeu: </p>

   </body> -->