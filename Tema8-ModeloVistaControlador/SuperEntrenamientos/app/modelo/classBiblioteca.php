<?php

class Entrenamientos extends Modelo {
    
    public function consultarUsuario($nombreUsuario) {
        $consulta = "SELECT * FROM bancoentrenamiento.usuarios WHERE nombreUsuario=:nombreUsuario ";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insertarUsuario($nombre, $apellido, $nombreUsuario, $contrasenya) {
        $consulta = "INSERT INTO bancoentrenamiento.usuarios (nombre, apellido, nombreUsuario, contrasenya) VALUES (:nombre, :apellido, :nombreUsuario, :contrasenya)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':apellido', $apellido);
        $result->bindParam(':nombreUsuario', $nombreUsuario);
        $result->bindParam(':contrasenya', $contrasenya);
        $result->execute();
        return $result;
    }
    
    public function listarLibros() {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros ORDER BY titulo ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function verLibroB($idLibro) {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE idLibro=:idLibro";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':idLibro', $idLibro);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
    public function buscarLibrosTitulo($titulo) {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE titulo=:titulo";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarLibrosAutor($autor) {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE autor=:autor";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':autor', $autor);
        $result->execute();
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarLibrosEditorial($editorial) {
        $consulta = "SELECT * FROM bancoentrenamiento.listaLibros WHERE editorial=:editorial";
        
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':editorial', $editorial);
        $result->execute();    
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    
      
    public function insertarLibro($titulo, $autor, $editorial, $anyo) {
        $consulta = "INSERT INTO bancoentrenamiento.listaLibros (titulo, autor, editorial, anyo) VALUES (:titulo, :autor, :editorial, :anyo)";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':titulo', $titulo);
        $result->bindParam(':autor', $autor);
        $result->bindParam(':editorial', $editorial);
        $result->bindParam(':anyo', $anyo);
        $result->execute();        
        return $result;
    }
    
}
?>