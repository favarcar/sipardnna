$("#RegistroExp").hide();
$("#addActuacion").hide();
$("#ConsultarExp").hide();

$(function () {
  $("#finalizacion_exp").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: '-100y:c+nn'

  });

  $("#FechaActuacion").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: '-100y:c+nn'
  });
});
$('#expeTable').DataTable({
  "language": {
    "emptyTable": "No hay datos disponibles en la tabla.",
    "info": "Del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty": "Mostrando 0 registros de un total de 0.",
    "infoFiltered": "(filtrados de un total de _MAX_ registros)",
    "infoPostFix": "(actualizados)",
    "lengthMenu": "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar Ni&ntilde;o, Ni&ntilde;a o Adolescente:",
    "searchPlaceholder": "Dato para buscar",
    "zeroRecords": "No se han encontrado coincidencias.",
    "paginate": {
      "first": "Primera",
      "last": "Última",
      "next": "Siguiente",
      "previous": "Anterior"
    },
    "aria": {
      "sortAscending": "Ordenación ascendente",
      "sortDescending": "Ordenación descendente"
    }
  },
  'destroy': true,
  'paging': true,
  'pageLength': 5,
  'info': true,
  'lengthChange': true,
  'filter': true,
  'responsive': true,
  'stateSave': false,
  "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
  "iDisplayLength": 5,
  "bJQueryUI": false,
  'ajax': {
    "url": "Expediente/RegistrarConsularExpediente.php",
    "type": "POST",
    dataSrc: ''
  },
  'columns': [
    { data: 'Nombres' },
    { data: 'No_identificacion' },
    { data: 'id_pais' },
    { data: 'id_departamento' },
    { data: 'id_municipio' },
    { data: 'id_provincia' },
    { data: 'Edad' }    
  ],
  "columnDefs": [

    {
      "targets": [0],
      "data": "Nombres",
      "render": function (data, type, row) {
        return "<span class='dt-body-left'>" + data + " " + row.Apellidos + "</span>";

      }

    },
    {
      "targets": [2],
      "data": "id_pais",
      "render": function (data, type, row) {        
        return "<span class='dt-body-left'>" + row.nompais + "</span>";
      }
    }
    ,
    {
      "targets": [3],
      "data": "id_departamento",
      "render": function (data, type, row) {
        return "<span class='dt-body-left'>" + row.descripcion + "</span>";
      }
    },
    {
      "targets": [4],
      "data": "id_municipio",
      "render": function (data, type, row) {

        return "<span class='dt-body-left'>" + row.nomdes + "</span>";
      }

    },
    {
      "targets": [5],
      "data": "id_provincia",
      "render": function (data, type, row) {
        return "<span class='dt-body-left'>  " + row.descripcion_prov + "</span>";

      }

    },
    {
      "targets": [7],      
      "render": function (data, type, row) {
        return '<div class="btn-group btn-group-xs"><a type="button" class="btn btn-success"  onClick="getEstadoExpediente(' + row.id_ninnos + ')" title="Consultar Expediente"><i class="fa fa-search"></i></a></div>';
      }
    },
  ],
});

function getEstadoExpediente(idNino) {
  $.post("Expediente/EstadoExpediente.php",
    { id_ninoa: idNino },
    function (data) {
      var exp = JSON.parse(data);
      $.each(exp, function (i, item) {
        $("#EstadoExp").val(item.CONTADOR);
        $("#idIExp").val(item.codigo);
      });
      consultarExpediente(idNino);
    }
  );
}

function consultarExpediente(idNino) {
  if ($("#EstadoExp").val() > 0) {
    getExpeIndicadores($("#idIExp").val());
    getExpeActuaciones($("#idIExp").val());
    showRegistroExpe(idNino);
    showExpe(idNino);
    $("#ConsultarExp").show();
    $("#RegistroExp").hide();
    $("#ConsultaExp").hide();
    $("#addActuacion").hide();
  } else {
    alert("No se encontraron expedientes se procederá a crearlo");
    showRegistroExpe2(idNino);
    $("#RegistroExp").show();
    $("#ConsultaExp").hide();
  }
}


