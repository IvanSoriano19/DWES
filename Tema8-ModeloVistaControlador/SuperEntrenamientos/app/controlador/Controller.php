<?php

class Controller
{

    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario
    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel_usuario'] == 2) {
            return 'menuAdmin.php';
        }
    }


    public function home()
    {

        $params = array(
            'mensaje' => 'Bienvenido al banco de entrenamientos',
            'mensaje2' => 'Aquí encontrarás una gran variedad de ejercicio para tus entrenamientos',
            'fecha' => date('d-m-Y')
        );
        $menu = 'menuHome.php';
        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }
    public function inicio()
    {


        $params = array(
            'mensaje' => 'Bienvenido al banco de entrenamientos',
            'mensaje2' => 'Aquí encontrarás una gran variedad de ejercicios para tus entrenamientos',
            'fecha' => date('d-m-Y')
        );
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }


    public function salir()
    {
        session_destroy();
        header("location:index.php?ctl=home");
    }

    public function error()
    {

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/error.php';
    }

    public function iniciarSesion()
    {
        try {
            $params = array(
                'nombreUsuario' => '',
                'contrasenya' => ''
            );
            $menu = 'menuHome.php';

            if ($_SESSION['nivel_usuario'] > 0) {
                header("location:index.php?ctl=inicio");
            }
            if (isset($_POST['bIniciarSesion'])) { // Nombre del boton del formulario
                $nombreUsuario = recoge('nombreUsuario');
                $contrasenya = recoge('contrasenya');

                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral   
                if (cUser($nombreUsuario, "nombreUsuario", $params)) {
                    // Si no ha habido problema creo modelo y hago inserción                    
                    $m = new Entrenamientos();
                    if ($usuario = $m->consultarUsuario($nombreUsuario)) {
                        // Compruebo si el password es correcto
                        if (comprobarhash($contrasenya, $usuario['contrasenya'])) {
                            // Obtenemos el resto de datos

                            $_SESSION['idUser'] = $usuario['idUser'];
                            $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel_usuario'];
                            header('Location: index.php?ctl=inicio');
                        }
                    } else {
                        $params = array(
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya
                        );
                        $params['mensaje'] = 'No se ha podido iniciar sesión. Revisa el formulario.';
                    }
                } else {
                    $params = array(
                        'nombreUsuario' => $nombreUsuario,
                        'contrasenya' => $contrasenya
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/formInicioSesion.php';
    }


    public function registro()
    {
        $menu = 'menuHome.php';
        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }


        $params = array(
            'nombre' => '',
            'apellido' => '',
            'nombreUsuario' => '',
            'contrasenya' => '',
        );
        $errores = array();
        if (isset($_POST['bRegistro'])) {
            $nombre = recoge('nombre');
            $apellido = recoge('apellido');
            $nombreUsuario = recoge('nombreUsuario');
            $contrasenya = recoge('contrasenya');

            // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion         
            cTexto($nombre, "nombre", $errores);
            cTexto($apellido, "apellido", $errores);
            cUser($contrasenya, "contrasenya", $errores);
            cUser($nombreUsuario, "nombreUsuario", $errores);
            if (empty($errores)) {
                // Si no ha habido problema creo modelo y hago inserció     
                try {

                    $m = new Entrenamientos();
                    if ($m->insertarUsuario($nombre, $apellido, $nombreUsuario, encriptar($contrasenya))) {

                        header('Location: index.php?ctl=iniciarSesion');
                    } else {

                        $params = array(
                            'nombre' => $nombre,
                            'apellido' => $apellido,
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya
                        );

                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            } else {
                $params = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'nombreUsuario' => $nombreUsuario,
                    'contrasenya' => $contrasenya
                );
                $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario.';
            }
        }


        require __DIR__ . '/../../web/templates/formRegistro.php';
    }


    public function listarEjercicios()
    {
        try {
            $m = new Entrenamientos();
            $params = array(
                'nombre' => $m->listarEjercicios(),
            );
            if (!$params['nombre'])
                $params['mensaje'] = "No hay ejercicios que mostrar.";
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/mostrarEjercicios.php';
    }


    public function verEjercicio()
    {
        try {
            if (!isset($_GET['id_ejercicio'])) {
                throw new Exception('Página no encontrada.');
            }
            $id_ejercicio = recoge('id_ejercicio');
            $m = new Entrenamientos();
            $params['ejercicios'] = $m->verEjercicio($id_ejercicio);
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/verEjercicio.php';
    }


    public function buscarPorTitulo()
    {
        try {
            $params = array(
                'titulo' => '',
                'resultado' => array()
            );
            $m = new Entrenamientos();
            if (isset($_POST['buscarPorTitulo'])) {
                $titulo = recoge("titulo");
                $params['titulo'] = $titulo;
                $params['resultado'] = $m->buscarLibrosTitulo($titulo);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/buscarPorTitulo.php';
    }


    public function buscarPorAutor()
    {
        try {
            $params = array(
                'autor' => '',
                'resultado' => array()
            );
            $m = new Entrenamientos();
            if (isset($_POST['buscarPorAutor'])) {
                $autor = recoge("autor");
                $params['autor'] = $autor;
                $params['resultado'] = $m->buscarLibrosAutor($autor);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/buscarPorAutor.php';
    }


    public function buscarPorEditorial()
    {
        try {
            $params = array(
                'editorial' => '',
                'resultado' => array()
            );
            $m = new Entrenamientos();
            if (isset($_POST['buscarPorEditorial'])) {
                $editorial = recoge("editorial");
                $params['editorial'] = $editorial;
                $params['resultado'] = $m->buscarLibrosEditorial($editorial);
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/buscarPorEditorial.php';
    }


    public function insertarEjercicios()
    {
        try {
            $params = array(
                'nombre' => '',
                'descripcion' => '',
                'grupoMuscular' => '',
                'grupoCuerpo' => ''
            );
            $errores = array();
            if (isset($_POST['bInsertarEjercicio'])) {
                $nombre = recoge('nombre');
                $descripcion = recoge('descripcion');
                $grupoMuscular = recoge('grupoMuscular');
                $grupoCuerpo = recoge('grupoCuerpo');
                // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral
                cTexto($nombre, "nombre", $errores);
                cTexto($descripcion, "descripcion", $errores);
                cTexto($grupoMuscular, "grupoMuscular", $errores);
                cTexto($grupoCuerpo, "grupoCuerpo", $errores);

                if (empty($errores)) {
                    // Si no ha habido problema creo modelo y hago inserción
                    $m = new Entrenamientos();
                    if ($m->insertarEjercicio($nombre, $descripcion, $grupoMuscular, $grupoCuerpo)) {
                        header('Location: index.php?ctl=listarLibros');
                    } else {
                        $params = array(
                            'nombre' => $nombre,
                            'descripcion' => $descripcion,
                            'grupoMuscular' => $grupoMuscular,
                            'grupoCuerpo' => $grupoCuerpo
                        );
                        $params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario.';
                    }
                } else {
                    $params = array(
                        'nombre' => $nombre,
                        'descripcion' => $descripcion,
                        'grupoMuscular' => $grupoMuscular,
                        'grupoCuerpo' => $grupoCuerpo
                    );
                    $params['mensaje'] = 'Hay datos que no son correctos. Revisa el formulario';
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
            header('Location: index.php?ctl=error');
        }

        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/formInsertarEjercicios.php';
    }
}
