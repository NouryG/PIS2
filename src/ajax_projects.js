

$("#add_project").submit(function(event){
	event.preventDefault();
	var name = $("#project_name").val();
	var code = $("#project_code").val();
	var client = $("#project_client").val();
	var date = $("#project_date").val();
	var sold_days = $("#project_sold_days").val();
	var project_price = $("#project_price").val();
	var raf_reel = $("#project_raf").val();
	var dataString = 'nom='+ name + '&code='+ code + '&client='+ client + '&date_debut='+ date + '&jours_vendus='+ sold_days + '&CA_vendu=' + project_price + '&RAF_reel=' + raf_reel;
	if(name==''||code==''||client==''||date==''||sold_days=='' ||project_price=='')
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
	var code = $("#collab_code").val();
	var company = $("#collab_company").val();
	var price = $("#collab_price").val();
	var activity = $("input[name=activity]:checked").val()
	var dataString = 'nom='+ name + '&prenom='+ surname + '&code=' + code +'&societe='+ company + '&TJ='+ price + '&actif=' + activity;
	if(name==''||surname==''||code==''||company==''||price=='')
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

$("#add_imput").submit(function(event){
	event.preventDefault();
	var imput_date = $("#imput_date").val();
	var code_projet = $("#code_projet_1 option:selected").val();
	var code_collab = $("#code_collab_1 option:selected").val();
	var worked_days = $("#worked_days").val();
	var dataString = 'date_imput=' + imput_date +'-01' + '&code_projet='+ code_projet + '&code_collab='+ code_collab + '&jours=' + worked_days;
	if(imput_date=='' || code_projet==''||code_collab==''||worked_days=='')
		{
		alert("Merci de remplir tous les champs");
		}
	else
		{

			$.ajax({
			type: "POST",
			url: "bdd_add_imput.php",
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

$("#imput_date").change(function() {
	var imput_date = $("#imput_date").val();
	var code_collab = $("#code_collab_1 option:selected").val();
	var dataString = 'date_imput=' + imput_date +'-01' +'&code_collab=' + code_collab;
	$.ajax({
		type:"POST",
		url:"bdd_display_imput.php",
		data: dataString,
		cache: false,
		success: function(data){
			$("#actual_imputs").html(data);
			$("#actual_imputs").show();
		}

	});
	return false;
});


$("#code_collab_1").change(function() {
	var imput_date = $("#imput_date").val();
	var code_collab = $("#code_collab_1 option:selected").val();
	var dataString = 'date_imput=' + imput_date +'-01' +'&code_collab=' + code_collab;
	$.ajax({
		type:"POST",
		url:"bdd_display_imput.php",
		data: dataString,
		cache: false,
		success: function(data){
			$("#actual_imputs").html(data);
			$("#actual_imputs").show();
		}

	});
	return false;
});

//Edition
function edit_data(id, text, column_name)
{
		 $.ajax({
					url:"bdd_edit_imput.php",
					method:"POST",
					data:{id:id, text:text, column_name:column_name},
					dataType:"text",

		 });
}

//Pour l'edition des jours
$(document).on('blur', '.jours', function(){
		 var id = $(this).data("id1");
		 var code = $(this).text().toUpperCase();
		 edit_data(id, code, "jours");
		 //alert(id);
});
//Suppression Imputation
$(document).on('click', '.btn_delete', function(){
		 var id=$(this).data("id2");
		 if(confirm("Etes-vous sûr de vouloir supprimer cette imputation?"))
		 {
					$.ajax({
							 url:"bdd_delete_imput.php",
							 method:"POST",
							 data:{id:id},
							 dataType:"text",
							 success:function(data){
								 //Afficher de nouveau le tableau
							 }
					});
		 }
});
