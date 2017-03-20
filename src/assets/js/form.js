$(document).ready(function(){
    $('#entry').on('change', function() {
      if ( this.value == 'new_project')
      {
        $("#project_form").show();
        $("#collab_form").hide();
        $("#imput_form").hide();
        $("#project_display").hide();
        $("#collab_display").hide();
        $("#imput_display").hide();

      }
      else if ( this.value == 'new_collab') {
        $("#collab_form").show();
        $("#project_form").hide();
        $("#imput_form").hide();
        $("#project_display").hide();
        $("#collab_display").hide();
        $("#imput_display").hide();
      }
      else {
        $("#project_form").hide();
        $("#collab_form").hide();
        $("#imput_form").show();
        $("#project_display").hide();
        $("#collab_display").hide();
        $("#imput_display").hide();
      }
    });
});

$(document).ready(function(){
    $('#display').on('change', function() {
      if ( this.value == 'display_projects')
      {
        $("#project_display").show();
        $("#project_form").hide();
        $("#collab_form").hide();
        $("#imput_form").hide();
        $("#collab_display").hide();
        $("#imput_display").hide();
      }
      else if ( this.value == 'display_collabs')
      {
        $("#project_display").hide();
        $("#project_form").hide();
        $("#collab_form").hide();
        $("#imput_form").hide();
        $("#collab_display").show();
        $("#imput_display").hide();
      }
      else{
        $("#project_display").hide();
        $("#project_form").hide();
        $("#collab_form").hide();
        $("#imput_form").hide();
        $("#collab_display").hide();
        $("#imput_display").show();
      }
    });
});


$(document).ready(function(){
  $("#entry").change(function () {
    $('#display option').prop('selected', function() {
        return this.defaultSelected;
    })
  });
});

$(document).ready(function(){
  $("#display").change(function () {
    $('#entry option').prop('selected', function() {
        return this.defaultSelected;
    })
  });
});