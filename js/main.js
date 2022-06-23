function Borra(idcliente) {
  var agree = confirm("¿Realmente desea eliminar el cliente seleccionado?");
  if (agree) {
  document.location = "eliminar.php?id=" + idcliente;
          } else return false;
       }
    
