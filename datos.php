<?php
include 'conexion.php';

$region_id = filter_input(INPUT_POST, 'region');


$consulta = "SELECT c.comuna_id, c.comuna_nombre from comunas c inner join provincias p on c.provincia_id = p.provincia_id inner join regiones r on p.region_id = r.region_id
where r.region_id = {$region_id}
";

$ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));

while($row = mysqli_fetch_array($ejecutar))
    
    echo '<option value="'.$row['comuna_id'].'">'.$row['comuna_nombre'].'</option>';


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