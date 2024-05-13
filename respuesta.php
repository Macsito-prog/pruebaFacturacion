<?php
include 'conexion.php';
include 'datos.php'; // Incluye el archivo donde tienes la función valida_rut

$nombre = $_POST['nombre'];
$alias = $_POST['alias'];
$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$entero = $_POST['entero'];

// Verificar si el RUT ya ha votado por el candidato seleccionado
$consulta = "select * from voto where rut = '{$rut}'";
$ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
$num_resultados = mysqli_num_rows($ejecutar);

if($num_resultados>0){
    $mensaje =  "Ya se ha registrado su voto con ese rut";
}else{
    $consulta = "insert into voto (nombre, alias, rut, email, region, comuna, candidato, entero) values ('${nombre}','${alias}','${rut}','${email}','${region}','${comuna}','${candidato}','${entero}')";
    $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

    $mensaje = "Su voto se ha registrado exitosamente.";
}

header('Location: confirmacion.php?mensaje='.urlencode($mensaje));


?>
