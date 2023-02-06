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

    public function insertarUsuario($nombre, $apellido, $nombreUsuario, $correoElectronico, $fotoPerfil, $contrasenya)
    {
        $consulta = "INSERT INTO bancoentrenamiento.usuarios (nombre, apellido, nombreUsuario, correoElectronico, fotoPerfil, contrasenya) VALUES (:nombre, :apellido, :nombreUsuario, :correoElectronico, :fotoPerfil, :contrasenya)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':apellido', $apellido);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':correoElectronico', $correoElectronico);
        $result->bindParam(':fotoPerfil', $fotoPerfil);
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


    public function agregarEjercicio($id_ejercicio){

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $consulta = "INSERT INTO bancoentrenamiento.ejercicio_usuario (id_usuario, id_ejercicio) 
        VALUES ((SELECT bancoentrenamiento.usuarios.id_usuario FROM bancoentrenamiento.usuarios WHERE bancoentrenamiento.usuarios.nombreUsuario=:nombreUsuario), :id_ejercicio) ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':id_ejercicio', $id_ejercicio);
        $result->execute();

        return $result;
    }

    public function mostrarMisEjercicios()
    {
        $nombreUsuario = $_SESSION['nombreUsuario'];

        
        $consulta = "SELECT bancoentrenamiento.ejercicios.* FROM bancoentrenamiento.usuarios 
        JOIN bancoentrenamiento.ejercicio_usuario ON bancoentrenamiento.usuarios.id_usuario = bancoentrenamiento.ejercicio_usuario.id_usuario 
        JOIN bancoentrenamiento.ejercicios ON bancoentrenamiento.ejercicios.id_ejercicio = bancoentrenamiento.ejercicio_usuario.id_ejercicio 
        WHERE bancoentrenamiento.usuarios.nombreUsuario=:nombreUsuario";

        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
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
