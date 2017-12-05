<?php
class Grupo
{
   public $idGrupo;
   public $nombre;
   public $idUsuario;

   function __construct($idGrupo,$nombre,$idUsuario){
      $this->idGrupo = $idGrupo;
      $this->nombre = $nombre;
      $this->idUsuario = $idUsuario;
   }
}
?>