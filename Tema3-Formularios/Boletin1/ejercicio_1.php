<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ejercicio 1</title>
</head>
<body>
    <p>
        <?php
            
            $nombre = "Juan";
            $apellidos = "Palomo Garcia";
            $edad = "23 Años";
            $domicilio = "C/ America 33";
            $codigoPostal = "34017";
            $telefono = "598234299";
            $profesion = "Programador";

            echo "Nombre: "."<strong>$nombre</strong>"."<br>".
                    "Apellidos: "."<strong>$apellidos</strong>"."<br>".
                    "Edad: "."<strong>$edad</strong>"."<br>".
                    "Domicilio: "."<strong>$domicilio</strong>"."<br>".
                    "Código Postal: "."<strong>$codigoPostal</strong>"."<br>".
                    "Teléfono: "."<strong>$telefono</strong>"."<br>".
                    "Profesión: "."<strong>$profesion</strong>";


        ?>
    </p>
</body>

</html>