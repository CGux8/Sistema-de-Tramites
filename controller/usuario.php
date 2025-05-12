<?php
    /* TODO: incluye el archivo de configuracion de la conexion a la base de datos y la clase Usuario */
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    
    /* TODO: crea una instancia de la clase Usuario */
    $usuario = new Usuario();

    /* TODO: utiliza una estructura switch para determinar la operación a realizar segun el valor de la variable $_GET["op"] */
    switch($_GET["op"]){

       /*  TODO: si la operacion es registrar */
        case "registrar":
            /* TODO: llama al metodo registrar_usuario de la clase Usuario y pasa los parametros necesarios desde el formulario */
            $usuario->registrar_usuario(
                $_POST["usu_nomape"],
                $_POST["usu_nit"],
                $_POST["usu_correo"],
                $_POST["usu_pass"]
            );
            break;
    }
?>