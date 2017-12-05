<?php
class EstadoVisibilidad
{
   public $idEstadoVisibilidad;
   public $visible;
   public $noVisible;

   function __construct($idEstadoVisibilidad,$visible,$noVisible){
      $this->idEstadoVisibilidad = $idEstadoVisibilidad;
      $this->visible = $visible;
      $this->noVisible = $noVisible;
   }
}
?>