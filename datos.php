<?php
include 'conexion.php';

$id_region = filter_input(INPUT_POST, 'region');


$consulta = "select * from comunas where id_region = {$id_region}";
$ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

while($row = mysqli_fetch_array($ejecutar))
    
    echo '<option value="'.$row['id_comuna'].'">'.$row['nombre_comuna'].'</option>';

?>