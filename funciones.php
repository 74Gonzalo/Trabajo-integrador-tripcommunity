<?php
$informacion = $_POST;
$datos = $_POST;


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

$mail = trim($informacion["mail"]);
if (strlen($mail)==0) {
  $errores["mail"] = "Por favor ingresá un mail";
}
elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
  $errores["mail"] = "Por favor ingresá un mail válido";
}
elseif (buscarPorMail()!==false) {
  $errores["mail"] = "El mail ya está registrado";
}

$password = $informacion["password"];

if(strlen($password) < 8){
  $errores["password"] = "la contraseña debe tener 8 caracteres como mínimo";
}
$conf_pass = $informacion["conf_pass"];

if(strlen($conf_pass) < 8)
{$errores["conf_pass"] = "Volvé a confirmar la contraseña";
}
if ( $informacion["password"] !== $informacion["conf_pass"] )
 {
$errores["conf_pass"] = "Las contraseñas deben ser iguales";
}

return $errores;}



$data=[];
function crearUsuario($datos){

$data = [];
  $data = [
      "Nombre" => $datos["Nombre"],
      "Usuario" => $datos["Usuario"],
      "mail" => $datos["mail"],
      "password" => password_hash($datos["password"], PASSWORD_DEFAULT),
      "conf_pass" => password_hash($datos["conf_pass"],PASSWORD_DEFAULT),
      "genero"=> $datos["genero"],
      "pais" =>$datos["pais"],
      "contanos"=>$datos["contanos"]
];
$data["id"] = traerNuevoId();
return $data;
}

  function traerTodos() {
    // Leo el archivo
    $archivo = file_get_contents("b-datos.json");

    // Lo divido por enters
    $usuariosJSON = explode(PHP_EOL, $archivo);
    // Quito el enter del final
    array_pop($usuariosJSON);

    $usuariosFinal = [];

    // Y CADA LINEA LA CONVIERTO DE JSON A ARRAY
    foreach($usuariosJSON as $json) {
      $usuariosFinal[] = json_decode($json, true);
    }

    return $usuariosFinal;
  }
  function traerNuevoId() {
    $usuarios = traerTodos();

    if (count($usuarios) == 0) {
      return $id = 1;
    }

    $elUltimo = array_pop($usuarios);

    $id = $elUltimo["id"];

    return $id + 1;
  }



  function buscarPorMail() {
        $todos = traerTodos();
$todos = [];
        foreach ($todos as $usuario) {
          if ($usuario["mail"] == $mail) {
            return $usuario;
          }
        }
      }

?>
