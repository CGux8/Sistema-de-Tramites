<?php

/* TODO: Definicion de la clase Usuario que extiende de la clase Conectar */
class Usuario extends Conectar
{

    private $key = "tramitespalmiragux";
    private $cipher = "aes-256-cbc";

    public function login()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if (empty($correo) and empty($pass)) {
                header("Location:" . conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tm_usuario WHERE usu_correo = ? AND rol_id = 1";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->execute();
                $resultado = $sql->fetch();
                if ($resultado) {
                    $textoCifrado = $resultado["usu_pass"];

                    $iv_dec = substr(base64_decode($textoCifrado), 0, openssl_cipher_iv_length($this->cipher));
                    $cifradoSinIV = substr(base64_decode($textoCifrado), openssl_cipher_iv_length($this->cipher));
                    $textoDescifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

                    if ($textoDescifrado == $pass) {
                        if (is_array($resultado) and count($resultado) > 0) {
                            /* session_start(); */
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nomape"] = $resultado["usu_nomape"];
                            $_SESSION["usu_nit"] = $resultado["usu_nit"];
                            $_SESSION["usu_correo"] = $resultado["usu_correo"];
                            $_SESSION["usu_img"] = $resultado["usu_img"];
                            $_SESSION["rol_id"] = $resultado["rol_id"];
                            header("Location:" . conectar::ruta() . "view/Home/");
                            exit();
                        }
                    } else {
                        header("Location:" . conectar::ruta() . "index.php?m=3");
                        exit();
                    }
                } else {
                    header("Location:" . conectar::ruta() . "index.php?m=1");
                }
            }
        }
    }

    public function login_colaborador()
    {
        $conectar = parent::conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["usu_correo"];
            $pass = $_POST["usu_pass"];
            if (empty($correo) and empty($pass)) {
                header("Location:" . conectar::ruta() . "view/accesopersonal/index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tm_usuario WHERE usu_correo = ? AND rol_id IN (2,3)";
                $sql = $conectar->prepare($sql);
                $sql->bindValue(1, $correo);
                $sql->execute();
                $resultado = $sql->fetch();
                if ($resultado) {
                    $textoCifrado = $resultado["usu_pass"];

                    $iv_dec = substr(base64_decode($textoCifrado), 0, openssl_cipher_iv_length($this->cipher));
                    $cifradoSinIV = substr(base64_decode($textoCifrado), openssl_cipher_iv_length($this->cipher));
                    $textoDescifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

                    if ($textoDescifrado == $pass) {
                        if (is_array($resultado) and count($resultado) > 0) {
                            /* session_start(); */
                            $_SESSION["usu_id"] = $resultado["usu_id"];
                            $_SESSION["usu_nomape"] = $resultado["usu_nomape"];
                            $_SESSION["usu_nit"] = $resultado["usu_nit"];
                            $_SESSION["usu_correo"] = $resultado["usu_correo"];
                            $_SESSION["usu_img"] = $resultado["usu_img"];
                            $_SESSION["rol_id"] = $resultado["rol_id"];
                            header("Location:" . conectar::ruta() . "view/homecolaborador/");
                            exit();
                        }
                    } else {
                        header("Location:" . conectar::ruta() . "view/accesopersonal/index.php?m=3");
                        exit();
                    }
                } else {
                    header("Location:" . conectar::ruta() . "view/accesopersonal/index.php?m=1");
                }
            }
        }
    }

    /* TODO: metodo para registrar un nuevo usuario en la base de datos */
    public function registrar_usuario($usu_nomape, $usu_nit, $usu_correo, $usu_pass, $usu_img, $est)
    {

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_pass, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);

        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "INSERT INTO tm_usuario (usu_nomape,usu_nit,usu_correo,usu_pass,usu_img,rol_id,est)
                    VALUES
                    (?,?,?,?,?,1,?)";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $usu_nomape);
        $sql->bindValue(2, $usu_nit);
        $sql->bindValue(3, $usu_correo);
        $sql->bindValue(4, $textoCifrado);
        $sql->bindValue(5, $usu_img);
        $sql->bindValue(6, $est);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();

        $sql1 = "select last_insert_id() as 'usu_id'";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();

        return $sql1->fetchAll();
    }

    public function get_usuario_correo($usu_correo,)
    {

        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "SELECT * FROM tm_usuario
        WHERE usu_correo = ?";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $usu_correo);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
        return $sql->fetchAll();
    }

    public function get_usuario_id($usu_id)
    {
        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        /* TODO: consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "SELECT * FROM tm_usuario
        WHERE usu_id = ?";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $usu_id);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
        return $sql->fetchAll();
    }

    public function activar_usuario($usu_id)
    {

        $iv_dec = substr(base64_decode($usu_id), 0, openssl_cipher_iv_length($this->cipher));
        $cifradoSinIV = substr(base64_decode($usu_id), openssl_cipher_iv_length($this->cipher));
        $textoDescifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        $sql = "UPDATE tm_usuario
                SET 
                   est = 1,
                   fech_Acti = NOW()
                WHERE 
                    usu_id = ?";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $textoDescifrado);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
    }

    public function recuperar_usuario($usu_correo, $usu_pass)
    {

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_pass, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);

        /* TODO: Establece la conexion a la base de datos utilizando el metodo de la clase padre */
        $conectar = parent::conexion();

        /* TODO: Establece la codificacion de caracteres a utf8 utilizando el metodo de la clase padre */
        parent::set_names();

        $sql = "UPDATE tm_usuario
                SET
	                 usu_pass = ?
                WHERE
	                usu_correo = ?";

        /* TODO: Prepara la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: vincular los valores a los parametros de la consulta SQL */
        $sql->bindValue(1, $textoCifrado);
        $sql->bindValue(2, $usu_correo);
        /* TODO: Ejecuta la consulta SQL */
        $sql->execute();
    }

    public function insert_colaborador($usu_nomape, $usu_correo, $rol_id)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "INSERT INTO tm_usuario
            (usu_nomape,usu_correo,usu_img,rol_id,est)
            VALUES
            (?,?,'../../assets/picture/avatar.png',?,1)";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nomape);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $rol_id);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();

        $sql1 = "select last_insert_id() as 'usu_id'";
        $sql1 = $conectar->prepare($sql1);
        $sql1->execute();
        return $sql1->fetchAll();
    }

    public function get_colaborador()
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "SELECT
                tm_usuario.usu_id,
                tm_usuario.usu_nomape,
                tm_usuario.usu_correo,
                tm_usuario.rol_id,
                tm_rol.rol_nom,
                tm_usuario.fech_crea
                FROM tm_usuario
                INNER JOIN tm_rol ON tm_usuario.rol_id = tm_rol.rol_id
                WHERE tm_usuario.est = 1
                AND tm_usuario.rol_id IN (2,3)
                ORDER BY usu_nomape";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
        return $sql->fetchAll();
    }

    public function update_colaborador($usu_id, $usu_nomape, $usu_correo, $rol_id)
    {
        /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
        $conectar = parent::conexion();
        /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
        parent::set_names();
        /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
        $sql = "UPDATE tm_usuario
            SET
                usu_nomape = ?,
                usu_correo = ?,
                rol_id = ?,
                fech_modi = NOW()
            WHERE
                usu_id = ?";
        /* TODO:Preparar la consulta SQL */
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usu_nomape);
        $sql->bindValue(2, $usu_correo);
        $sql->bindValue(3, $rol_id);
        $sql->bindValue(4, $usu_id);
        /* TODO: Ejecutar la consulta SQL */
        $sql->execute();
    }

    public function eliminar_colaborador($usu_id){
            /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
            $conectar = parent::conexion();
            /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
            parent::set_names();
            /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
            $sql="UPDATE tm_usuario
                    SET
                        est = 0,
                        fech_elim = NOW()
                    WHERE
                        usu_id = ?";
            /* TODO:Preparar la consulta SQL */
            $sql=$conectar->prepare($sql);
            /* TODO: Vincular los valores a los parámetros de la consulta */
            $sql->bindValue(1,$usu_id);
            /* TODO: Ejecutar la consulta SQL */
            $sql->execute();
    }

     public function get_usuario_permiso_area($usu_id){
            /* TODO: Obtener la conexión a la base de datos utilizando el método de la clase padre */
            $conectar = parent::conexion();
            /* TODO: Establecer el juego de caracteres a UTF-8 utilizando el método de la clase padre */
            parent::set_names();
            /* TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario */
            $sql="SELECT 
                td_area_detalle.aread_id,
                td_area_detalle.area_id,
                td_area_detalle.aread_permi,
                tm_area.area_nom,
                tm_area.area_correo 
                FROM td_area_detalle
                INNER JOIN tm_area ON tm_area.area_id = td_area_detalle.area_id
                WHERE 
                td_area_detalle.usu_id = ?
                AND td_area_detalle.aread_permi = 'Si'
                AND tm_area.est=1";
            /* TODO:Preparar la consulta SQL */
            $sql=$conectar->prepare($sql);
            /* TODO: Vincular los valores a los parámetros de la consulta */
            $sql->bindValue(1,$usu_id);
            /* TODO: Ejecutar la consulta SQL */
            $sql->execute();
            return $sql->fetchAll(pdo::FETCH_ASSOC);
        }
    
}
