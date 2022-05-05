<?php 
class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'db5004754274.hosting-data.io');
        define('nombre_bd', 'dbs3985634');
        define('usuario', 'dbu1436247');
        define('password', 'GalletaMKT77%2021');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}