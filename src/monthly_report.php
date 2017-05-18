<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rapport mensuel</title>
        <link rel="icon" type="image/png" href="assets/ico/ms-icon-150x150.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all">

        <!-- Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar-custom navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>  
                    </button>
                    <a class="navbar-brand" href="accueil.php">Acte Media - Suivi de Production</a>
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
        <br><br><br><br>
         <div class="row">
                        <div class="col-sm-4 form-box col-sm-offset-2" id="forms" >
                                <div >
                                    <form  role="form" id="select_month">
                                        <div class='input-group date' id='datetimepicker10'>
                                            <input  class="form-control" size="16" type="text" id="chosen_month" readonly required placeholder="Sélectionnez le mois :"/>
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </form>
                                    <div style="display: none;" id="report"></div>
                                </div>
                            </div>
                        </div>

        <!-- Content -->
        <div class="container">
            <br />
            <br />
            <div class="table-responsive">
                <div id="live_data"></div>
            </div>
        </div>
      </body>
 </html>

<!-- Scripts Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.fr.js"></script>
        <script type="text/javascript">

 $('#datetimepicker10').datetimepicker({
            language : 'fr',
            todayBtn1 : 1,
            startView: 3,
            minView: 3,
            maxView: 4,
            autoclose: 1,
            format: 'yyyy-mm'
        });

 $("#chosen_month").change(function() {
    var chosen_month = $("#chosen_month").val();
    var dataString = 'chosen_month=' + chosen_month +'-01';
    $.ajax({
        type:"POST",
        url:"select_monthly_report.php",
        data: dataString,
        cache: false,
        success: function(data){

            $("#report").html(data);
            $("#report").show();
        }

    });
    return false;
});


 </script>
