<?php
// Tania Romero - DWS Semipresencial

require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/libs/bSeguridad.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classEntrenamientos.php';
require_once __DIR__ . '/../app/controlador/Controller.php';

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario

if (! isset($_SESSION['nivel_usuario'])) { 
    $_SESSION['nivel_usuario'] = 0;
}


/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 **/
$map = array(
    'home' => array('controller' =>'Controller', 'action' =>'home', 'nivel_usuario'=>0),
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0),
    'salir' => array('controller' =>'Controller', 'action' =>'salir', 'nivel_usuario'=>0),
    'error' => array('controller' =>'Controller', 'action' =>'error', 'nivel_usuario'=>0),
    'iniciarSesion' => array('controller' =>'Controller', 'action' =>'iniciarSesion', 'nivel_usuario'=>0),
    'registro' => array('controller' =>'Controller', 'action' =>'registro', 'nivel_usuario'=>0),    
    //TODO: MODIFICAR CONTROLADOR  
    'listarEjercicios' => array('controller' =>'Controller', 'action' =>'listarEjercicios', 'nivel_usuario'=>0),
    //TODO: MODIFICAR CONTROLADOR  
    'verEjercicio' => array('controller' =>'Controller', 'action' =>'verEjercicio', 'nivel_usuario'=>0),
    //TODO: MODIFICAR CONTROLADOR  
    'buscarPorTitulo' => array('controller' =>'Controller', 'action' =>'buscarPorTitulo', 'nivel_usuario'=>1),
    //TODO: MODIFICAR CONTROLADOR  
    'buscarPorAutor' => array('controller' =>'Controller', 'action' =>'buscarPorAutor', 'nivel_usuario'=>1),
    //TODO: MODIFICAR CONTROLADOR  
    'buscarPorEditorial' => array('controller' =>'Controller', 'action' =>'buscarPorEditorial', 'nivel_usuario'=>1),
    //TODO: CREAR CONTROLADOR  MIS EJERCICIOS

    
    'insertarEjercicio' => array('controller' =>'Controller', 'action' =>'insertarEjercicios', 'nivel_usuario'=>2)  
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .'</p></body></html>';
            exit;
            /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, 
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien 
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'],$controlador['action'])) {
    if ($controlador['nivel_usuario'] <= $_SESSION['nivel_usuario']) {
        call_user_func(array(new $controlador['controller'],
            $controlador['action']));
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
        // console_log("entrarErrorInicio");
}

?>