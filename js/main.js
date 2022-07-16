function Borra(idcliente) {
  var agree = confirm("�Realmente desea eliminar el cliente seleccionado?");
  if (agree) {
  document.location = "eliminar.php?id=" + idcliente;
          } else return false;
       }
    
       function getDato(tablac, campoc, datoc, campor) {
        $.post("consulta_dato.php",
          { tabla: tablac, cconsulta: campoc, dato: datoc, cresp: campor },
          function (data) {
            return data;
              
            });
          }
       
      
      