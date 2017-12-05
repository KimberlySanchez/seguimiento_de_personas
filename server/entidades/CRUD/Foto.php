<?php
class Foto
{
   public $idFoto;
   public $foto;
   public $idUsuario;

   function __construct($idFoto,$foto,$idUsuario){
      $this->idFoto = $idFoto;
      $this->foto = $foto;
      $this->idUsuario = $idUsuario;
   }
}
?>