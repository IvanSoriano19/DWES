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
        $consulta = "SELECT * FROM bancoentrenamiento.ejercicios WHERE id_ejercicio=:id_ejercicio";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_ejercicio', $id_ejercicio);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorNombre($nombre)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.ejercicios WHERE nombre LIKE :nombre";
        $nombre = $nombre.'%';
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorGrupoMuscular($musculo)
    {
        $consulta = "SELECT * FROM bancoentrenamiento.ejercicios WHERE grupoMuscular LIKE :grupoMuscular";
        $musculo = $musculo.'%';
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':grupoMuscular', $musculo);
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

    public function insertarEjercicio($nombre, $descripcion, $grupoMuscular)
    {
        $consulta = "INSERT INTO bancoentrenamiento.ejercicios (nombre, descripcion, grupoMuscular) VALUES (:nombre, :descripcion, :grupoMuscular)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':descripcion', $descripcion);
        $result->bindParam(':grupoMuscular', $grupoMuscular);
        $result->execute();

        return $result;
    }

}
