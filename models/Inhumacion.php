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

    public function insert_documento_inhumacion($inhum_id, $doc_nom, $usu_id)
    {
        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "INSERT INTO td_doc_inhumacion (inhum_id,doc_nom,usu_id)
                VALUES (?,?,?)";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $inhum_id);
        $sql->bindValue(2, $doc_nom);
        $sql->bindValue(3, $usu_id);
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
}
