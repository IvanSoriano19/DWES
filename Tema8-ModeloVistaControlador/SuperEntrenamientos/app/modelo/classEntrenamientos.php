<?php

class Entrenamientos extends Modelo
{

    public function consultarUsuario($nombreUsuario)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.usuarios WHERE nombreUsuario=:nombreUsuario ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function insertarUsuario($nombre, $apellido, $nombreUsuario, $contrasenya)
    {
        $consulta = "INSERT INTO bancoentrenamiento.usuarios (nombre, apellido, nombreUsuario, contrasenya) VALUES (:nombre, :apellido, :nombreUsuario, :contrasenya)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':apellido', $apellido);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':contrasenya', $contrasenya);
        $result->execute();
        return $result;
    }

    public function listarEjercicios()
    {
        $consulta = "SELECT * FROM bancoentrenamiento.ejercicios ORDER BY nombre ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verEjercicio($id_ejercicio)
    {
        $consulta = "SELECT bancoentrenamiento.ejercicios.*, bancoentrenamiento.musculo.* FROM bancoentrenamiento.ejercicios 
        INNER JOIN bancoentrenamiento.ejercicio_musculo
            ON ejercicios.id_ejercicio = bancoentrenamiento.ejercicio_musculo:id_ejercicio
        INNER JOIN bancoentrenamiento.musculo
            ON musculo.id_musculo =  bancoentrenamiento.ejercicio_musculo:id_ejercicio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_ejercicio', $id_ejercicio);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarLibrosTitulo($titulo)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE titulo=:titulo";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarLibrosAutor($autor)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE autor=:autor";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':autor', $autor);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarLibrosEditorial($editorial)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE editorial=:editorial";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':editorial', $editorial);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarEjercicio($nombre, $descripcion, $grupoMuscular, $grupoCuerpo)
    {
        $consulta = "INSERT INTO bancoentrenamiento.ejercicios (nombre, descripcion) VALUES (:nombre, :descripcion);INSERT INTO bancoentrenamiento.musculo (grupoMuscular, grupoCuerpo) VALUES (:grupoMuscular, :grupoCuerpo)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':descripcion', $descripcion);
        $result->bindParam(':grupoMuscular', $grupoMuscular);
        $result->bindParam(':grupoCuerpo', $grupoCuerpo);
        $result->execute();
        return $result;
    }
}
