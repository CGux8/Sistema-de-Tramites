<?php
require_once("../config/conexion.php");
require_once("../models/Inhumacion.php");
require_once("../models/Email.php");

$inhumacion = new Inhumacion();
$email = new Email();

switch ($_GET["op"]) {
    case "registrar":

        $datos = $inhumacion->registrar_inhumacion(
            $_POST["inhum_nom"],
            $_POST["inhum_papell"],
            $_POST["inhum_sapell"],
            $_POST["inhum_sex"],
            $_POST["inhum_tip_doc"],
            $_POST["inhum_num_doc"],
            $_POST["inhum_mun_fall"],
            $_POST["inhum_man_muert"],
            $_POST["inhum_fecha_defun"],
            $_POST["inhum_cert_defun"],
            $_POST["inhum_fech_nac"],
            $_POST["inhum_cem_crem"],
            $_POST["inhum_nom_fun"],
            $_POST["inhum_nom_real_tram"],
            $_SESSION["usu_id"],
        );

        if (is_array($datos) == true and count($datos) == 0) {
            echo "0";
        } else {
            echo json_encode($datos);

            if (empty($_FILES['file']['name'])) {
            } else {
                $countfiles = count($_FILES['file']['name']);
                $ruta = "../assets/document/arch_inhumacion/" . $datos[0]["inhum_id"] . "/";
                $file_arr = array();
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }

                for ($index = 0; $index < $countfiles; $index++) {
                    $nombre = $_FILES['file']['tmp_name'][$index];
                    $destino = $ruta . $_FILES['file']['name'][$index];

                    $documento->insert_documento_inhumacion($datos[0]["inhum_id"], $nombre,$_SESSION["usu_id"]); /* $_FILES['file']['name'][$index], $_SESSION["usu_id"], 'Pendiente'); */

                    move_uploaded_file($nombre, $destino);
                }
            }
        }
        break;
}
