<?php

/* TODO: Definicion de la clase Inhumacion que extiende de la clase Conectar */
class Inhumacion extends Conectar
{

    /* TODO: metodo para registrar un nuevo registro de inhumacion en la base de datos */
    public function registrar_inhumacion(
        $inhum_nom,
        $inhum_papell,
        $inhum_sapell,
        $inhum_sex,
        $inhum_tip_doc,
        $inhum_num_doc,
        $inhum_mun_fall,
        $inhum_man_muert,
        $inhum_fecha_defun,
        $inhum_cert_defun,
        $inhum_fech_nac,
        $inhum_cem_crem,
        $inhum_nom_fun,
        $inhum_nom_real_tram,
        $usu_id,
        $area_id,
        $tra_id
    ) {

        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "INSERT INTO tm_inhum (inhum_nom,inhum_papell,inhum_sapell,inhum_sex,inhum_tip_doc,
                inhum_num_doc,inhum_mun_fall,inhum_man_muert,inhum_fecha_defun,inhum_cert_defun,
                inhum_fech_nac,inhum_cem_crem,inhum_nom_fun,inhum_nom_real_tram,usu_id,area_id,tra_id)
                VALUES
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $inhum_nom);
        $sql->bindValue(2, $inhum_papell);
        $sql->bindValue(3, $inhum_sapell);
        $sql->bindValue(4, $inhum_sex);
        $sql->bindValue(5, $inhum_tip_doc);
        $sql->bindValue(6, $inhum_num_doc);
        $sql->bindValue(7, $inhum_mun_fall);
        $sql->bindValue(8, $inhum_man_muert);
        $sql->bindValue(9, $inhum_fecha_defun);
        $sql->bindValue(10, $inhum_cert_defun);
        $sql->bindValue(11, $inhum_fech_nac);
        $sql->bindValue(12, $inhum_cem_crem);
        $sql->bindValue(13, $inhum_nom_fun);
        $sql->bindValue(14, $inhum_nom_real_tram);
        $sql->bindValue(15, $usu_id);
        $sql->bindValue(16, $area_id);
        $sql->bindValue(17, $tra_id);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();

        $sql1 = "select last_insert_id() as 'inhum_id'";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll(pdo::FETCH_ASSOC);
    }

    public function insert_documento_inhumacion($inhum_id, $doc_nom, $usu_id, $det_tipo)
    {
        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "INSERT INTO td_doc_inhumacion (inhum_id,doc_nom,usu_id,det_tipo)
                VALUES (?,?,?,?)";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $inhum_id);
        $sql->bindValue(2, $doc_nom);
        $sql->bindValue(3, $usu_id);
        $sql->bindValue(4, $det_tipo);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
    }

    public function get_documento_x_id($inhum_id)
    {
        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "CALL sp_l_documento_01(?);";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $inhum_id);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
    }

    public function get_documento_x_usu($usu_id)
    {
        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "CALL sp_l_documento_02(?);";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $usu_id);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
    }

    public function get_documento_x_area($area_id,$doc_estado)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "	SELECT
		tm_inhum.inhum_id,
		tm_inhum.area_id,
		tm_area.area_nom,
		tm_area.area_correo,
		tm_inhum.fech_crea,
		tm_inhum.inhum_nom,
		tm_inhum.inhum_papell,
		tm_inhum.inhum_sapell,
		tm_inhum.inhum_sex,
		tm_inhum.inhum_tip_doc,
		tm_inhum.inhum_num_doc,
		tm_inhum.inhum_mun_fall,
		tm_inhum.inhum_man_muert,
		tm_inhum.inhum_fecha_defun,
		tm_inhum.inhum_cert_defun,
		tm_inhum.inhum_fech_nac,
		tm_inhum.inhum_cem_crem,
		tm_inhum.inhum_nom_fun,
		tm_inhum.inhum_nom_real_tram,
		tm_inhum.tra_id,
		tm_tramite.tra_nom,
		tm_inhum.usu_id,
		tm_usuario.usu_nomape,
		tm_usuario.usu_correo,
        tm_inhum.doc_estado,
		CONCAT(DATE_FORMAT(tm_inhum.fech_crea,'%Y'),'-',tm_tramite.tra_cod,'-',tm_inhum.inhum_id)
 		AS rdcdo 
		FROM tm_inhum
		INNER JOIN tm_area ON tm_inhum.area_id = tm_area.area_id
		INNER JOIN tm_tramite ON tm_inhum.tra_id = tm_tramite.tra_id
		INNER JOIN tm_usuario ON tm_inhum.usu_id = tm_usuario.usu_id
		WHERE tm_inhum.area_id = ?
        AND tm_inhum.doc_estado = ?";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1, $area_id);
        $sql->bindValue(2, $doc_estado);
        /* $sql->bindValue(2, $doc_estado); */
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
    }

    public function get_documento_detalle_x_doc_id($inhum_id, $det_tipo)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "SELECT 
                td_doc_inhumacion.doc_id,
                td_doc_inhumacion.inhum_id,
                td_doc_inhumacion.doc_nom,
                td_doc_inhumacion.usu_id,
                tm_usuario.usu_nomape,
                tm_usuario.usu_correo,
                tm_usuario.usu_img,
                td_doc_inhumacion.fech_crea
                FROM td_doc_inhumacion 
                INNER JOIN tm_usuario ON td_doc_inhumacion.usu_id = tm_usuario.usu_id
                WHERE 
                td_doc_inhumacion.inhum_id = ?
                AND td_doc_inhumacion.det_tipo = ?";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1, $inhum_id);
        $sql->bindValue(2, $det_tipo);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
    }

    public function actualizar_respuesta_documento($inhum_id, $doc_respuesta, $doc_usu_terminado)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "UPDATE tm_inhum
                SET
                    doc_respuesta = ?,
                    doc_usu_terminado = ?,
                    fech_terminado = NOW(),
                    doc_estado = 'Terminado'
                WHERE
                    inhum_id = ?";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1, $doc_respuesta);
        $sql->bindValue(2, $doc_usu_terminado);
        $sql->bindValue(3, $inhum_id);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
    }

     public function get_documento_x_usu_terminado($doc_usu_terminado)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "	SELECT
		tm_inhum.inhum_id,
		tm_inhum.area_id,
		tm_area.area_nom,
		tm_area.area_correo,
		tm_inhum.fech_crea,
		tm_inhum.inhum_nom,
		tm_inhum.inhum_papell,
		tm_inhum.inhum_sapell,
		tm_inhum.inhum_sex,
		tm_inhum.inhum_tip_doc,
		tm_inhum.inhum_num_doc,
		tm_inhum.inhum_mun_fall,
		tm_inhum.inhum_man_muert,
		tm_inhum.inhum_fecha_defun,
		tm_inhum.inhum_cert_defun,
		tm_inhum.inhum_fech_nac,
		tm_inhum.inhum_cem_crem,
		tm_inhum.inhum_nom_fun,
		tm_inhum.inhum_nom_real_tram,
		tm_inhum.tra_id,
		tm_tramite.tra_nom,
		tm_inhum.usu_id,
		tm_usuario.usu_nomape,
		tm_usuario.usu_correo,
        tm_inhum.doc_estado,
		CONCAT(DATE_FORMAT(tm_inhum.fech_crea,'%Y'),'-',tm_tramite.tra_cod,'-',tm_inhum.inhum_id)
 		AS rdcdo 
		FROM tm_inhum
		INNER JOIN tm_area ON tm_inhum.area_id = tm_area.area_id
		INNER JOIN tm_tramite ON tm_inhum.tra_id = tm_tramite.tra_id
		INNER JOIN tm_usuario ON tm_inhum.usu_id = tm_usuario.usu_id
		WHERE tm_inhum.doc_usu_terminado = ?";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: Vincular los valores a los parámetros de la consulta */
        $sql->bindValue(1, $doc_usu_terminado);
        /* $sql->bindValue(2, $doc_estado); */
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll(pdo::FETCH_ASSOC);
    }

}
