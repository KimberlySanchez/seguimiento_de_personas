<?php
class Usuario
{
   public $idUsuario;
   public $nombre;
   public $apellido;
   public $telefono;
   public $email;
   public $idCredencial;

   function __construct($idUsuario,$nombre,$apellido,$telefono,$email,$idCredencial){
      $this->idUsuario = $idUsuario;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->idCredencial = $idCredencial;
   }
}
?>