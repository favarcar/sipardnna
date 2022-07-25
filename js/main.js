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
       
      
      