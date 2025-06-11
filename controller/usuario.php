<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
require_once("../models/Email.php");

$usuario = new Usuario();
$email = new Email();

switch ($_GET["op"]) {
    case "registrar":

        $datos = $usuario->get_usuario_correo($_POST["usu_correo"]);
        if (is_array($datos) && count($datos) == 0) {

            $datos1 = $usuario->registrar_usuario(
                $_POST["usu_nomape"],
                $_POST["usu_nit"],
                $_POST["usu_correo"],
                $_POST["usu_pass"],
                "../assets/picture/avatar.png",2
            );

            $email->registrar($datos1[0] ['usu_id']);
            
            echo "1";
        } else {
            echo "0";
        }

        break;

        case "activar":
            $usuario->activar_usuario($_POST["usu_id"]);
            break;
}


/* registro con gmail = usu_img -> 3.Maquetacion = 1.20 <<<-----------------------------*/