function showRegistroExpe(idNino) {
  $.post("Expediente/buscarNino.php",
    { id_ninoa: idNino },
    function (data) {
      var niño = JSON.parse(data);
      var f = new Date();
      $.each(niño, function (i, item) {
        $("#idSnino").val(item.id_ninnos);
        $("#fechaS_exp").val(f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
        $("#nomS_nna_exp").val(item.Nombres + " " + item.Apellidos);
        $("#numS_nna_exp").val(item.No_identificacion);
        if (item.Nombres_cuidadores === undefined) {
          $("#nomS_mpa_exp").val("No hay registro de cuidador");
          $("#numS_mpa_exp").val("No hay registro de cuidador");
          $("#cuidadoresS_exp").val("No hay registro de cuidador");
        } else {
          $("#nomS_mpa_exp").val(item.Nombres_cuidadores + " " + item.Apellidos_cuidadores);
          $("#numS_mpa_exp").val(item.No_Cedula);
          $("#cuidadoresS_exp").val(item.id_cuidadores);
        }


      });
    }
  );
}

function showRegistroExpe2(idNino) {
  $.post("Expediente/buscarNino.php",
    { id_ninoa: idNino },
    function (data) {
      var niño = JSON.parse(data);
      var f = new Date();
      $.each(niño, function (i, item) {
        $("#idnino").val(item.id_ninnos);
        $("#fecha_exp").val(f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate());
        $("#nom_nna_exp").val(item.Nombres + " " + item.Apellidos);
        $("#num_nna_exp").val(item.No_identificacion);
        if (item.Nombres_cuidadores === undefined) {
          $("#nom_mpa_exp").val("No hay registro de cuidador");
          $("#num_mpa_exp").val("No hay registro de cuidador");
          $("#cuidadores_exp").val("No hay registro de cuidador");
        } else {
          $("#nom_mpa_exp").val(item.Nombres_cuidadores + " " + item.Apellidos_cuidadores);
          $("#num_mpa_exp").val(item.No_Cedula);
          $("#cuidadores_exp").val(item.id_cuidadores);
        }


      });
    }
  );
}

function showExpe(idNino) {
  $.post("Expediente/getExpediente.php",
    { id_ninnos: idNino },
    function (data) {
      var niño = JSON.parse(data);
      var f = new Date();
      $.each(niño, function (i, item) {
        $("#num_show_pro").val(item.NUMERO_PROCESO);
        $("#fecha_show_exp").val(item.Fecha_inicio_expediente);
        $("#cuidadores_show_exp").val("0");
        $("#discapacidad_show_exp").val(item.descripcion_discapacidades);
        $("#maltratos_show_exp").val(item.descripcion_maltratos);
        $("#victima_show_exp").val(item.descripcion_victimas);
        $("#descripcion_show_exp").val(item.Descripcion_expediente);
        $("#derechos_show_exp").val(item.descripcion_derechos);
        $("#obs_show_exp").val(item.Observacion);
        $("#finalizacion_show_exp").val(item.Fecha_finalizacion_expediente);
        $("#entidad_show_exp").val(item.descripcion_entidades);
        $("#estadocaso_show_exp").val(item.descripcion_estado_caso);
        $("#concepto_show").val(item.Veredicto_Caso);
      });
    }
  );
}

function getExpeIndicadores(idExp) {
  $.post("Expediente/getIndicadoresExpe.php",
    { id_exp: idExp },
    function (data) {
      var niño = JSON.parse(data);
      $.each(niño, function (i, item) {
        $("#indicadorShowTable").append(
          '<tr>' +
          '<td>' + item.id_indicador + '</td>' +
          '<td>' + item.descripcion_indicadores + '</td>' +
          '</tr>'
        );
      });
    }
  );
}
function getExpeActuaciones(idExp) {
  $.post("Expediente/getActuaciones.php",
    { id_exp: idExp },
    function (data) {
      var niño = JSON.parse(data);
      $.each(niño, function (i, item) {
        $("#ActuacionesShpwTable").append(
          '<tr>' +
          '<td>' + item.fecha_actuacion + '</td>' +
          '<td>' + item.funcionario_actuacion + '</td>' +
          '<td><div class="wrap2">' + item.descripcion_actuacion + '</div></td>' +
          '<td><div class="wrap2">' + item.compromisos + '</div></td>' +
          '</tr>'
        );
      });
    }
  );
}

var listWorksReq = [];

function addWorkToList(workToAdd) {
  listWorksReq.push(workToAdd);
}
function removeWorkToList(indexOfWork) {
  listWorksReq.splice(indexOfWork, 1);
}
$(".table-add").on("click", function (event) {
  if ($("#indicadores_exp").val() !== "") {
    event.preventDefault();
    var remove = $('<span>').addClass("table-remove glyphicon glyphicon-remove");
    remove.on("click", removeItem);

    var workReq = $('#indicadores_exp').val();
    addWorkToList(workReq);
    var tx = $('#indicadores_exp option:selected').text();
    var line = $("<tr>").append($("<td>").text(workReq + " " + tx)).append($("<td>").append(remove));
    $('#table > tbody').append(line);
    $('#indicadores_exp').val("");
  } else {
    alert("Por favor escoja un indicador");
  }
});

function removeItem() {
  removeWorkToList($(this).parents("tr").index());
  $(this).parents("tr").detach();
}
$("#requiere").change(function () {
  if ($('#requiere').is(':checked')) {
    $("#addActuacion").show();
  } else {
    $("#addActuacion").hide();
  }
});

$("#noRequiere").change(function () {
  if ($('#noRequiere').is(':checked')) {
    $("#addActuacion").hide();
  } else {
    $("#addActuacion").show();
  }
});

var listActua = [];

function addActuaToList(workToAdd) {
  listActua.push(workToAdd);
}
function removeActuaToList(indexOfWork) {
  listActua.splice(indexOfWork, 1);
}
$(".tableActua-add").on("click", function (event) {
  event.preventDefault();
  var remove = $('<span>').addClass("tableActua-remove glyphicon glyphicon-remove");
  remove.on("click", removeItem2);

  var actuacion = { fecha: $('#FechaActuacion').val(), funcionario: $('#funcionario_actua').val(), descripcion: $('#desc_actua').val(), compromiso: $('#compro_actua').val() };
  addActuaToList(actuacion);
  var line = $("<tr>").append($("<td>").text(actuacion["fecha"])).append($("<td>").text(actuacion["funcionario"])).append($("<td>").text(actuacion["descripcion"])).append($("<td>").text(actuacion["compromiso"])).append($("<td>").append(remove));
  $('#tableActua > tbody').append(line);
  $('#FechaActuacion').val("");
  $('#funcionario_actua').val("");
  $('#desc_actua').val("");
  $('#compro_actua').val("");
});

function removeItem2() {
  removeWorkToList($(this).parents("tr").index());
  $(this).parents("tr").detach();
}

$("#formExpe").on('submit', function (evt) {
  evt.preventDefault();
  if ($('#requiere').is(':checked')) {

    if (listWorksReq.length > 0) {
      $.post("Expediente/AgregarExpediente.php",
        {
          NUMERO_PROCESO: $("#num_pro").val(),
          fecha_exp: $("#fecha_exp").val(),
          id_ninnos: $("#idnino").val(),
          cuidadores_exp: $("#cuidadores_exp").val(),
          discapacidad_exp: $("#discapacidad_exp").val(),
          maltratos_exp: $("#maltratos_exp").val(),
          victima_exp: $("#victima_exp").val(),
          descripcion_exp: $("#descripcion_exp").val(),
          derechos_exp: $("#derechos_exp").val(),
          obs_exp: $("#obs_exp").val(),
          veredicto_exp: "Requiere PARD",
          finalizacion_exp: $("#finalizacion_exp").val(),
          entidad_exp: $("#entidad_exp").val(),
          estadocaso_exp: $("#estadocaso_exp").val(),
        },
        function (data) {
          $("#idExp").val(data);
          listWorksReq.forEach(function (valor, indice, array) {

            $.post("Expediente/guardarIndicador.php",
              {
                id_indicador: valor,
                id_exp: $("#idExp").val(),
              },
              function (data2) {

              }
            );
          });
          listActua.forEach(function (valor, indice, array) {
            $.post("Expediente/guardarActuacion.php",
              {
                id_expediente: $("#idExp").val(),
                fecha_actuacion: valor.fecha,
                funcionario_actuacion: valor.funcionario,
                descripcion_actuacion: valor.descripcion,
                compromisos: valor.compromiso,
              },
              function (data3) {
              }
            );
          });

          new PNotify({
            title: 'El Expediente se guardó correctamente',
            text: '',
            type: 'success',
            styling: 'bootstrap3'
          });
          $("#num_pro").val("");
          $("#fecha_exp").val("");
          $("#idnino").val("");
          $("#cuidadores_exp").val("");
          $("#discapacidad_exp").val("");
          $("#maltratos_exp").val("");
          $("#victima_exp").val("");
          $("#descripcion_exp").val("");
          $("#derechos_exp").val("");
          $("#obs_exp").val("");
          $("#finalizacion_exp").val("");
          $("#entidad_exp").val("");
          $("#estadocaso_exp").val("");
          $('#table tbody').empty();
          listWorksReq = [];
          listActua = [];
          $('#tableActua tbody').empty();
          setTimeout(refresh, 1500);
        }
      );
    } else {
      alert("Por favor seleccione al menos un INDICADOR");
    }


  } else {
    if (listWorksReq.length > 0) {
      $.post("Expediente/AgregarExpediente.php",
        {
          NUMERO_PROCESO: $("#num_pro").val(),
          fecha_exp: $("#fecha_exp").val(),
          id_ninnos: $("#idnino").val(),
          cuidadores_exp: $("#cuidadores_exp").val(),
          discapacidad_exp: $("#discapacidad_exp").val(),
          maltratos_exp: $("#maltratos_exp").val(),
          victima_exp: $("#victima_exp").val(),
          descripcion_exp: $("#descripcion_exp").val(),
          derechos_exp: $("#derechos_exp").val(),
          obs_exp: $("#obs_exp").val(),
          veredicto_exp: "No requiere PARD",
          finalizacion_exp: $("#finalizacion_exp").val(),
          entidad_exp: $("#entidad_exp").val(),
          estadocaso_exp: $("#estadocaso_exp").val(),
        },
        function (data) {
          $("#idExp").val(data);
          listWorksReq.forEach(function (valor, indice, array) {
            $.post("Expediente/guardarIndicador.php",
              {
                id_indicador: valor,
                id_exp: $("#idExp").val(),
              },
              function (data2) {
              }
            );
          });
          new PNotify({
            title: 'El Expediente se guardó correctamente',
            text: '',
            type: 'success',
            styling: 'bootstrap3'
          });
          $("#num_pro").val("");
          $("#fecha_exp").val("");
          $("#idnino").val("");
          $("#cuidadores_exp").val("");
          $("#discapacidad_exp").val("");
          $("#maltratos_exp").val("");
          $("#victima_exp").val("");
          $("#descripcion_exp").val("");
          $("#derechos_exp").val("");
          $("#obs_exp").val("");
          $("#finalizacion_exp").val("");
          $("#entidad_exp").val("");
          $("#estadocaso_exp").val("");
          $('#table tbody').empty();
          listWorksReq = [];
          listActua = [];
          $('#tableActua tbody').empty();
          setTimeout(refresh, 1500);
        }
      );
    } else {
      alert("Por favor seleccione al menos un INDICADOR");
    }


  }
});

function refresh() {
  $("#refresh").click();
}