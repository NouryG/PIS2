<html>
      <head>
           <title>Table collaborateurs</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link href="assets\css\bdd_collabs.css" rel="stylesheet">
      </head>
      <body>

        <div class="header" id="header">
          <nav class="navbar navbar-inverse">
          <div class="container">
                <ul class="nav navbar-nav">
                  <li><a href="formulaire.php">Formulaire</a></li>
                  <li><a href="bdd_display_projects.php">Projets</a></li>
                  </ul>
          </div><!--/.Container -->
          </nav>
        </div><!--/.header -->

           <div class="container">
                <br />
                <br />
                <br />
                <div class="table-responsive">
                     <div id="live_data"></div>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      function fetch_data()
      {
           $.ajax({
                url:"bdd_select_collab.php",
                method:"POST",
                success:function(data){
                     $('#live_data').html(data);
                }
           });
      }
      fetch_data();
      //Ajout = Ok
      $(document).on('click', '#btn_add', function(){
           var nom = $('#nom').text();
           var prenom = $('#prenom').text();
           var societe = $('#societe').text();
           var tj = $('#tj').text();
           var actif = $('#actif').text();
           if(nom == '')
           {
                alert("Entrer Nom");
                return false;
           }
           if(prenom == '')
           {
                alert("Entrer Prenom");
                return false;
           }
           $.ajax({
                url:"bdd_add_collab.php",
                method:"POST",
                data:{nom:nom, prenom:prenom, societe:societe, tj:tj, actif:actif},
                dataType:"text",
                success:function(data)
                {
                     //alert(data);
                     fetch_data();
                }
           })
      });
      //Edition = Ok
      function edit_data(id, text, column_name)
      {
           $.ajax({
                url:"bdd_edit_collab.php",
                method:"POST",
                data:{id:id, text:text, column_name:column_name},
                dataType:"text",
                success:function(data){
                     alert(data);
                }
           });
      }
      //Pour l'édition de tout les champs
      $(document).on('blur', '.nom', function(){
           var id = $(this).data("id1");
           var nom = $(this).text();
           edit_data(id, nom, "nom");
      });
      $(document).on('blur', '.prenom', function(){
           var id = $(this).data("id2");
           var prenom = $(this).text();
           edit_data(id,prenom, "prenom");
      });
      $(document).on('blur', '.societe', function(){
           var id = $(this).data("id2");
           var societe = $(this).text();
           edit_data(id,societe, "societe");
      });
      $(document).on('blur', '.tj', function(){
           var id = $(this).data("id2");
           var tj = $(this).text();
           edit_data(id,tj, "tj");
      });
      $(document).on('blur', '.actif', function(){
           var id = $(this).data("id2");
           var actif = $(this).text();
           edit_data(id,actif, "actif");
      });

      //Suppression = Ok
      $(document).on('click', '.btn_delete', function(){
           var id=$(this).data("id3");
           if(confirm("Etes-vous sure de vouloir supprimer ce collaborateur?"))
           {
                $.ajax({
                     url:"bdd_delete_collab.php",
                     method:"POST",
                     data:{id:id},
                     dataType:"text",
                     success:function(data){
                          alert("Ok");
                          fetch_data();
                     }
                });
           }
      });
 });
 </script>
