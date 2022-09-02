<?php
//Consulta para listar los campos y sus propiedades para construir el formulario
$tabla = "usuarios";
$id="id_usuario";
$codigo = $_GET['id_usuario'];
$field_tit = mysqli_query($con ,"DESCRIBE $tabla");
$r_fieldi_tit = mysqli_fetch_assoc($field_tit);

$sql = mysqli_query($con , "SELECT * FROM $tabla WHERE  id_usuario = '$codigo' ")or die(mysqli_error($con ));
	 $row_sql = mysqli_fetch_assoc($sql);
//Se listan todas las columnas de la consulta
$columnas = mysqli_fetch_fields($sql);

//sql para la tabla planes y agregar el año a tablas dependiendo el plan de gobierno  CAMBIAR ID
$sql1=mysqli_query($con , 'select * from planes where id_plan = 3');
$respCon = mysqli_fetch_assoc($sql1);


$id_secre = consulta_campo("usuarios","id_usuario",$row_sql['id_usuario'],"Id_secre");
 $id_lider = consulta_campo("usuarios","id_usuario",$row_sql['id_usuario'],"Id_lider");
 $secre = consulta_campo("usuarios","id_usuario",$id_secre,"Nombres");

//sql para realizar suma de campos para la tabla total cuatrenio

$progEducacion= $row_sql['Programacion_2020_SGP_Educacion']+$row_sql['Programacion_2021_SGP_Educacion']+$row_sql['Programacion_2022_SGP_Educacion']+$row_sql['Programacion_2023_SGP_Educacion'];
$aproEducacion=$row_sql['Apropiacion_2020_SGP_Educacion']+$row_sql['Apropiacion_2021_SGP_Educacion']+$row_sql['Apropiacion_2022_SGP_Educacion']+$row_sql['Apropiacion_2023_SGP_Educacion'];
$compEducacion=$row_sql['Compromiso_2020_SGP_Educacion']+$row_sql['Compromiso_2021_SGP_Educacion']+$row_sql['Compromiso_2022_SGP_Educacion']+$row_sql['Compromiso_2023_SGP_Educacion'];
$oblEducacion=$row_sql['Obligacion_2020_SGP_Educacion']+$row_sql['Obligacion_2021_SGP_Educacion']+$row_sql['Obligacion_2022_SGP_Educacion']+$row_sql['Obligacion_2023_SGP_Educacion'];

$progSalud= $row_sql['Programacion_2020_SGP_Salud']+$row_sql['Programacion_2021_SGP_Salud']+$row_sql['Programacion_2022_SGP_Salud']+$row_sql['Programacion_2023_SGP_Salud'];
$aproSalud=$row_sql['Apropiacion_2020_SGP_Salud']+$row_sql['Apropiacion_2021_SGP_Salud']+$row_sql['Apropiacion_2022_SGP_Salud']+$row_sql['Apropiacion_2023_SGP_Salud'];
$compSalud=$row_sql['Compromiso_2020_SGP_Salud']+$row_sql['Compromiso_2021_SGP_Salud']+$row_sql['Compromiso_2022_SGP_Salud']+$row_sql['Compromiso_2023_SGP_Salud'];
$oblSalud=$row_sql['Obligacion_2020_SGP_Salud']+$row_sql['Obligacion_2021_SGP_Salud']+$row_sql['Obligacion_2022_SGP_Salud']+$row_sql['Obligacion_2023_SGP_Salud'];

$progAguaP=$row_sql['Programacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Programacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Programacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Programacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'];
$aproAguaP=$row_sql['Apropiacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Apropiacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Apropiacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Apropiacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'];
$compAguaP=$row_sql['Compromiso_2020_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Compromiso_2021_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Compromiso_2022_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Compromiso_2023_SGP_Agua_Potable_y_Saneamiento_Basico'];
$oblAguaP=$row_sql['Obligacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Obligacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Obligacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico']+$row_sql['Obligacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'];

$progCultura=$row_sql['Programacion_2020_SGP_Cultura']+$row_sql['Programacion_2021_SGP_Cultura']+$row_sql['Programacion_2022_SGP_Cultura']+$row_sql['Programacion_2023_SGP_Cultura'];
$aproCultura=$row_sql['Apropiacion_2020_SGP_Cultura']+$row_sql['Apropiacion_2021_SGP_Cultura']+$row_sql['Apropiacion_2022_SGP_Cultura']+$row_sql['Apropiacion_2023_SGP_Cultura'];
$compCultura=$row_sql['Compromiso_2020_SGP_Cultura']+$row_sql['Compromiso_2021_SGP_Cultura']+$row_sql['Compromiso_2022_SGP_Cultura']+$row_sql['Compromiso_2023_SGP_Cultura'];
$oblCultura=$row_sql['Obligacion_2020_SGP_Cultura']+$row_sql['Obligacion_2021_SGP_Cultura']+$row_sql['Obligacion_2022_SGP_Cultura']+$row_sql['Obligacion_2023_SGP_Cultura'];

