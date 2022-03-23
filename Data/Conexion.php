<?php
    class Conexion {

        public static function con() {

            $host = 'localhost';
            $user = 'root';
            $password = '';
            $db = 'personas';

            $enlace = mysqli_connect($host, $user, $password) or die("Error conectando al servidor");
              // Sres = mysqli_query("SHON DATABASES");
          // mysqli_query("SET NAMES 'utf8");
          //mysqli_set_charset ($enlace, "utf8");
          mysqli_select_db ($enlace, $db)or die ($db. " Base de datos no encontrada.". $user);
          return $enlace;
              //return mysqli_close($enlace);
        }

       /*  public static function con (){

            $enlace = mysqli_connect(self::$host, self::$user, self::$password, self::$db);
            if (!$enlace) {
               echo "Error: No se pudo conectar a MYSQL.". PHP_EOL;
               echo "error de depuración: " .mysqli_connect_error() . PHP_EOL;
               exit;
            }
            return mysqli_close($enlace);
        } */
    }
