<!-- Conexión a la base de datos -->
<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "desis";
$conexion = mysqli_connect($servidor,$usuario,$password,$db) or die(mysqli_error($conexion));



?>