$progDeporte=$row_sql['Programacion_2020_SGP_Deporte']+$row_sql['Programacion_2021_SGP_Deporte']+$row_sql['Programacion_2022_SGP_Deporte']+$row_sql['Programacion_2023_SGP_Deporte'];
$aproDeporte=$row_sql['Apropiacion_2020_SGP_Deporte']+$row_sql['Apropiacion_2021_SGP_Deporte']+$row_sql['Apropiacion_2022_SGP_Deporte']+$row_sql['Apropiacion_2023_SGP_Deporte'];
$compDeporte=$row_sql['Compromiso_2020_SGP_Deporte']+$row_sql['Compromiso_2021_SGP_Deporte']+$row_sql['Compromiso_2022_SGP_Deporte']+$row_sql['Compromiso_2023_SGP_Deporte'];
$oblDeporte=$row_sql['Obligacion_2020_SGP_Deporte']+$row_sql['Obligacion_2021_SGP_Deporte']+$row_sql['Obligacion_2022_SGP_Deporte']+$row_sql['Obligacion_2023_SGP_Deporte'];

$progLibreInver=$row_sql['Programacion_2020_SGP_Libre_Inversion']+$row_sql['Programacion_2021_SGP_Libre_Inversion']+$row_sql['Programacion_2022_SGP_Libre_Inversion']+$row_sql['Programacion_2023_SGP_Libre_Inversion'];
$aproLibreInver=$row_sql['Apropiacion_2020_SGP_Libre_Inversion']+$row_sql['Apropiacion_2021_SGP_Libre_Inversion']+$row_sql['Apropiacion_2022_SGP_Libre_Inversion']+$row_sql['Apropiacion_2023_SGP_Libre_Inversion'];
$comLibreInver=$row_sql['Compromiso_2020_SGP_Libre_Inversion']+$row_sql['Compromiso_2021_SGP_Libre_Inversion']+$row_sql['Compromiso_2022_SGP_Libre_Inversion']+$row_sql['Compromiso_2023_SGP_Libre_Inversion'];
$oblLibreInver=$row_sql['Obligacion_2020_SGP_Libre_Inversion']+$row_sql['Obligacion_2021_SGP_Libre_Inversion']+$row_sql['Obligacion_2022_SGP_Libre_Inversion']+$row_sql['Obligacion_2023_SGP_Libre_Inversion'];

$progLibreDes=$row_sql['Programacion_2020_SGP_Libre_Destinacion']+$row_sql['Programacion_2021_SGP_Libre_Destinacion']+$row_sql['Programacion_2022_SGP_Libre_Destinacion']+$row_sql['Programacion_2023_SGP_Libre_Destinacion'];
$aproLibreDes=$row_sql['Apropiacion_2020_SGP_Libre_Destinacion']+$row_sql['Apropiacion_2021_SGP_Libre_Destinacion']+$row_sql['Apropiacion_2022_SGP_Libre_Destinacion']+$row_sql['Apropiacion_2023_SGP_Libre_Destinacion'];
$compLibreDes=$row_sql['Compromiso_2020_SGP_Libre_Destinacion']+$row_sql['Compromiso_2021_SGP_Libre_Destinacion']+$row_sql['Compromiso_2022_SGP_Libre_Destinacion']+$row_sql['Compromiso_2023_SGP_Libre_Destinacion'];
$oblLibreDes=$row_sql['Obligacion_2020_SGP_Libre_Destinacion'];$row_sql['Obligacion_2021_SGP_Libre_Destinacion']+$row_sql['Obligacion_2022_SGP_Libre_Destinacion']+$row_sql['Obligacion_2023_SGP_Libre_Destinacion'];

$progAliEscolar=$row_sql['Programacion_2020_SGP_Alimentaci_n_Escolar']+$row_sql['Programacion_2021_SGP_Alimentaci_n_Escolar']+$row_sql['Programacion_2022_SGP_Alimentaci_n_Escolar']+$row_sql['Programacion_2023_SGP_Alimentaci_n_Escolar'];
$aproAliEscolar=$row_sql['Apropiacion_2020_SGP_Alimentaci_n_Escolar']+$row_sql['Apropiacion_2021_SGP_Alimentaci_n_Escolar']+$row_sql['Apropiacion_2022_SGP_Alimentaci_n_Escolar']+$row_sql['Apropiacion_2023_SGP_Alimentaci_n_Escolar'];
$compAliEscolar=$row_sql['Compromiso_2020_SGP_Alimentaci_n_Escolar']+$row_sql['Compromiso_2021_SGP_Alimentaci_n_Escolar']+$row_sql['Compromiso_2022_SGP_Alimentaci_n_Escolar']+$row_sql['Compromiso_2023_SGP_Alimentaci_n_Escolar'];
$oblAliEscolar=$row_sql['Obligacion_2020_SGP_Alimentaci_n_Escolar']+$row_sql['Obligacion_2021_SGP_Alimentaci_n_Escolar']+$row_sql['Obligacion_2022_SGP_Alimentaci_n_Escolar']+$row_sql['Obligacion_2023_SGP_Alimentaci_n_Escolar'];

