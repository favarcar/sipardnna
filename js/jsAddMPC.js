
$("#cual_mun").hide();
  $("#municipio_nna").change(function(){
    if($("#municipio_nna").val()== "OTRO"){
      $("#cual_mun").show();
      $("#mun_aux").val("");
    }else{
      $("#cual_mun").hide();
      $("#cual_aux").val("NA");
    }
  });