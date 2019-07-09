<?php
$correo=$_POST['correo'];
$clave=$_POST['contrasena'];

//Conectar a la BD
$conexion=mysqli_connect("localhost", "root", "", "bd_prueba"); 

$consulta = "SELECT * FROM usuarios WHERE correo='$correo' and contrasena = '$clave' ";

 //Ejecutar consulta 
 $resultado = mysqli_query($conexion, $consulta); 

 $filas=mysqli_num_rows($resultado);

 if($filas>0){

    header("location:vistaUsuario.html");
 }

 else{
     echo "Error al iniciar sesión";
 }




//cerrar conexion 

mysqli_free_result($resultado); 
 mysqli_close($conexion); 
         
?>