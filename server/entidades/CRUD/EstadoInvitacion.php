<?php
class EstadoInvitacion
{
   public $idEstadoInvitacion;
   public $descripcion;
   public $idUsuario;

   function __construct($idEstadoInvitacion,$descripcion,$idUsuario){
      $this->idEstadoInvitacion = $idEstadoInvitacion;
      $this->descripcion = $descripcion;
      $this->idUsuario = $idUsuario;
   }
}
?>