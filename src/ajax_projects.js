

$("#add_project").submit(function(event){
	event.preventDefault();
	var name = $("#project_name").val();
	var code = $("#project_code").val();
	var client = $("#project_client").val();
	var date = $("#project_date").val();
	var sold_days = $("#project_sold_days").val();
	// Returns successful data submission message when the entered information is stored in database.
	var dataString = 'nom='+ name + '&code='+ code + '&client='+ client + '&date_debut='+ date + '&jours_vendus='+ sold_days ;
	if(name==''||code==''||client==''||date==''||sold_days=='')
		{
		alert("Merci de remplir tous les champs");
		}
	else
		{

			$.ajax({
			type: "POST",
			url: "bdd_add_project.php",
			data: dataString,
			cache: false,
			success: function(result){
				$("#project_result").html('Ajout réussi'); 
              	$("#project_result").addClass("alert alert-success");
              	$("#project_result").fadeTo(2000, 500).slideUp(500, function(){
    			$("#project_result").slideUp(500);
				});
              	$('#add_project').trigger("reset");}
              	
			});

		}
	return false;

});


$("#add_collab").submit(function(event){
	event.preventDefault();
	var name = $("#collab_name").val();
	var surname = $("#collab_surname").val();
	var company = $("#collab_company").val();
	var price = $("#collab_price").val();
	var dataString = 'nom='+ name + '&prenom='+ surname + '&societe='+ company + '&TJ='+ price;
	if(name==''||surname==''||company==''||price=='')
		{
		alert("Merci de remplir tous les champs");
		}
	else
		{

			$.ajax({
			type: "POST",
			url: "bdd_add_collab.php",
			data: dataString,
			cache: false,
			success: function(result){
				$("#collab_result").html('Ajout réussi'); 
              	$("#collab_result").addClass("alert alert-success");
              	$("#collab_result").fadeTo(2000, 500).slideUp(500, function(){
    			$("#collab_result").slideUp(500);
				});
              	$('#add_collab').trigger("reset");}
			});
		}
	return false;
});