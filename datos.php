<?php
include 'conexion.php';

$id_region = filter_input(INPUT_POST, 'region');


$consulta = "select * from comunas where id_region = {$id_region}";
$ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

while($row = mysqli_fetch_array($ejecutar))
    
    echo '<option value="'.$row['id_comuna'].'">'.$row['nombre_comuna'].'</option>';


 function valida_rut($rut)
 {
     if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
         return false;
     }
 
     $rut = preg_replace('/[\.\-]/i', '', $rut);
     $dv = substr($rut, -1);
     $numero = substr($rut, 0, strlen($rut) - 1);
     $i = 2;
     $suma = 0;
     foreach (array_reverse(str_split($numero)) as $v) {
         if ($i == 8)
             $i = 2;
         $suma += $v * $i;
         ++$i;
     }
     $dvr = 11 - ($suma % 11);
 
     if ($dvr == 11)
         $dvr = 0;
     if ($dvr == 10)
         $dvr = 'K';
     if ($dvr == strtoupper($dv))
         return true;
     else
         return false;
 }
?>