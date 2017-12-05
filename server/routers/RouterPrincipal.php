<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "credencial":
            $routerCredencial = new RouterCredencial();
            return json_encode($routerCredencial->route());
            break;
         case "estadoinvitacion":
            $routerEstadoInvitacion = new RouterEstadoInvitacion();
            return json_encode($routerEstadoInvitacion->route());
            break;
         case "estadovisibilidad":
            $routerEstadoVisibilidad = new RouterEstadoVisibilidad();
            return json_encode($routerEstadoVisibilidad->route());
            break;
         case "foto":
            $routerFoto = new RouterFoto();
            return json_encode($routerFoto->route());
            break;
         case "grupo":
            $routerGrupo = new RouterGrupo();
            return json_encode($routerGrupo->route());
            break;
         case "grupousuario":
            $routerGrupoUsuario = new RouterGrupoUsuario();
            return json_encode($routerGrupoUsuario->route());
            break;
         case "rol":
            $routerRol = new RouterRol();
            return json_encode($routerRol->route());
            break;
         case "ubicacion":
            $routerUbicacion = new RouterUbicacion();
            return json_encode($routerUbicacion->route());
            break;
         case "usuario":
            $routerUsuario = new RouterUsuario();
            return json_encode($routerUsuario->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
