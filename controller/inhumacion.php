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
                $ruta = "../assets/document/" . $datos[0]["inhum_id"] . "/";
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
            if ($row["doc_estado"] == 'Pendiente') {
                $sub_array[] = "<span class='badge bg-warning'>Pendiente</span>";
            } else if ($row["doc_estado"] == 'Terminado') {
                $sub_array[] = "<span class='badge bg-primary'>Terminado</span>";
            }
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

    case "listarxarea":
        $datos = $inhumacion->get_documento_x_area($_POST["area_id"], $_POST["doc_estado"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["rdcdo"];
            $sub_array[] = $row["fech_crea"];
            /* $sub_array[] = $row["area_nom"]; */
            $sub_array[] = $row["tra_nom"];
            $sub_array[] = $row["usu_nomape"];
            if ($row["doc_estado"] == 'Pendiente') {
                $sub_array[] = "<span class='badge bg-warning'>Pendiente</span>";
            } else if ($row["doc_estado"] == 'Terminado') {
                $sub_array[] = "<span class='badge bg-primary'>Terminado</span>";
            }
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

    case "mostrar":
        $datos = $inhumacion->get_documento_x_id($_POST["inhum_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["inhum_id"] = $row["inhum_id"];
                /*  $output["area_id"] = $row["area_id"];
                    $output["area_nom"] = $row["area_nom"];
                    $output["area_correo"] = $row["area_correo"];
                    $output["fech_crea"] = $row["fech_crea"]; */
                $output["inhum_nom"] = $row["inhum_nom"];
                $output["inhum_papell"] = $row["inhum_papell"];
                $output["inhum_sapell"] = $row["inhum_sapell"];
                $output["inhum_sex"] = $row["inhum_sex"];
                $output["inhum_tip_doc"] = $row["inhum_tip_doc"];
                $output["inhum_num_doc"] = $row["inhum_num_doc"];
                $output["inhum_mun_fall"] = $row["inhum_mun_fall"];
                $output["inhum_man_muert"] = $row["inhum_man_muert"];
                $output["inhum_fecha_defun"] = $row["inhum_fecha_defun"];
                $output["inhum_cert_defun"] = $row["inhum_cert_defun"];
                $output["inhum_fech_nac"] = $row["inhum_fech_nac"];
                $output["inhum_cem_crem"] = $row["inhum_cem_crem"];
                $output["inhum_nom_fun"] = $row["inhum_nom_fun"];
                $output["inhum_nom_real_tram"] = $row["inhum_nom_real_tram"];
                $output["doc_respuesta"] = $row["doc_respuesta"];
                /*  $output["tra_id"] = $row["tra_id"];
                    $output["tra_nom"] = $row["tra_nom"];
                    $output["usu_id"] = $row["usu_id"];*/
                /*     $output["usu_nomape"] = $row["usu_nomape"];
                    $output["usu_correo"] = $row["usu_correo"];
                     $output["cant"] = $row["cant"]; 
                     $output["rdcdo"] = $row["rdcdo"];  */
                /* $output["doc_estado"] = $row["doc_estado"]; */
                /* $output["doc_respuesta"] = $row["doc_respuesta"]; */
            }
            echo json_encode($output);
        }
        break;

    case "listardetalle":
        $datos = $inhumacion->get_documento_detalle_x_doc_id($_POST["inhum_id"], $_POST["det_tipo"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            /* $sub_array[] = $row["rdcdo"]; */
            $sub_array[] = $row["fech_crea"];
            $sub_array[] = $row["usu_nomape"];
            $sub_array[] = $row["doc_nom"];
            $sub_array[] = '<a class="btn btn-soft-primary waves-effect waves-light btn-sm" href="../../assets/document/' . $row["inhum_id"] . '/' . $row["doc_nom"] . '" target="_blank" download><i class="bx bx-search-alt font-size-16 align-middle"></i></a>';
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

    case "respuesta":
        /* TODO: Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
        $inhumacion->actualizar_respuesta_documento($_POST["inhum_id"], $_POST["doc_respuesta"], $_SESSION["usu_id"]);

        if (empty($_FILES['file']['name'])) {
        } else {
            $countfiles = count($_FILES['file']['name']);
            $ruta = "../assets/document/" . $_POST["inhum_id"] . "/";
            $file_arr = array();
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }

            for ($index = 0; $index < $countfiles; $index++) {
                $nombre = $_FILES['file']['tmp_name'][$index];
                $destino = $ruta . $_FILES['file']['name'][$index];

                $inhumacion->insert_documento_inhumacion($_POST["inhum_id"], $_FILES['file']['name'][$index], $_SESSION["usu_id"], 'Terminado');

                move_uploaded_file($nombre, $destino);
            }

            /* TODO:Enviar Alerta por Email */
            $email->respuesta_registro($_POST["inhum_id"]);
        }

        $mes = date("m");
        $anio = date("Y");

        echo $mes . "-" . $anio . "-" . $_POST["inhum_id"];
        break;

    case "listarxusuterminado":
        $datos = $inhumacion->get_documento_x_usu_terminado($_SESSION["usu_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["rdcdo"];
            $sub_array[] = $row["fech_crea"];
            /* $sub_array[] = $row["area_nom"]; */
            $sub_array[] = $row["tra_nom"];
            $sub_array[] = $row["usu_nomape"];
            if ($row["doc_estado"] == 'Pendiente') {
                $sub_array[] = "<span class='badge bg-warning'>Pendiente</span>";
            } else if ($row["doc_estado"] == 'Terminado') {
                $sub_array[] = "<span class='badge bg-primary'>Terminado</span>";
            }
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
