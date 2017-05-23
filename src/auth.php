<?php $_SESSION['password']= "actemedia"; ?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ACTEMEDIA - Accueil</title>
        <link rel="icon" type="image/png" href="assets/ico/ms-icon-150x150.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">
    </head>

    <body>

        <!-- Content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>ACTE MEDIA</strong></h1>
                            <div class="description">
                            	<p>
	                            	Page d'authentification pour acceder aux bases de données de l'entreprise.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<h3>Login</h3>
                            	<p>Merci de saisir le mot de passe requis :</p>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" id="login-form" class="login-form">
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Entrez votre mot de passe" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Connexion</button>
                                    <center><div id="login_result"></div></center>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                        	<h3 style="color: white">RAPPEL :</h3>
                        	<p style="color: white">Cette page est réservée au personnel autorisé. Tout abus sera puni.</p>
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
        <script src='ajax_projects.js'></script>

</html>