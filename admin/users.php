<?php
$secre  = mysqli_query($con, "SELECT * FROM usuarios")or die(mysqli_error($con));
$row_secre = mysqli_fetch_assoc($secre);
?>
<h2>Nuevo Usuario</h2>
<div class="x_panel">
                  <div class="x_title">
                    <h2>Crear usuario</h2>
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
  </div>
  <div class="x_content">
<form action="main.php?key=101" role="form" method="post" name="form1" id="form1">
	<label for="Usuario">Nombre de Usuario:</label>
     <input name="Usuario" type="text" class="form-control validar" value="" size="20" maxlength="20" required>
   <label for="Usuario">Nombres y Apellidos:</label>
   	<input type="text" class="form-control validar" name="Nombres" value="" size="32" id="Nombres" required />
   <label for="Pass">Contraseña:</label>
   	<input type="password" name="Pass" value="" size="32" class="form-control" required />
   <label for="Pass2">confirmar contraseña:</label>
	<input type="password" name="Pass2" value="" size="32"  class="form-control" required />
    <label for="Email">Email:</label>
		<input type="email" name="Email" value="" size="32" id="Email" style="text-transform:lowercase;"  class="form-control validar"/>
    <label for="Tipo">Tipo:</label>
        <select name="Tipo" id="Tipo" class="form-control">
          <option value="1">Administrador</option>
          <option value="2" selected>Lider de Meta</option>
          <option value="3">Responsable de meta</option>
          <option value="4">Consulta</option>
      </select>
    <?php
    //se construye select secretarias
    echo '<label>Secretaria</label>
    <select name="Id_secre" class="form-control" required="required" >
     <option value="" selected="selected" >Seleccionar...</option>';
      do {
     echo '<option value="'.$row_secre['Id_secre'].'">'.$row_secre['Nombre_secre'].'</option>';
    } while ($row_secre = mysqli_fetch_assoc($plan));
    echo '</select>';
     ?>
<br>
      <button type="submit" class="btn btn-primary"/>Ingresar Usuario</button>

  </table>
</form>
</div>
</div>
