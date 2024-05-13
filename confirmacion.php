<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmacion</title>
</head>
<body>
<h1>
<?php
$mensaje = $_GET['mensaje'] ?? '';

if($mensaje != '') {
    echo $mensaje;
}

header("Refresh: 7; url=index.php");
?>
</h1>
</body>
</html>