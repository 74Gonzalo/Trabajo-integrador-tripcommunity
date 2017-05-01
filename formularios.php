
<?php

require_once("funciones.php");
$nombre = "";
$usuario = "";
$contraseña = "";
$conf_pass = "";

$errores = validarInformacion($_POST);


$a = json_encode($_POST);

if (count($errores)==0) {
  $fp = fopen ('base-datos.json','a');
  fwrite ($fp, $a.PHP_EOL);
  fclose($fp);
}
  //DECLARACION DE JSON Y ENVIO A base-datos.txt, algo está fallando..
// si va después, cuando valida correcto, hay un exit por lo que no se envían registros correctos
if($_POST){
  $errores = validarInformacion($_POST);
  if (count($errores)==0){
    header("Location:registro.php");exit;
    //acá debería ir el envío de la info del usuario a un archivo json o una base de datos
  }
}
if (!isset($errores)>0) {
$nombre = $_POST["Nombre"];
}

if(!isset($errores)>0){
  $usuario = $_POST["Usuario"];
}

if(!isset($errores)>0){
  $usuario = $_POST["password"];
}
if (!isset($errores)>0) {
$usuario = $_POST["conf_pass"];
}




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Unite!</title>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>
<body>
  <div class="form-container">
      <!--////////////////////////////////////////////   HEADER   //////////////////////////////////////////// -->
          <header class="form-header">
            <article class="form-logo">
              <h2>Trip Community</h2>
            </article>
            <a href="index.html" class="home">
              <span class="ion-ios-home-outline"></span>
            </a>
          </header>
      <!--//////////////////////////////////////////// FORMULARIO  //////////////////////////////////////////// -->

    <div class="form">
      <form action="formularios.php" method="post">

<?php if (count($errores) > 0) {?>
  <ul>
    <?php foreach ($errores as $error) {?>
    <li><?=$error?></li>
    <?php  }?>
  </ul>
<?php }?>

        <label>Nombre: </label><input type="text" name="Nombre"required>
        <br><br><br>
        <label>Usuario: </label><input type="text" name="Usuario"required>
        <br><br><br>
        <label>Contraseña: </label><input type="password" name="password"required>
        <br><br><br>
        <label>Confirmá contraseña: </label><input type="password" name="conf_pass"required>
        <br><br><br>
        <label>Género:</label>
        <label>Hombre</label><input type="radio" name="Genero"required>
        <label>Mujer</label><input type="radio" name="Genero"required>
        <label>Otro</label><input type="radio" name="Genero"required>
        <br><br><br>
        <label>Tipo de viajero:</label>
        <label>Mochilero</label><input type="checkbox" name="Mochilero">
        <label>Lujoso</label><input type="checkbox" name="Hostels">
        <label>Viajero Laboral</label><input type="checkbox" name="Viajes-cortos">
        <br><br><br>
        <label>País</label>
        <select name="País"required>
          <<option value="Se">Seleccioná</option>
          <option value="Ar">Argentina</option>
          <option value="Bo">Bolivia</option>
          <option value="Br">Brasil</option>
          <option value="Chi">Chile</option>
          <option value="Ur">Uruguay</option>
        </select>
        <br><br><br>
        <label>¿Dónde te gustaría viajar?</label>
        <br><br><br>
        <label>Europa</label><input type="checkbox" name="Europa">
        <label>América del Norte</label><input type="checkbox" name="Am-Norte">
        <label>América Latina</label><input type="checkbox" name="L-America">
        <label>Lejano Oriente</label><input type="checkbox" name="Lej-Oriente">
        <label>Medio Oriente</label><input type="checkbox" name="M-Oriente">
        <label>Africa</label><input type="checkbox" name="Africa">
        <br><br><br>
        <label>Acerca de vos</label>
        <br><br><br>
        <textarea name="Contanos" rows="8" cols="80"></textarea required>
          <br><br><br>
          <button type="submit" name="Enviar">ENVIAR</button>
        </section>

        <a href="index.php">Volver</a>
      </div>

    </body>
  </html>
