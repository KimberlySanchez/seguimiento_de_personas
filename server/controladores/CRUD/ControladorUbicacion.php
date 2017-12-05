<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Ubicacion.php');
class ControladorUbicacion extends ControladorBase
{
   function crear(Ubicacion $ubicacion)
   {
      $sql = "INSERT INTO Ubicacion (idUbicacion,latitud,longitud,altura,fechaHora,idUsuario) VALUES (?,?,?,?,?,?);";
      $parametros = array($ubicacion->idUbicacion,$ubicacion->latitud,$ubicacion->longitud,$ubicacion->altura,$ubicacion->fechaHora,$ubicacion->idUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Ubicacion $ubicacion)
   {
      $parametros = array($ubicacion->idUbicacion,$ubicacion->latitud,$ubicacion->longitud,$ubicacion->altura,$ubicacion->fechaHora,$ubicacion->idUsuario,$ubicacion->id);
      $sql = "UPDATE Ubicacion SET idUbicacion = ?,latitud = ?,longitud = ?,altura = ?,fechaHora = ?,idUsuario = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM Ubicacion WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM Ubicacion;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Ubicacion WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Ubicacion LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Ubicacion;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Ubicacion WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}