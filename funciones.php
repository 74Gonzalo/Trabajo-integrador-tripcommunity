<?php

function validarInformacion($informacion){
  //errores inicia como array vacío, si el array permanece vacío se valida y es admitido

  $errores = [];
//primero valido el nombre,
  $nombre = trim($informacion["Nombre"]);
  if (strlen($nombre)==0) {
    $errores["Nombre"] = "Ingresá tu nombre!";
}
$usuario = trim($informacion["Usuario"]);
if(strlen($usuario)<8) {
    $errores["Usuario"] = "El usuario debe tener 8 caracteres como mínimo";
  }

$password = $informacion["password"];

if(strlen($password) < 8){
  $errores["password"] = "la contraseña debe tener 8 caracteres como mínimo";
}
$conf_pass = $informacion["conf_pass"];

if(strlen($conf_pass) < 7)
{$errores["conf_pass"] = "Volvé a confirmar la contraseña";
}
if (strlen($informacion["password"] <7 ) && strlen($informacion["conf_pass"]< 7)&& $informacion["password"] != $informacion["conf_pass"]  )
 {
$errores["conf_pass"] = "Volvé a confirmar la contraseña";
}

return $errores;}


?>
