$(document).ready(function(){
    $('#entry').on('change', function() {
      if ( this.value == 'new_project')
      {
        $("#project_form").show();
        $("#collab_form").hide();
        $("#imput_form").hide();

      }
      else if ( this.value == 'new_collab') {
        $("#collab_form").show();
        $("#project_form").hide();
        $("#imput_form").hide();
      }
      else {
        $("#project_form").hide();
        $("#collab_form").hide();
        $("#imput_form").show();
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

