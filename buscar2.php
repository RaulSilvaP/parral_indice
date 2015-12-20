 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Busque en Indice</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="CSSTableGenerator" >
<?php
include("conexion/conexion.php");
$nombre=$_POST['nombre'];
$sql="SELECT * from COMERCIO WHERE SOCIEDAD LIKE '%$nombre%' ORDER BY SOCIEDAD, ANO, NUM"; //consulta sql
$result = $indices->query($sql); //usamos la conexion para dar un resultado a la variable
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
	{
		echo "<h3>REGISTRO COMERCIO</h3>
		<table>
		<tbody>
			<tr>
			  <td>Tipo</td>
			  <td>Nombre</td>
			  <td>Fojas</td>
			  <td>Número</td>
			  <td>Año</td>
			<tr>";
			while ($row = $result->fetch_array()) 
			{
			   	echo " <tr>
				    <td>".$row['TIPO']."</td>
				    <td>".utf8_encode($row['SOCIEDAD'])."</td>
				    <td>".$row['FOJAS']."</td>
				    <td>".$row['NUM']."</td>
				    <td>".$row['ANO']."</td>
			    </tr>";

			}
		echo "</tbody>
		</table></div>";
	}

?>
</div>
</body>
</html>



