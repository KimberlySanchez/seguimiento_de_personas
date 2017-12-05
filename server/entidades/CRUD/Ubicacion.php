<?php
class Ubicacion
{
   public $idUbicacion;
   public $latitud;
   public $longitud;
   public $altura;
   public $fechaHora;
   public $idUsuario;

   function __construct($idUbicacion,$latitud,$longitud,$altura,$fechaHora,$idUsuario){
      $this->idUbicacion = $idUbicacion;
      $this->latitud = $latitud;
      $this->longitud = $longitud;
      $this->altura = $altura;
      $this->fechaHora = $fechaHora;
      $this->idUsuario = $idUsuario;
   }
}
?>