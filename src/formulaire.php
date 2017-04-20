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
        <nav class="navbar-custom navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>  
                    </button>
                    <a class="navbar-brand" id=""  href="accueil.php">Acte Media - Suivi de Production</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="formulaire.php">Formulaires</a>
                        </li>
                        <li>
                            <a href="bdd_display_collabs.php">Afficher collaborateurs</a>
                        </li>
                         <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">Afficher les rapports<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  id="" class="hidden-xs"  href="">Rapport Mensuel</a>
                                    <a  id="" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Rapport Mensuel</a>
                                    <a  id="" class="hidden-xs"  href="">Rapport Annuel</a>
                                    <a  id="" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Rapport Annuel</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
              </div>
            </div>
        </nav>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text">
                            <h1><strong>Interface de Saisie</strong></h1>
                            <div class="description">
                            	<p>
	                            	Bienvenue dans la page de saisie. Merci de sélectionner l'action que vous souhaitez réaliser.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 form-box">
                        	<div class="form-group">
							  <label for="entry">Actions de saisie:</label>
								  <select class="form-control" id="entry">
								  		<option value="original" selected disabled>Séléction...</option>
									    <option value="new_project">Saisir Projet</option>
									    <option value="new_collab">Saisir Collaborateur</option>
									    <option value="new_imput">Saisir Imputation</option>
								  </select>
							</div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-8 form-box col-sm-offset-2" id="forms" >
                    			<div style="display: none;" id="project_form">
                    				<form  role="form" id="add_project">
				                        <div class="form-group">
				                        	<label style="color: white">Ajout de Projet</label>
				                        	<input type="text" placeholder="Entrez le nom du projet..." class="form-control" id="project_name" required>
				                        	<input type="text" maxlength="3" placeholder="Entrez le code du projet..." class="form-control" id="project_code" required>
				                        	<input type="text" placeholder="Entrez le nom du client..." class="form-control" id="project_client" required>
                                            <input type="text" placeholder="Entrez le RAF Réel du projet... (laisser vide si calcul normal)" class="form-control" id="project_RAF" >
				                        	<div class="input-group date form_date col-sm-8" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="width: 100%">
							                    <input class="form-control" size="16" type="text" id="project_date" readonly required>
							                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                							</div>
				                        	<input pattern='[0-9]{10}' type="number" placeholder="Entrez le nombre de jours vendus.." class="form-control" id="project_sold_days" required>
				                        </div>
			                        <button id="submit" type="submit" class="btn">Ajouter</button>
			                     </form>
                                 <center><div id="project_result"></div></center>
                    			</div>

                                <div style="display: none;" id="collab_form">
                                    <form role="form"  id="add_collab">
                                        <div class="form-group">
                                            <label style="color: white">Ajout de Collaborateur</label>
                                            <input type="text" placeholder="Entrez le nom du collaborateur..." class="form-control" id="collab_name" required>
				                        	<input type="text"  placeholder="Entrez le prénom du collaborateur..." class="form-control" id="collab_surname" required>
				                        	<input type="text"  maxlength="3" placeholder="Entrez le code société du collaborateur..." class="form-control" id="collab_company" required>
				                        	<input pattern='[0-9]{10}' type="number" placeholder="Entrez son tarif journalier" class="form-control" id="collab_price" required>
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
                                            <label for="code_projet" style="color: white; font-weight:200;">Séléctionner le code du projet:</label>
                                            <select class="form-control" id="code" required>
                                            <?php
                                            $conn = new mysqli('localhost', 'root', 'root', 'ACTEMEDIA') 
                                            or die ('Cannot connect to db');

                                                $result = $conn->query("select code from projet");

                                                while ($row = $result->fetch_assoc()) {

                                                              unset($code);
                                                              $code = $row['code'];
                                                              echo '<option value="'.$code.'">'.$code.'</option>';

                                            }
                                            ?> </select>
                                            <label for="code_collab" style="color: white;font-weight:200;">Séléctionner le code du collaborateur: </label>
                                            <select class="form-control" id="code" required></select>
                                            <input type="text"   placeholder="Entrez le nombre de jours travaillés..." class="form-control" id="" required>
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
        </script>


    </body>

</html>