$progPriInfancia=$row_sql['Programacion_2020_SGP_Primera_Infancia']+$row_sql['Programacion_2021_SGP_Primera_Infancia']+$row_sql['Programacion_2022_SGP_Primera_Infancia']+$row_sql['Programacion_2023_SGP_Primera_Infancia'];
$aproPriInfancia=$row_sql['Apropiacion_2020_SGP_Primera_Infancia']+$row_sql['Apropiacion_2021_SGP_Primera_Infancia']+$row_sql['Apropiacion_2022_SGP_Primera_Infancia']+$row_sql['Apropiacion_2023_SGP_Primera_Infancia'];
$compPriInfancia=$row_sql['Compromiso_2020_SGP_Primera_Infancia']+$row_sql['Compromiso_2021_SGP_Primera_Infancia']+$row_sql['Compromiso_2022_SGP_Primera_Infancia']+$row_sql['Compromiso_2023_SGP_Primera_Infancia'];
$oblPriInfancia=$row_sql['Obligacion_2020_SGP_Primera_Infancia']+$row_sql['Obligacion_2021_SGP_Primera_Infancia']+$row_sql['Obligacion_2022_SGP_Primera_Infancia']+$row_sql['Obligacion_2020_SGP_Primera_Infancia'];

$progRegalias=$row_sql['Programacion_2020_Regalias']+$row_sql['Programacion_2021_Regalias']+$row_sql['Programacion_2022_Regalias']+$row_sql['Programacion_2023_Regalias'];
$aproRegalias=$row_sql['Apropiacion_2020_Regalias']+$row_sql['Apropiacion_2021_Regalias']+$row_sql['Apropiacion_2022_Regalias']+$row_sql['Apropiacion_2023_Regalias'];
$compRegalias=$row_sql['Compromiso_2020_Regalias']+$row_sql['Compromiso_2021_Regalias']+$row_sql['Compromiso_2022_Regalias']+$row_sql['Compromiso_2023_Regalias'];
$oblRegalias=$row_sql['Obligacion_2020_SGP_Primera_Infancia']+$row_sql['Obligacion_2021_SGP_Primera_Infancia']+$row_sql['Obligacion_2022_SGP_Primera_Infancia']+$row_sql['Obligacion_2023_SGP_Primera_Infancia'];

$progCofDepart=$row_sql['Programacion_2020_Cofinanciacion_Departamento']+$row_sql['Programacion_2021_Cofinanciacion_Departamento']+$row_sql['Programacion_2022_Cofinanciacion_Departamento']+$row_sql['Programacion_2023_Cofinanciacion_Departamento'];
$aproCofDepart=$row_sql['Apropiacion_2020_Cofinanciacion_Departamento']+$row_sql['Apropiacion_2021_Cofinanciacion_Departamento']+$row_sql['Apropiacion_2022_Cofinanciacion_Departamento']+$row_sql['Apropiacion_2023_Cofinanciacion_Departamento'];
$compCofDepart=$row_sql['Compromiso_2020_Cofinanciacion_Departamento']+$row_sql['Compromiso_2021_Cofinanciacion_Departamento']+$row_sql['Compromiso_2022_Cofinanciacion_Departamento']+$row_sql['Compromiso_2020_Cofinanciacion_Departamento'];
$oblCofDepart=$row_sql['Obligacion_2020_Cofinanciacion_Departamento']+$row_sql['Obligacion_2021_Cofinanciacion_Departamento']+$row_sql['Obligacion_2022_Cofinanciacion_Departamento']+$row_sql['Obligacion_2020_Cofinanciacion_Departamento'];

$progCofNac=$row_sql['Programacion_2020_Cofinanciacion_Nacion']+$row_sql['Programacion_2021_Cofinanciacion_Nacion']+$row_sql['Programacion_2022_Cofinanciacion_Nacion']+$row_sql['Programacion_2023_Cofinanciacion_Nacion'];
$aproCofNac=$row_sql['Apropiacion_2020_Cofinanciacion_Nacion']+$row_sql['Apropiacion_2021_Cofinanciacion_Nacion']+$row_sql['Apropiacion_2022_Cofinanciacion_Nacion']+$row_sql['Apropiacion_2023_Cofinanciacion_Nacion'];
$compCofNac=$row_sql['Compromiso_2020_Cofinanciacion_Nacion']+$row_sql['Compromiso_2021_Cofinanciacion_Nacion']+$row_sql['Compromiso_2022_Cofinanciacion_Nacion']+$row_sql['Compromiso_2023_Cofinanciacion_Nacion'];
$oblgCofNac=$row_sql['Obligacion_2020_Cofinanciacion_Departamento']+$row_sql['Obligacion_2021_Cofinanciacion_Departamento']+$row_sql['Obligacion_2022_Cofinanciacion_Departamento']+$row_sql['Obligacion_2023_Cofinanciacion_Departamento'];

$progCredito=$row_sql['Programacion_2020_Credito']+$row_sql['Programacion_2021_Credito']+$row_sql['Programacion_2022_Credito']+$row_sql['Programacion_2023_Credito'];
$aproCredito=$row_sql['Apropiacion_2020_Credito']+$row_sql['Apropiacion_2021_Credito']+$row_sql['Apropiacion_2022_Credito']+$row_sql['Apropiacion_2023_Credito'];
$compCredito=$row_sql['Compromiso_2020_Credito']+$row_sql['Compromiso_2021_Credito']+$row_sql['Compromiso_2022_Credito']+$row_sql['Compromiso_2023_Credito'];
$oblCredito=$row_sql['Obligacion_2020_Credito']+$row_sql['Obligacion_2021_Credito']+$row_sql['Obligacion_2022_Credito']+$row_sql['Obligacion_2023_Credito'];

