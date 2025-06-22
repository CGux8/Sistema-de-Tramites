<?php
require_once("../config/conexion.php");
require_once("../models/Inhumacion.php");
require_once("../models/Email.php");

$inhumacion = new Inhumacion();
$email = new Email();

switch ($_GET["op"]) {
    case "registrar":

        $area_id = 1;
        $tra_id = 1;

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
            $area_id,
            $tra_id
        );

        if (is_array($datos) == true and count($datos) == 0) {
            echo "0";
        } else {

            $anio = date("Y");
            $cod_tram = "3521";

            $rdcdo = $anio . "-" . $cod_tram . "-" . $datos[0]["inhum_id"];

            echo $rdcdo;

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

                    $inhumacion->insert_documento_inhumacion($datos[0]["inhum_id"], $_FILES['file']['name'][$index], $_SESSION["usu_id"], 'Pendiente');

                    move_uploaded_file($nombre, $destino);
                }
            }

            /* TODO:Enviar Alerta por Email */
            $email->enviar_registro($datos[0]["inhum_id"]);
        }
        break;

    /* TODO: Listado de usuario segun formato json para el datatable */
    case "listarusuario":
        $datos = $inhumacion->get_documento_x_usu($_SESSION["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["rdcdo"];
            $sub_array[] = $row["fech_crea"];
            $sub_array[] = $row["area_nom"];
            $sub_array[] = $row["tra_nom"];
            $sub_array[] = $row["usu_nomape"];
            /* if ($row["doc_estado"] == 'Pendiente') {
                $sub_array[] = "<span class='badge bg-warning'>Pendiente</span>";
            } else if ($row["doc_estado"] == 'Terminado') {
                $sub_array[] = "<span class='badge bg-primary'>Terminado</span>";
            } */
            $sub_array[] = '<button type="button" class="btn btn-soft-primary waves-effect waves-light btn-sm" onClick="ver(' . $row["inhum_id"] . ')"><i class=" bx bx-message-alt-dots font-size-16 align-middle"></i></button>';
            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}
