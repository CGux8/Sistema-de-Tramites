<?php
require_once("../../config/conexion.php");
require_once("../../models/Rol.php");
$rol = new Rol();
$datos = $rol->validar_menu_x_rol($_SESSION["rol_id"], "nuevotramite");
if (isset($_SESSION["usu_id"]) and count($datos) > 0) {
?>
    <html lang="es">

    <head>
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate, max-age=0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <title>Nuevo Tramite Palmira</title>
        <?php require_once("../html/head.php") ?>
    </head>

    <body>

      
    </body>

    </html>
<?php
} else {
    header("Location:" . Conectar::ruta() . "index.php");
}
?>