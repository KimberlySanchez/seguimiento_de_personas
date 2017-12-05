<?php
class Credencial
{
   public $idCredencial;
   public $username;
   public $pass;

   function __construct($idCredencial,$username,$pass){
      $this->idCredencial = $idCredencial;
      $this->username = $username;
      $this->pass = $pass;
   }
}
?>