  $(function() {
        $( "#fecha_hechos" ).datepicker({
            dateFormat : 'yy-mm-dd',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '0d'
        });
        $( "#fecha_nna" ).datepicker({
            dateFormat : 'yy-mm-dd',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '0d'
        });
});
 
  $("#cual_vinculo").hide();
  $("#vinculo_agresor").change(function(){
    if($("#vinculo_agresor").val()== "OTRO"){
      $("#cual_vinculo").show();
      $("#vinculo_aux").val("");
    }else{
      $("#cual_vinculo").hide();
      $("#vinculo_aux").val("NA");
    }
  });
  $("#cual_eps").hide();
  $("#eps_nna").change(function(){
    if($("#eps_nna").val()== "OTRO"){
      $("#cual_eps").show();
      $("#eps_aux").val("");
    }else{
      $("#cual_eps").hide();
      $("#eps_aux").val("NA");
    }
  });
  $("#cual_mun").hide();
  $("#municipio_in").change(function(){
    if($("#municipio_in").val()== "OTRO"){
      $("#cual_mun").show();
      $("#mun_aux").val("");
    }else{
      $("#cual_mun").hide();
      $("#cual_aux").val("NA");
    }
  });

  

  $("#nextRegistro").click(function(){
      $("#registro1").hide();
      $("#registro2").show();
  });

 