<?php

class Controller
{

    //Método que se encarga de cargar el menu que corresponda según el tipo de usuario
    private function cargaMenu()
    {
        if ($_SESSION['nivel_usuario'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel_usuario'] == 1) {
            $this -> inactividad();
            if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
                return 'menuUser.php';
            } else {
                $this->salir();
            }
        } else if ($_SESSION['nivel_usuario'] == 2) {
            $this -> inactividad();
            if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
                return 'menuAdmin.php';
            } else {
                $this->salir();
            }
        }
    }

    public function inactividad()
    {
        if (($_SESSION['tiempo'] + 10) > time()) {
            $_SESSION['tiempo'] = time();
        } else {
            setcookie($_SESSION['nombreUsuario'], "cookie del usuario: " . $_SESSION['nombreUsuario'], time() - 300);
            session_destroy();
            header("location:index.php?ctl=home");
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
        setcookie($_SESSION['nombreUsuario'], "cookie del usuario: " . $_SESSION['nombreUsuario'], time() - 300);
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

                            $_SESSION['id_usuario'] = $usuario['id_usuario'];
                            $_SESSION['nombreUsuario'] = $usuario['nombreUsuario'];
                            $_SESSION['nivel_usuario'] = $usuario['nivel_usuario'];
                            $_SESSION['correoElectronico'] = $usuario['correoElectronico'];
                            $_SESSION['fotoPerfil'] = $usuario['fotoPerfil'];
                            $_SESSION['tiempo'] = time() + 10;

                            setcookie($nombreUsuario, "cookie del usuario: " . $nombreUsuario, time() + 300);

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
            'correoElectronico' => '',
        );
        $errores = array();
        if (isset($_POST['bRegistro'])) {
            $nombre = recoge('nombre');
            $apellido = recoge('apellido');
            $nombreUsuario = recoge('nombreUsuario');
            $contrasenya = recoge('contrasenya');
            $correoElectronico = recoge('correoElectronico');
            // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral o la clase Validacion         
            cTexto($nombre, "nombre", $errores);
            cTexto($apellido, "apellido", $errores);
            cUser($contrasenya, "contrasenya", $errores);
            cUser($nombreUsuario, "nombreUsuario", $errores);
            if (cfile("imagen",  $errores, Config::$extensionesValidas, 300000, false)) {
                $fotoPerfil = file_get_contents($_FILES['imagen']['tmp_name']);
            } else {
                $fotoPerfil = get_gravatar($correoElectronico);
                $fotoPerfil = file_get_contents($fotoPerfil);
            }

            if (empty($errores)) {
                // Si no ha habido problema creo modelo y hago inserció     
                try {

                    $m = new Entrenamientos();
                    if ($m->insertarUsuario($nombre, $apellido, $nombreUsuario, $correoElectronico, $fotoPerfil, encriptar($contrasenya))) {

                        header('Location: index.php?ctl=iniciarSesion');
                    } else {

                        $params = array(
                            'nombre' => $nombre,
                            'apellido' => $apellido,
                            'nombreUsuario' => $nombreUsuario,
                            'contrasenya' => $contrasenya,
                            'correoElectronico' => $correoElectronico,
                            'fotoPerfil' => $fotoPerfil

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
                    'contrasenya' => $contrasenya,
                    'correoElectronico' => $correoElectronico,
                    'fotoPerfil' => $fotoPerfil
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


    public function buscarPorNombre()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            try {
                $params = array(
                    'nombre' => '',
                    'resultado' => array()
                );
                $m = new Entrenamientos();
                if (isset($_POST['buscarPorNombre'])) {
                    $nombre = recoge("nombre");
                    $params['nombre'] = $nombre;
                    $params['resultado'] = $m->buscarPorNombre($nombre);
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=error');
            }

            $menu = $this->cargaMenu();

            require __DIR__ . '/../../web/templates/buscarPorNombre.php';
        } else {
            $this->salir();
        }
    }


    public function buscarPorGrupoMuscular()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            try {
                $params = array(
                    'grupoMuscular' => '',
                    'resultado' => array()
                );
                $m = new Entrenamientos();
                if (isset($_POST['buscarPorGrupoMuscular'])) {
                    $grupoMuscular = recoge("grupoMuscular");
                    $params['grupoMuscular'] = $grupoMuscular;
                    $params['resultado'] = $m->buscarPorGrupoMuscular($grupoMuscular);
                }
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=error');
            }

            $menu = $this->cargaMenu();

            require __DIR__ . '/../../web/templates/buscarPorGrupoMuscular.php';
        } else {
            $this->salir();
        }
    }

    function cookies()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            return true;
        } else {
            $this->salir();
        }
    }

    public function mostrarMisEjercicios()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            try {
                $m = new Entrenamientos();
                $params = array(
                    'ejercicios' => $m->mostrarMisEjercicios(),
                );
                if (!$params['ejercicios'])
                    $params['mensaje'] = "No hay ejercicios que mostrar.";
            } catch (Exception $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logExceptio.txt");
                header('Location: index.php?ctl=error');
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../app/log/logError.txt");
                header('Location: index.php?ctl=error');
            }

            $menu = $this->cargaMenu();

            require __DIR__ . '/../../web/templates/mostrarMisEjercicios.php';
        } else {
            $this->salir();
        }
    }

    public function agregarEjercicio()
    {
        try {
            if (isset($_POST['agregarEjercicio'])) {
                $id_ejercicio = recoge('id_ejercicio');
                $m = new Entrenamientos();
                if ($m->agregarEjercicio($id_ejercicio)) {
                    header('Location: index.php?ctl=mostrarMisEjercicios');
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

        require __DIR__ . '/../../web/templates/mostrarMisEjercicios.php';
    }



    public function newsletter()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            try {
                if (isset($_POST['newsletter'])) {
                    $correoElectronico = $_SESSION['correoElectronico'];

                    $to = $correoElectronico;
                    $subject = "NEWSLETTER";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $message = 'Hola $_SESSION["nombreUsuario"]], <br>Te has inscrito a la newsletter de SuperEntrenamientos<br>Aqui recibiras todo tipo de noticias si las hubiese pero no hay tiempo :(';
                    if (mail($to, $subject, $message, $headers)) {
                        echo "!!!Enviado!!!";
                        header('Location: index.php?ctl=inicio');
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

            require __DIR__ . '/../../web/templates/newsletter.php';
        } else {
            $this->salir();
        }
    }

    public function insertarEjercicios()
    {
        if (isset($_COOKIE[$_SESSION['nombreUsuario']])) {
            try {
                $params = array(
                    'nombre' => '',
                    'descripcion' => '',
                    'grupoMuscular' => '',
                );
                $errores = array();
                if (isset($_POST['bInsertarEjercicio'])) {
                    $nombre = recoge('nombre');
                    $descripcion = recogeArea('descripcion');
                    $grupoMuscular = recoge('grupoMuscular');
                    // Comprobar campos formulario. Aqui va la validación con las funciones de bGeneral
                    cTexto($nombre, "nombre", $errores);
                    cTexto($grupoMuscular, "grupoMuscular", $errores);

                    if (empty($errores)) {
                        // Si no ha habido problema creo modelo y hago inserción
                        $m = new Entrenamientos();
                        if ($m->insertarEjercicio($nombre, $descripcion, $grupoMuscular)) {
                            header('Location: index.php?ctl=listarEjercicios');
                        } else {
                            $params = array(
                                'nombre' => $nombre,
                                'descripcion' => $descripcion,
                                'grupoMuscular' => $grupoMuscular,
                            );
                            $params['mensaje'] = 'No se ha podido insertar el ejercicio. Revisa el formulario.';
                        }
                    } else {
                        $params = array(
                            'nombre' => $nombre,
                            'descripcion' => $descripcion,
                            'grupoMuscular' => $grupoMuscular,
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
        } else {
            $this->salir();
        }
    }
}
