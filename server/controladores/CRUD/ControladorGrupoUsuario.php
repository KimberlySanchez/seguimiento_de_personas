<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/GrupoUsuario.php');
class ControladorGrupoUsuario extends ControladorBase
{
   function crear(GrupoUsuario $grupousuario)
   {
      $sql = "INSERT INTO GrupoUsuario (idGrupoUsuario,idUsuario,idGrupo,idRol,idEstadoInvitacion,idEstadoVisibilidad) VALUES (?,?,?,?,?,?);";
      $parametros = array($grupousuario->idGrupoUsuario,$grupousuario->idUsuario,$grupousuario->idGrupo,$grupousuario->idRol,$grupousuario->idEstadoInvitacion,$grupousuario->idEstadoVisibilidad);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(GrupoUsuario $grupousuario)
   {
      $parametros = array($grupousuario->idGrupoUsuario,$grupousuario->idUsuario,$grupousuario->idGrupo,$grupousuario->idRol,$grupousuario->idEstadoInvitacion,$grupousuario->idEstadoVisibilidad,$grupousuario->id);
      $sql = "UPDATE GrupoUsuario SET idGrupoUsuario = ?,idUsuario = ?,idGrupo = ?,idRol = ?,idEstadoInvitacion = ?,idEstadoVisibilidad = ? WHERE id = ?;";
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
      $sql = "DELETE FROM GrupoUsuario WHERE id = ?;";
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
         $sql = "SELECT * FROM GrupoUsuario;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM GrupoUsuario WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM GrupoUsuario LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM GrupoUsuario;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM GrupoUsuario WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM GrupoUsuario WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM GrupoUsuario WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM GrupoUsuario WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}