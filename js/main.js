$(document).ready(function(){
//activa el selecto con busqueda
  $('.js-example-basic-single').select2();

})


//funcion para el borrado normal
 
function borrado(id, tabla, clave, key) {
  var answer = confirm("Esta a Punto de Eliminar este Dato, ¿Esta Seguro de Eliminarlo?")
 if (answer){
  alert("Dato eliminado")
 window.location.href="main.php?key=400&Id_dato="+id+"&Tabla="+tabla+"&Clave="+clave+"&Anterior="+key;
  }
 else{
alert("Cancelado")
 }
}    
//

function Borra(tabla, id) {
  var agree = confirm("¿Realmente desea eliminar el registro seleccionado?");
  if (agree) {

    switch(tabla){
      case 'ninnosnna':
      document.location = "main.php?key=17&id_ninnos=" + id;
      break;
      case 'cuidadores':
      document.location = "main.php?key=27&id_cuidadores=" + id;
      break;

    }
  } else { return false; } 
                          }

     



    
  
  function getDato(tablac, campoc, datoc, campor) {
        $.post("consulta_dato.php",
          { tabla: tablac, cconsulta: campoc, dato: datoc, cresp: campor },
          function (data) {
            
            return data;
              
            });
          }
       
      
      