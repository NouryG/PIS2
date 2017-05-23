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
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ACTEMEDIA - Formulaires</title>
        <link rel="icon" type="image/png" href="assets/ico/ms-icon-150x150.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar-custom navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>  
                    </button>
                    <a href="accueil.php"><img src="assets\ico\logo_horizontal_RVB_md.jpg"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="formulaire.php">Formulaires</a>
                        </li>
                        <li>
                            <a href="bdd_display_collabs.php">Collaborateurs</a>
                        </li>
                        <li>
                            <a href="bdd_display_projects.php">Projets</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Afficher les rapports <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  id="" class="hidden-xs"  href="monthly_report.php">Rapport Mensuel</a>
                                    <a  id="" class="visible-xs" href="monthly_report.php" data-toggle="collapse" data-target=".navbar-collapse">Rapport Mensuel</a>
                                    <a  id="" class="hidden-xs"  href="annual_report.php">Rapport Annuel</a>
                                    <a  id="" class="visible-xs" href="annual_report.php" data-toggle="collapse" data-target=".navbar-collapse">Rapport Annuel</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
              </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="top-content" style="margin-top: 30px;">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text">
                            <h1><strong>Interface d'ajout</strong></h1>
                            <div class="description">
                            	<p>
	                            	Bienvenue dans la page d'ajout. Merci de sélectionner l'action que vous souhaitez réaliser.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 form-box">
                        	<div class="form-group">
							  <label for="entry">Action de saisie :</label>
								  <select class="form-control" id="entry">
								  		<option value="original" selected disabled>Séléction...</option>
									    <option value="new_project">Ajouter un projet</option>
									    <option value="new_collab">Ajouter un collaborateur</option>
									    <option value="new_imput">Saisir une imputation</option>
								  </select>
							</div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-8 form-box col-sm-offset-2" id="forms" >
                    			<div style="display: none;" id="project_form">
                    				<form  role="form" id="add_project">
				                        <div class="form-group">
				                        	<label style="color: white">Ajout de projet</label>
				                        	<input type="text" placeholder="Nom du projet" class="form-control" id="project_name" required>
				                        	<input type="text" maxlength="3" placeholder="Code du projet" class="form-control" id="project_code" required>
				                        	<input type="text" placeholder="Nom du client" class="form-control" id="project_client" required>
				                        	<div class="input-group date form_date col-sm-8" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="width: 100%" placeholder="Date de début du projet">
							                    <input class="form-control" size="16" type="text" id="project_date" readonly required placeholder="Sélectionnez la date de début du projet">
							                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                							</div>
                                            <input pattern='[0-9]{10}' type="number" placeholder="Nombre de jours vendus" class="form-control" id="project_sold_days" required>
                                            <input pattern='[0-9]{10}' type="number" placeholder="RAF Réel (laisser vide pour un calcul automatique)" class="form-control" id="project_raf">
                                            <input pattern='[0-9]{10}' type="number" placeholder="CA Vendu" class="form-control" id="project_price">
				                        </div>
			                        <button id="submit" type="submit" class="btn">Ajouter</button>
			                     </form>
                                 <center><div id="project_result"></div></center>
                    			</div>

                                <div style="display: none;" id="collab_form">
                                    <form role="form"  id="add_collab">
                                        <div class="form-group">
                                            <label style="color: white">Ajout de collaborateur</label>
                                            <input type="text" placeholder="Entrez le nom du collaborateur..." class="form-control" id="collab_name" required>
				                        	<input type="text"  placeholder="Entrez le prénom du collaborateur..." class="form-control" id="collab_surname" required>
                                            <input type="text" maxlength="3" placeholder="Entrez le code du collaborateur..." class="form-control" id="collab_code" required>
				                        	<input type="text"  maxlength="3" placeholder="Entrez le code société du collaborateur..." class="form-control" id="collab_company" required>
				                        	<input pattern='[0-9]{10}' type="number" placeholder="Entrez son tarif journalier" class="form-control" id="collab_price" required>
                                            <label style="color: white; font-weight:200;">Le collaborateur est :</label>
                                            <label style="color: white; font-weight:200;" class="radio-inline">
                                                <input checked type="radio" name="activity" value="1" > Actif
                                                </label>
                                                <label style="color: white; font-weight:200;" class="radio-inline">
                                                <input type="radio" name="activity" value="0"> Inactif
                                            </label>
				                        </div>
			                        <button id="submit" type="submit" class="btn">Ajouter</button>
                                        </div>
                                    </form>
                                    <center><div id="collab_result"></div></center>
                                </div>

                                <div class="col-sm-8 form-box col-sm-offset-2" style="display: none;" id="imput_form">
                                    <form role="form"  id="add_imput">
                                        <div class="form-group">
                                            <label style="color: white; margin-bottom: 30px;">Ajout d'imputation</label><br>

                                            <div class='input-group date' id='datetimepicker10'>
                                                <input  class="form-control" size="16" type="text" id="imput_date" readonly required placeholder="Sélectionnez le mois d'imputation"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>

                                            <label for="code_collab_1" style="color: white;font-weight:200;">Sélectionner le collaborateur : </label>
                                            <select class="form-control" id="code_collab_1" required>
                                                <?php
                                                $conn = new mysqli('localhost', 'root', 'root', 'ACTEMEDIA') 
                                                or die ('Cannot connect to db');

                                                    $result = $conn->query("select * from collaborateurs");

                                                    while ($row = $result->fetch_assoc()) {
                                                                  unset($code);
                                                                  unset($nom);
                                                                  $code = $row['code'];
                                                                  $nom = $row['nom'];
                                                                  echo '<option value="'.$code.'">'.$nom.'</option>';
                                                    }
                                                ?>
                                            </select>

                                            <div style="display: none;" id="actual_imputs"></div>

                                            <label for="code_projet_1" style="color: white; font-weight:200;">Pour ajouter une imputation, sélectionner le projet et entrez le nombre de jours travaillés :</label>
                                            <select class="form-control" id="code_projet_1" required>
                                                <?php
                                                $conn = new mysqli('localhost', 'root', 'root', 'actemedia') 
                                                or die ('Cannot connect to db');

                                                    $result = $conn->query("select * from projet");

                                                    while ($row = $result->fetch_assoc()) {
                                                                  unset($nom);
                                                                  unset($code);
                                                                  $nom = $row['nom'];
                                                                  $code = $row['code'];
                                                                  echo '<option value="'.$code.'">'.$nom.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <input pattern='[0-9]{10}' type="number" placeholder="Entrez le nombre de jours travaillés" class="form-control" id="worked_days" required>
                                        </div>
                                    <button id="submit" type="submit" class="btn">Ajouter</button>
                                        </div>
                                    </form>
                                    <center><div id="imput_result"></div></center>
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
        <script src='ajax_projects.js'></script>
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
        $('#datetimepicker10').datetimepicker({
            language : 'fr',
            todayBtn1 : 1,
            startView: 3,
            minView: 3,
            maxView: 4,
            autoclose: 1,
            format: 'yyyy-mm'
        });
        </script>

    </body>

</html>
