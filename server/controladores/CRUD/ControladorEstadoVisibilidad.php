<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EstadoVisibilidad.php');
class ControladorEstadoVisibilidad extends ControladorBase
{
   function crear(EstadoVisibilidad $estadovisibilidad)
   {
      $sql = "INSERT INTO EstadoVisibilidad (idEstadoVisibilidad,visible,noVisible) VALUES (?,?,?);";
      $parametros = array($estadovisibilidad->idEstadoVisibilidad,$estadovisibilidad->visible,$estadovisibilidad->noVisible);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EstadoVisibilidad $estadovisibilidad)
   {
      $parametros = array($estadovisibilidad->idEstadoVisibilidad,$estadovisibilidad->visible,$estadovisibilidad->noVisible,$estadovisibilidad->id);
      $sql = "UPDATE EstadoVisibilidad SET idEstadoVisibilidad = ?,visible = ?,noVisible = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EstadoVisibilidad WHERE id = ?;";
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
         $sql = "SELECT * FROM EstadoVisibilidad;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EstadoVisibilidad WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EstadoVisibilidad LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EstadoVisibilidad;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EstadoVisibilidad WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EstadoVisibilidad WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EstadoVisibilidad WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EstadoVisibilidad WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}