<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EstadoInvitacion.php');
class ControladorEstadoInvitacion extends ControladorBase
{
   function crear(EstadoInvitacion $estadoinvitacion)
   {
      $sql = "INSERT INTO EstadoInvitacion (idEstadoInvitacion,descripcion,idUsuario) VALUES (?,?,?);";
      $parametros = array($estadoinvitacion->idEstadoInvitacion,$estadoinvitacion->descripcion,$estadoinvitacion->idUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EstadoInvitacion $estadoinvitacion)
   {
      $parametros = array($estadoinvitacion->idEstadoInvitacion,$estadoinvitacion->descripcion,$estadoinvitacion->idUsuario,$estadoinvitacion->id);
      $sql = "UPDATE EstadoInvitacion SET idEstadoInvitacion = ?,descripcion = ?,idUsuario = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EstadoInvitacion WHERE id = ?;";
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
         $sql = "SELECT * FROM EstadoInvitacion;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EstadoInvitacion WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EstadoInvitacion LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EstadoInvitacion;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EstadoInvitacion WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EstadoInvitacion WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EstadoInvitacion WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EstadoInvitacion WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}