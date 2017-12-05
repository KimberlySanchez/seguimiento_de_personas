<?php
class Rol
{
   public $idRol;
   public $descripcion;

   function __construct($idRol,$descripcion){
      $this->idRol = $idRol;
      $this->descripcion = $descripcion;
   }
}
?>