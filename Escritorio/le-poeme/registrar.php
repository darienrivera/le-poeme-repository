<?php
include ("coneccion.php");
//Almacenar los datos en variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];

$conexion=mysqli_connect("localhost", "root", "", "bd_prueba"); 

//Consulta para insertar
$insertar = "INSERT INTO usuarios (nombre, apellido, usuario, correo, contrasena, telefono)
VALUES ('$nombre','$apellido','$usuario','$correo','$contrasena','$telefono') ";

 //Ejecutar consulta 
 $resultado = mysqli_query($conexion, $insertar); 
 if(!$resultado){ 
     echo 'Error al registrase'; 
     } 
     
     else { 
        header("location:index.html");
         echo 'Usuario registrado exitosamente'; 
         } 
         
//cerrar conexion 
 mysqli_close($conexion); 
         
?>