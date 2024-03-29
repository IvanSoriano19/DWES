<?php
// web/index.php
// carga del modelo y los controladores
require_once __DIR__ . '/../app/libs/Config.php';
require_once __DIR__ . '/../app/libs/utils.php';
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classAlimentos.php';
require_once __DIR__ . '/../app/controlador/Controller.php';



/*
Si tenemos que usar sesiones podemos poner aqui el inicio de sesión, de manera que si el usuario todavia no está logueado
lo identificamos como visitante, por ejemplo de la siguiente manera: $_SESSION['nivel_usuario']=0
*/

// enrutamiento
$map = array(
    /*
    En cada elemento podemos añadir una posición mas que se encargará de otorgar el nivel mínimo para ejecutar la acción
    Puede quedar de la siguiente manera
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio', 'nivel_usuario'=>0)
    */
    'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
    'listar' => array('controller' =>'Controller', 'action' =>'listar'),
    'insertar' => array('controller' =>'Controller', 'action' =>'insertar'),
    'buscar' => array('controller' =>'Controller', 'action' =>'buscarPorNombre'),
    'ver' => array('controller' =>'Controller', 'action' =>'ver'),
    'error' => array('controller' =>'Controller', 'action' =>'error')
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
    $ruta = 'inicio';
}
$controlador = $map[$ruta];
/* 
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe, si es así ejecutamos el método correspondiente.
En aso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariaos tambien si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'],$controlador['action'])) {
    call_user_func(array(new $controlador['controller'],
        $controlador['action']));
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
}

?>