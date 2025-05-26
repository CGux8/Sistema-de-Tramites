<?php

/* TODO: Inicia la session (si no esta iniciada) */

session_start(); // Inicia la session
error_reporting(E_ALL);
ini_set('display_errors', 1); 
    
    /* TODO: Definicion de la clase conectar */
    class Conectar{
        
        /* TODO: propiedad protegida para almacenar la conexion a la base de datos */
        protected $dbh;

        /* TODO: metodo para establecer la conexion a la base de datos */
        protected function conexion(){
         try{
             /* TODO: Intenta establecer la conexion utilizando PDO */
             $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=tramitespalmira","root","");
               return $conectar;
          }
          catch(Exception $e){
               /* TODO: En caso de error, imprime un mensaje y termina el script */
               print "Error BD: " . $e->getMessage() . "<br/>";
            die();
            }
        }

        /* TODO: metodo para establecer la codificacion de caracteres a utf8 */
        public function set_names(){
             return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* TODO: metodo estatico que devuelve la ruta base del proyecto */
        public static function ruta(){
             return "http://localhost/tramites-gov/";
        }
    }
?>  