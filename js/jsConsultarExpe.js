$.post("Expediente/getIndicadoresExpe.php",
      {id_exp : $("#idIExp").val()},
      function(data){
        var niño = JSON.parse(data);
            $.each(niño,function(i,item){
              $("#indicadorShowTable").append(
              '<tr>'+
                '<td>'+item.id_indicador+'</td>'+
                '<td>'+item.descripcion_indicadores+'</td>'+
              '</tr>'
              );
            });
          }
);

$.post("Expediente/getActuaciones.php",
  {id_exp : $("#idIExp").val()},
	function(data){
		var niño = JSON.parse(data);
		$.each(niño,function(i,item){
		  $("#ActuacionesShpwTable").append(
		  '<tr>'+
		    '<td>'+item.fecha_actuacion+'</td>'+
		    '<td>'+item.funcionario_actuacion+'</td>'+
		    '<td><div class="wrap2">'+item.descripcion_actuacion+'</div></td>'+
		    '<td><div class="wrap2">'+item.compromisos+'</div></td>'+
		  '</tr>'
		  );
		});
	}
);