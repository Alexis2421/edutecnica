<?php

    class conexion{
        private static $instancia = null;

        public static function conexionBD(){
            if (!isset(self::$instancia)) {
                $opcionesPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instancia = new PDO("mysql:host=localhost;dbname=edutecnica",'root','',$opcionesPDO);
                // echo "Conexión Realizada";
            }

            return self::$instancia;
        }
    }