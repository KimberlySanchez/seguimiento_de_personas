<?php
class GrupoUsuario
{
   public $idGrupoUsuario;
   public $idUsuario;
   public $idGrupo;
   public $idRol;
   public $idEstadoInvitacion;
   public $idEstadoVisibilidad;

   function __construct($idGrupoUsuario,$idUsuario,$idGrupo,$idRol,$idEstadoInvitacion,$idEstadoVisibilidad){
      $this->idGrupoUsuario = $idGrupoUsuario;
      $this->idUsuario = $idUsuario;
      $this->idGrupo = $idGrupo;
      $this->idRol = $idRol;
      $this->idEstadoInvitacion = $idEstadoInvitacion;
      $this->idEstadoVisibilidad = $idEstadoVisibilidad;
   }
}
?>