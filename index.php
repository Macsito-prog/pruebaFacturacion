<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css">
  <title>Formulario de Votación</title>
</head>

<body>
  <div class="container">
    <form action="respuesta.php" method="post">
      <strong>
        <h1>Formulario de Votación:</h1>
      </strong>
      <div class="datos">
        <label for="">Nombre y Apellido</label>
        <input type="text" name="nombre" id="nombre" required>
      </div>
      <div class="datos">
        <label for="">Alias</label>
        <input type="text" name="alias" id="alias" required>
      </div>
      <div class="datos">
        <label for="">RUT</label>
        <input type="text" name="rut" id="rut" required onblur=validarRut() >
      </div>
      <div class="datos">
        <label for="">Email</label>
        <input type="email" name="email" id="email" required onblur=validarEmail()>
      </div>
      <div class="datos">
        <label for="">Región</label>
        <select name="region" id="region">
          <option value="0">Seleccione una opción</option>
          <?php
          include 'conexion.php';
          $consulta = "select * from regiones";
          $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion))
          ?>
          <?php
          foreach($ejecutar as $opc):
            $region_id = $opc['region_id'];
            $region_nombre = $opc['region_nombre'];

          ?>
            <option value="<?php echo $region_id ?>"><?php echo $region_nombre ?></option>
          <?php
          endforeach
          ?>
        </select>
      </div>
      <div class="datos">
        <label for="">Comuna</label>
        <select name="comuna" id="comuna">
          <option value=0>Seleccione una Opción</option>

        </select>
      </div>
      <div class="datos">
        <label for="">Candidato</label>
        <select name="candidato" id="candidato" required>
          <option value="0">Seleccione una opción</option>
          <?php
          $consulta_candidato = "Select * from candidato";
          $ejecutar_candidato = mysqli_query($conexion, $consulta_candidato) or die(mysqli_error($conexion))
          ?>
          <?php
          foreach ($ejecutar_candidato as $opc_candidato) :
            $id_candidato = $opc_candidato['id_candidato'];
            $nombre_candidato = $opc_candidato['nombre_candidato'];
            $partido_candidato = $opc_candidato['partido_candidato'];
          ?>
            <option value="<?php echo $id_candidato ?>"><?php echo $nombre_candidato ?></option>
          <?php
          endforeach
          ?>
        </select>
      </div>
      <div class="datos">
        <label for="">Cómo se enteró de Nosotros</label>
        <input type="checkbox" name="entero" id="web"> Web
        <input type="checkbox" name="entero" id="tv"> TV
        <input type="checkbox" name="entero" id="redes"> Redes Sociales
        <input type="checkbox" name="entero" id="amigo"> Amigo
      </div>
      <br>
      <div class="boton">
        <input type="submit" value="Votar">
      </div>
    </form>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>