$progOtros=$row_sql['Programacion_2020_Otros']+$row_sql['Programacion_2021_Otros']+$row_sql['Programacion_2022_Otros']+$row_sql['Programacion_2023_Otros'];
$aproOtros=$row_sql['Apropiacion_2020_Otros']+$row_sql['Apropiacion_2021_Otros']+$row_sql['Apropiacion_2022_Otros']+$row_sql['Apropiacion_2023_Otros'];
$compOtros=$row_sql['Compromiso_2020_Otros']+$row_sql['Compromiso_2021_Otros']+$row_sql['Compromiso_2022_Otros']+$row_sql['Compromiso_2023_Otros'];
$oblOtros=$row_sql['Obligacion_2020_Otros']+$row_sql['Obligacion_2021_Otros']+$row_sql['Obligacion_2022_Otros']+$row_sql['Obligacion_2023_Otros'];

$progPropios=$row_sql['Programacion_2020_Recursos_Propios']+$row_sql['Programacion_2021_Recursos_Propios']+$row_sql['Programacion_2022_Recursos_Propios']+$row_sql['Programacion_2023_Recursos_Propios'];
$aproPropios=$row_sql['Apropiacion_2020_Recursos_Propios']+$row_sql['Apropiacion_2021_Recursos_Propios']+$row_sql['Apropiacion_2022_Recursos_Propios']+$row_sql['Apropiacion_2023_Recursos_Propios'];
$compPropios=$row_sql['Compromiso_2020_Recursos_Propios']+$row_sql['Compromiso_2021_Recursos_Propios']+$row_sql['Compromiso_2022_Recursos_Propios']+$row_sql['Compromiso_2023_Recursos_Propios'];
$oblPropios=$row_sql['Obligacion_2020_Recursos_Propios']+$row_sql['Obligacion_2021_Recursos_Propios']+$row_sql['Obligacion_2022_Recursos_Propios']+$row_sql['Obligacion_2023_Recursos_Propios'];

$progRecNoEntran=$row_sql['Programacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_']+$row_sql['Programacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_']+$row_sql['Programacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_']+$row_sql['Programacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_'];
$aproRecNoEntran=$row_sql['Apropiacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E']+$row_sql['Apropiacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E']+$row_sql['Apropiacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E']+$row_sql['Apropiacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E'];
$compRecNoEntran=$row_sql['Compromiso_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Compromiso_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Compromiso_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Compromiso_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'];
$oblRecNoEntran=$row_sql['Obligacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Obligacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Obligacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En']+$row_sql['Obligacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'];

$progTotal=$row_sql['TotalObligacion_2020']+$row_sql['TotalObligacion_2021']+$row_sql['TotalObligacion_2022']+$row_sql['TotalObligacion_2023'];
$aproTotal=$row_sql['TotalApropiacion_2020']+$row_sql['TotalApropiacion_2021']+$row_sql['TotalApropiacion_2022']+$row_sql['TotalApropiacion_2023'];
$comTotal=$row_sql['TotalCompromiso_2020']+$row_sql['TotalCompromiso_2021']+$row_sql['TotalCompromiso_2022']+$row_sql['TotalCompromiso_2023'];
$oblTotal=$row_sql['TotalObligacion_2020']+$row_sql['TotalObligacion_2021']+$row_sql['TotalObligacion_2022']+$row_sql['TotalObligacion_2023'];


?>

<p><b>Secretaria Responsable: <b><?= $secre ?><p>
<p><b>Lider de meta: </b><?= veruserid($id_lider)?> </p>
<p><b>Codigo de la meta: </b><?=$codigo ?></p>
<div class="table-responsive">
	
	<!-- Para mostrar tabla Identificación meta -->
<table class="table table-bordered">
	<thead class="column-title" >
		<tr>
			<th colspan="4" style="text-align: center">IDENTIFICACIÓN DE LA META</th>
		</tr>
		<tr>
			<th>Estrategia</th>
			<th>Sector</th>
			<th>Sector</th>
			<th>Programa presupuestal</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td><?= utf8_encode($row_sql['Nombre_Linea_Estrategica'])?></td>
			<td><?= utf8_encode($row_sql['Codigo_Sector'])?></td>
			<td><?= utf8_encode($row_sql['Nombre_Sector'])?></td>
			<td><?= utf8_encode($row_sql['Nombre_Programa_Presupuestal']) ?></td>
		</tr>
		
	</tbody>
</table>
</div>
<br><br>
<div class="table-responsive">
	<!-- Para mostrar tabla identificadores de bienestar -->
<table class="table table-bordered">
	<thead class="column-title">
		<tr>
			<th colspan="4" style="text-align: center">IDENTIFICADORES DE BIENESTAR</th>
		</tr>
		<tr>
			<th>Codigo</th>
			<th>Identificador</th>
			<th>Meta cuatrenio</th>
			
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td><?= utf8_encode($row_sql['Codigo_Indicador_Bienestar'])?></td>
			<td><?= utf8_encode($row_sql['Nombre_Indicador_Bienestar']) ?></td>
			<td><?= $row_sql['Meta_Cuatrenio'] ?></td>
			
		</tr>
		
	</tbody>
</table>
</div>
<br><br>

<div class="table-responsive">
	<!-- Para mostrar tabla Meta Producto -->
