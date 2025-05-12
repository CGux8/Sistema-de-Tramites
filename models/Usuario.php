<?php

    /* TODO: Definicion de la clase Usuario que extiende de la clase Conectar */
     class Usuario extends conectar {

        /* TODO: metodo para registrar un nuevo usuario en la base de datos */
        public function registrar_usuario($usu_nomape, $usu_nit, $usu_correo, $usu_pass){

            /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
            $conectar = parent::conexion();
            
            /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
            parent::set_names();

            /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
            $sql = "INSERT INTO tm_usuario 
                    (usu_nomape,usu_nit,usu_correo,usu_pass)
                    VALUES
                    (?,?,?,?)";

            /* TODO: Prepara la consulta SQL */
            $sql = $conectar->prepare($sql);
            /* TODO: vincular los valores a los parametros de la consulta SQL */
            $sql->bindValue(1,$usu_nomape);
            $sql->bindValue(2,$usu_nit);
            $sql->bindValue(3,$usu_correo);
            $sql->bindValue(4,$usu_pass);  
            /* TODO: Ejecuta la consulta SQL */   
            $sql->execute();
        }
     }

?>