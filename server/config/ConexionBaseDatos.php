<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        $array[] = new DatosConexion("","","ignug","","");
        $array[] = new DatosConexion("","","ignug","","");
        return $array;
    }
}