<table class="table table-bordered">
	<thead class="column-title">
		<tr>
			<th colspan="7" style="text-align: center">META DE PRODUCTO</th>
		</tr>
		<tr>
			<th>Código</th>
			<th>Producto</th>
			<th>Indicador</th>
			<th>Unidad</th>
			<th>Meta</th>
			<th>Vr. Unitario</th>
			<th>Valor Total</th>
			
			
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td><?= $row_sql['Codigo_Producto'] ?></td>
			<td><?= utf8_encode($row_sql['Nombre_Producto']) ?></td>
			<td><?= utf8_encode($row_sql['Nombre_Indicador_Producto'])?></td>
			<td><?= utf8_encode($row_sql['Unidad_Medida_Indicador_Producto']) ?></td>
			<td><?= $row_sql['Meta_Cuatrienio_Indicador_Producto'] ?></td>
			<td><?= $row_sql['Costo_Unitario_Indicador_Producto'] ?></td>
			<td><?= $row_sql['Costo_Total_Indicador_Producto'] ?></td>
			
			
		</tr>
		
	</tbody>
</table>

</div>
<!-- Desplegable -->
<div class="table-responsive">
	<!-- Desplegable accordion -->
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        PARTE 2. CONTROL FISICO DE LA META</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
			<table class="table table-bordered table-responsive">
				<thead class="column-title" >
					<tr>
						<th colspan="16" style="text-align: center">REPORTE DE META DE PRODUCTO CUMPLIDA (SEGÚN CONTROL DE LA SECTORIAL)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="2">Meta fisica/vigencia</th>
						<td colspan="3"><?= $respCon['Anio1'] ?></th>
						<td colspan="3"><?= $respCon['Anio2'] ?></th>
						<td colspan="3"><?= $respCon['Anio3'] ?></th>
						<td colspan="3"><?= $respCon['Anio4'] ?></th>
						<td colspan="3">Total del cuatrenio</th>
						
					</tr>
		
				<tr>
					
					<td>Programado</td>
					<td>Ejecutado</td>
					<td>%</td>
					<td>Programado</td>
					<td>Ejecutado</td>
					<td>%</td>
					<td>Programado</td>
					<td>Ejecutado</td>
					<td>%</td>
					<td>Programado</td>
					<td>Ejecutado</td>
					<td>%</td>
					<td>Programado</td>
					<td>Ejecutado</td>
					<td>%</td>	
				</tr>
				<tr>
				
					<td rowspan="2"><?= utf8_encode($row_sql['Nombre_Indicador_Producto']) ?></td>
					<td><?= $row_sql['Valor_Fisico_Programado_2020'] ?></td>
					<td><?= $row_sql['Valor_Fisico_Ejecutado_2020'] ?></td>
					<td><?= utf8_encode($row_sql['Porcentaje_de_Cumplimiento_Avance_fisico_2020'])?></td>
					<td><?= $row_sql['Valor_Fisico_Programado_2021'] ?></td>
					<td><?= $row_sql['Valor_Fisico_Ejecutado_2021'] ?></td>
					<td><?= utf8_encode($row_sql['Porcentaje_de_Cumplimiento_Avance_fisico_2021']) ?></td>
					<td><?= $row_sql['Valor_Fisico_Programado_2022'] ?></td>
					<td><?= $row_sql['Valor_Fisico_Ejecutado_2022'] ?></td>
					<td><?= utf8_encode($row_sql['Porcentaje_de_Cumplimiento_Avance_fisico_2022'])?></td>
					<td><?= $row_sql['Valor_Fisico_Programado_2023'] ?></td>
					<td><?= $row_sql['Valor_Fisico_Ejecutado_2023'] ?></td>
					<td><?= utf8_encode($row_sql['Porcentaje_de_Cumplimiento_Avance_fisico_2023'])?></td>
					<td>4</td>
					<td>1</td>
					<td>25%</td>			
				</tr>
				<tr>
					
					<td colspan="3"><?= semaforo(utf8_encode($row_sql['Rango_2020']))?></td>
					<td colspan="3"><?= semaforo(utf8_encode($row_sql['Rango_2021'])) ?></td>
					<td colspan="3"><?= semaforo(utf8_encode($row_sql['Rango_2022']))?></td>
					<td colspan="3"><?= semaforo(utf8_encode($row_sql['Rango_2023']))?></td>
					<td colspan="3">Meta tiene Retrazo critico</td>
					
				</tr>
		
		
			</tbody>
			</table>

	  </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="controlfinm">
        PARTE 3. CONTROL FINANCIERO DE LA META</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
		
	  <!--Navs para visualizar control financiero por años  -->
	  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><?= $respCon['Anio1'] ?></a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false"><?= $respCon['Anio2'] ?></a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false"><?= $respCon['Anio3'] ?></a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false"><?= $respCon['Anio4'] ?></a>
                        </li>
						<li role="presentation" class=""><a href="#tab_content55" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">Total Cuatrenio</a>
                        </li>
                      </ul>
	<!--Se inicia el contenido de las pestañas -->
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">
                          
	<table class="table table-bordered"> <!--Tabla control Financiero 2020-->
		<thead>
		<tr>
			<th colspan="6" style="text-align: center">Control Financiero <?= $respCon['Anio1'] ?></th>
			
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>META FISICA / VIGENCIA</td>
			<td>Programado</td>
			<td>Apropiado</td>
			<td>Compromiso</td>
			<td>Obligación</td>
			<td>%</td>
		</tr>
		<tr>
			
			<td>SGP - Educación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Educacion'])?></p></td>
			<td><?= $row_sql['Apropiacion_2020_SGP_Educacion']?></td>
			<td><?= $row_sql['Compromiso_2020_SGP_Educacion']?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Educacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Salud</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Salud'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Salud'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Salud'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Salud'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Agua Potable y S.B.</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Cultura</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Cultura'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Cultura'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Cultura'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Cultura'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Deportes</td>
			<td><p class="prog"><?= $row_sql['Programacion_2020_SGP_Deporte']?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Deporte'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Deporte'])?></td>
			<td><p class="obl"><?= $row_sql['Obligacion_2020_SGP_Deporte']?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Inversión</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Libre_Inversion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Libre_Inversion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Libre_Inversion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Libre_Inversion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Destinación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Libre_Destinacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Libre_Destinacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Libre_Destinacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Libre_Destinacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Alimentación Escolar</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Alimentaci_n_Escolar'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Alimentaci_n_Escolar'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Primera Infancia</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_SGP_Primera_Infancia'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_SGP_Primera_Infancia'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_SGP_Primera_Infancia'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_SGP_Primera_Infancia'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGR - Sistema General Regalías</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Regalias'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Regalias'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Regalias'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Regalias'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Departamental</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Cofinanciacion_Departamento'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Cofinanciacion_Departamento'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Cofinanciacion_Departamento'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Cofinanciacion_Departamento'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Naciónal</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Cofinanciacion_Nacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Cofinanciacion_Nacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Cofinanciacion_Nacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Cofinanciacion_Nacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Crédito</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Credito'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Credito'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Credito'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Credito'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Otros </td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Otros'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Otros'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Otros'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Otros'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos Propios</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Recursos_Propios'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Recursos_Propios'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Recursos_Propios'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Recursos_Propios'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos que no entran Ppto</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2020_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td><b>TOTAL</b></td>
			<td><p class="prog"><?= Moneda($row_sql['TotalProgramacion_2020'])?></p></td>
			<td><?= Moneda($row_sql['TotalApropiacion_2020'])?></td>
			<td><?= Moneda($row_sql['TotalCompromiso_2020'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['TotalObligacion_2020'])?></p<</td>
			<td><p class="porc"></p></td>
		</tr>
		
		</tbody>
	</table>
						
						
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                         
	<table class="table table-bordered"> <!--Tabla control Financiero 2021-->
		<thead>
		<tr>
			<th colspan="6" style="text-align: center">Control Financiero <?= $respCon['Anio2'] ?></th>
			
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>META FISICA / VIGENCIA</td>
			<td>Programado</td>
			<td>Apropiado</td>
			<td>Compromiso</td>
			<td>Obligación</td>
			<td>%</td>
		</tr>
		<tr>
			
			<td>SGP - Educación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Educacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Educacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Educacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Educacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Salud</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Salud'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Salud'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Salud'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Salud'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Agua Potable y S.B.</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Cultura</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Cultura'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Cultura'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Cultura'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Cultura'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Deportes</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Deporte'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Deporte'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Deporte'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Deporte'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Inversión</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Libre_Inversion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Libre_Inversion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Libre_Inversion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Libre_Inversion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Destinación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Libre_Destinacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Libre_Destinacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Libre_Destinacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Libre_Destinacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Alimentación Escolar</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Alimentaci_n_Escolar'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Alimentaci_n_Escolar'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Primera Infancia</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_SGP_Primera_Infancia'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_SGP_Primera_Infancia'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_SGP_Primera_Infancia'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_SGP_Primera_Infancia'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGR - Sistema General Regalías</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Regalias'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Regalias'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Regalias'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Regalias'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Departamental</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Cofinanciacion_Departamento'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Cofinanciacion_Departamento'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Cofinanciacion_Departamento'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Cofinanciacion_Departamento'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Naciónal</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Cofinanciacion_Nacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Cofinanciacion_Nacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Cofinanciacion_Nacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Cofinanciacion_Nacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Crédito</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Credito'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Credito'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Credito'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Credito'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Otros </td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Otros'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Otros'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Otros'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Otros'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos Propios</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Recursos_Propios'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Recursos_Propios'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Recursos_Propios'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Recursos_Propios'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos que no entran Ppto</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2021_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td><b>TOTAL</b></td>
			<td><p class="prog"><?= Moneda($row_sql['TotalProgramacion_2021'])?></p></td>
			<td><?= Moneda($row_sql['TotalApropiacion_2021'])?></td>
			<td><?= Moneda($row_sql['TotalCompromiso_2021'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['TotalObligacion_2021'])?></p<</td>
			<td><p class="porc"></p></td>
		</tr>
		
		</tbody>
	</table>


                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="profile-tab">
                        
						<table class="table table-bordered"> <!--Tabla control Financiero 2022-->
		<thead>
		<tr>
			<th colspan="6" style="text-align: center">Control Financiero <?= $respCon['Anio3'] ?></th>
			
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>META FISICA / VIGENCIA</td>
			<td>Programado</td>
			<td>Apropiado</td>
			<td>Compromiso</td>
			<td>Obligación</td>
			<td>%</td>
		</tr>
		<tr>
			
			<td>SGP - Educación</td>
			<td><p class="prog"><?= Moneda($progEducacion)?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Educacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Educacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Educacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Salud</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Salud'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Salud'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Salud'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Salud'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Agua Potable y S.B.</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Cultura</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Cultura'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Cultura'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Cultura'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Cultura'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Deportes</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Deporte'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Deporte'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Deporte'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Deporte'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Inversión</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Libre_Inversion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Libre_Inversion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Libre_Inversion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Libre_Inversion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Destinación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Libre_Destinacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Libre_Destinacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Libre_Destinacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Libre_Destinacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Alimentación Escolar</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Alimentaci_n_Escolar'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Alimentaci_n_Escolar'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Primera Infancia</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_SGP_Primera_Infancia'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_SGP_Primera_Infancia'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_SGP_Primera_Infancia'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_SGP_Primera_Infancia'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGR - Sistema General Regalías</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Regalias'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Regalias'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Regalias'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Regalias'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Departamental</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Cofinanciacion_Departamento'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Cofinanciacion_Departamento'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Cofinanciacion_Departamento'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Cofinanciacion_Departamento'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Naciónal</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Cofinanciacion_Nacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Cofinanciacion_Nacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Cofinanciacion_Nacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Cofinanciacion_Nacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Crédito</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Credito'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Credito'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Credito'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Credito'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Otros </td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Otros'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Otros'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Otros'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Otros'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos Propios</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Recursos_Propios'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Recursos_Propios'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Recursos_Propios'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Recursos_Propios'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos que no entran Ppto</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2022_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td><b>TOTAL</b></td>
			<td><p class="prog"><?= Moneda($row_sql['TotalProgramacion_2022'])?></p></td>
			<td><?= Moneda($row_sql['TotalApropiacion_2022'])?></td>
			<td><?= Moneda($row_sql['TotalCompromiso_2022'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['TotalObligacion_2022'])?></p<</td>
			<td><p class="porc"></p></td>
		</tr>
		
		</tbody>
	</table>
                        </div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content44" aria-labelledby="profile-tab">
						<table class="table table-bordered"> <!--Tabla control Financiero 2023-->
		<thead>
		<tr>
			<th colspan="6" style="text-align: center">Control Financiero <?= $respCon['Anio4'] ?></th>
			
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>META FISICA / VIGENCIA</td>
			<td>Programado</td>
			<td>Apropiado</td>
			<td>Compromiso</td>
			<td>Obligación</td>
			<td>%</td>
		</tr>
		<tr>
			
			<td>SGP - Educación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Educacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Educacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Educacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Educacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Salud</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Salud'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Salud'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Salud'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Salud'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Agua Potable y S.B.</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Agua_Potable_y_Saneamiento_Basico'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Agua_Potable_y_Saneamiento_Basico'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Cultura</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Cultura'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Cultura'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Cultura'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Cultura'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Deportes</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Deporte'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Deporte'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Deporte'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Deporte'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Inversión</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Libre_Inversion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Libre_Inversion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Libre_Inversion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Libre_Inversion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Destinación</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Libre_Destinacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Libre_Destinacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Libre_Destinacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Libre_Destinacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Alimentación Escolar</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Alimentaci_n_Escolar'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Alimentaci_n_Escolar'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Alimentaci_n_Escolar'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Primera Infancia</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_SGP_Primera_Infancia'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_SGP_Primera_Infancia'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_SGP_Primera_Infancia'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_SGP_Primera_Infancia'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGR - Sistema General Regalías</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Regalias'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Regalias'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Regalias'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Regalias'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Departamental</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Cofinanciacion_Departamento'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Cofinanciacion_Departamento'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Cofinanciacion_Departamento'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Cofinanciacion_Departamento'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Naciónal</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Cofinanciacion_Nacion'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Cofinanciacion_Nacion'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Cofinanciacion_Nacion'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Cofinanciacion_Nacion'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Crédito</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Credito'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Credito'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Credito'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Credito'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Otros </td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Otros'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Otros'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Otros'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Otros'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos Propios</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Recursos_Propios'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Recursos_Propios'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Recursos_Propios'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Recursos_Propios'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos que no entran Ppto</td>
			<td><p class="prog"><?= Moneda($row_sql['Programacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_'])?></p></td>
			<td><?= Moneda($row_sql['Apropiacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_E'])?></td>
			<td><?= Moneda($row_sql['Compromiso_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['Obligacion_2023_Recursos_que_No_Ingresan_al_Presupuesto_de_la_En'])?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td><b>TOTAL</b></td>
			<td><p class="prog"><?= Moneda($row_sql['TotalProgramacion_2023'])?></p></td>
			<td><?= Moneda($row_sql['TotalApropiacion_2023'])?></td>
			<td><?= Moneda($row_sql['TotalCompromiso_2023'])?></td>
			<td><p class="obl"><?= Moneda($row_sql['TotalObligacion_2023'])?></p<</td>
			<td><p class="porc"></p></td>
		</tr>
		
		</tbody>
	</table>
                        </div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content55" aria-labelledby="profile-tab">
                          
						
	<table class="table table-bordered"> <!--Tabla control Financiero total cuatrenio-->
		<thead>
		<tr>
			<th colspan="6" style="text-align: center">Control Financiero Total Cuatrenio</th>
			
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>META FISICA / VIGENCIA</td>
			<td>Programado</td>
			<td>Apropiado</td>
			<td>Compromiso</td>
			<td>Obligación</td>
			<td>%</td>
		</tr>
		<tr>
			
			<td>SGP - Educación</td>
			<td><p class="sumProg"><?= Moneda($progEducacion)?></p></td>
			<td><?= Moneda($aproEducacion)?></td>
			<td><?= Moneda($compEducacion)?></td>
			<td><p class="sumObl"><?= Moneda($oblEducacion)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Salud</td>
			<td><p class="sumProg"><?= Moneda($progSalud)?></p></td>
			<td><?= Moneda($aproSalud)?></td>
			<td><?= Moneda($compSalud)?></td>
			<td><p class="sumObl"><?= Moneda($oblSalud)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Agua Potable y S.B.</td>
			<td><p class="prog"><?= Moneda($progAguaP)?></p></td>
			<td><?= Moneda($aproAguaP)?></td>
			<td><?= Moneda($compAguaP)?></td>
			<td><p class="obl"><?= Moneda($oblAguaP)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Cultura</td>
			<td><p class="prog"><?= Moneda($progCultura)?></p></td>
			<td><?= Moneda($aproCultura)?></td>
			<td><?= Moneda($compCultura)?></td>
			<td><p class="obl"><?= Moneda($aproCultura)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Deportes</td>
			<td><p class="prog"><?= $progDeporte?></p></td>
			<td><?= Moneda($aproDeporte)?></td>
			<td><?= Moneda($compDeporte)?></td>
			<td><p class="obl"><?= $oblDeporte?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Inversión</td>
			<td><p class="prog"><?= Moneda($progLibreInver)?></p></td>
			<td><?= Moneda($aproLibreInver)?></td>
			<td><?= Moneda($comLibreInver)?></td>
			<td><p class="obl"><?= Moneda($oblLibreInver)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Libre Destinación</td>
			<td><p class="prog"><?= Moneda($progLibreDes)?></p></td>
			<td><?= Moneda($aproLibreDes)?></td>
			<td><?= Moneda($compLibreDes)?></td>
			<td><p class="obl"><?= Moneda($aproLibreDes)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Alimentación Escolar</td>
			<td><p class="prog"><?= Moneda($progAliEscolar)?></p></td>
			<td><?= Moneda($aproAliEscolar)?></td>
			<td><?= Moneda($compAliEscolar)?></td>
			<td><p class="obl"><?= Moneda($aproAliEscolar)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGP - Primera Infancia</td>
			<td><p class="prog"><?= Moneda($progPriInfancia)?></p></td>
			<td><?= Moneda($aproPriInfancia)?></td>
			<td><?= Moneda($compPriInfancia)?></td>
			<td><p class="obl"><?= Moneda($aproPriInfancia)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>SGR - Sistema General Regalías</td>
			<td><p class="prog"><?= Moneda($progRegalias)?></p></td>
			<td><?= Moneda($aproRegalias)?></td>
			<td><?= Moneda($compRegalias)?></td>
			<td><p class="obl"><?= Moneda($oblRegalias)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Departamental</td>
			<td><p class="prog"><?= Moneda($progCofDepart)?></p></td>
			<td><?= Moneda($aproCofDepart)?></td>
			<td><?= Moneda($compCofDepart)?></td>
			<td><p class="obl"><?= Moneda($oblCofDepart)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Cofinanciación Naciónal</td>
			<td><p class="prog"><?= Moneda($progCofNac)?></p></td>
			<td><?= Moneda($aproCofNac)?></td>
			<td><?= Moneda($compCofNac)?></td>
			<td><p class="obl"><?= Moneda($oblgCofNac)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Crédito</td>
			<td><p class="prog"><?= Moneda($progCredito)?></p></td>
			<td><?= Moneda($aproCredito)?></td>
			<td><?= Moneda($compCredito)?></td>
			<td><p class="obl"><?= Moneda($oblCredito)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Otros </td>
			<td><p class="prog"><?= Moneda($progOtros)?></p></td>
			<td><?= Moneda($aproOtros)?></td>
			<td><?= Moneda($compOtros)?></td>
			<td><p class="obl"><?= Moneda($oblOtros)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos Propios</td>
			<td><p class="prog"><?= Moneda($progPropios)?></p></td>
			<td><?= Moneda($aproPropios)?></td>
			<td><?= Moneda($compPropios)?></td>
			<td><p class="obl"><?= Moneda($oblPropios)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td>Recursos que no entran Ppto</td>
			<td><p class="prog"><?= Moneda($progRecNoEntran)?></p></td>
			<td><?= Moneda($aproRecNoEntran)?></td>
			<td><?= Moneda($compRecNoEntran)?></td>
			<td><p class="obl"><?= Moneda($oblRecNoEntran)?></p></td>
			<td><p class="porc"></p></td>
		</tr>
		<tr>
			<td><b>TOTAL</b></td>
			<td><p class="prog"><?= Moneda($progTotal)?></p></td>
			<td><?= Moneda($aproTotal)?></td>
			<td><?= Moneda($comTotal)?></td>
			<td><p class="obl"><?= Moneda($oblTotal)?></p<</td>
			<td><p class="porc"></p></td>
		</tr>
		
		</tbody>
	</table>

                        </div>
                      </div>
                    </div>


	 
	 
		</div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        PARTE....</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div>
</div>


</div>

