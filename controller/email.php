<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
require_once("../models/Email.php");

$usuario = new Usuario();
$email = new Email();

switch ($_GET["op"]) {
    case "recuperar":

        $datos = $usuario->get_usuario_correo($_POST["usu_correo"],1);
        if (is_array($datos) && count($datos) == 0) {
            echo "0"; // No existe el correo
        }else{
            $email->recuperar($_POST["usu_correo"]);
            echo "1"; // Correo enviado
        }

        break;
}
