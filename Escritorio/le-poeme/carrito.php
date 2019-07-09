<?php
session_start();

require_once('Connections/tianda.php');

if(!isset($_SESSION["usuario"])){
mysql_select_db($database_tienda) or die ("No se encuentra la base de datos especificada");
if(isset ($_POST['var'])){
    $nickname=$_POST['var'];
    $contrasena=$_POST['var'];
    $valido=true;

    $consulta2="SELECT * FROM var where nickname='$nickname'  AND contrasena = '$contrasena' ";
    $result=mysql_query($consulta2) or die (mysql_error());
    $filasn= mysql_num_rows($result);
    if($filasn <=0 || isset ($_GET['nologin'])){

        $valido=false;

    }else{
        $rowsresult=mysql_fetch_array($result);
        $_SESSION['idusuario']=$rowsresult['idusuario'];
        $valido=true;
        // guardamos en sesion el carnet del usuario ya que ese es el identificador en la base de datos
        $_SESSION["usuario"]=$nickname;
        header("location:carrito.php?login=true");
          echo '<script type=\"text/javascript\">alert(\"Gracias por registrarse\");</ script>';

    }
}

}else{

    $_SESSION["usuario"];
}

////////////////////////////////////////////////


if ( isset($_SESSION['carrito']) || isset($_POST ['nombre'])){

    if (isset ($_SESSION['carrito'])){
        $compras = $_SESSION['carrito']:
        if(isset($_POST['nombre'])){
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad=$_POST['cantidad'];
            $duplicado=-1;
            for($i=0; $i<=count($compras)-1;$i++){
                if($nombre==$compras[$i]['nombre'] ){
                    $duplicado=$i;

                }
            }

            if($duplicado != -1 ){
                $cantidad_nueva = $compras[$duplicado]['cantidad'] + $cantidad;
                $compras[$duplicado]=array("nombre" => $nombre, "precio"=>$cantidad);
            }
        }
    } else {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $compras[]=array("nombre"=>$nombre, "precio" =>$precio ,"cantidad" =>$cantidad);


    }

        }

        if(isset($_POST['cantidadactualizada'])){
            $id=$_POST['id'];
            $contador_cant=$_POST['cantidadactualiza'];
            if($contador_cant<1){
                $compras[$id]=NULL;
            }else{
                $compras[$id]=['cantidad']=$contador_cant;

            }
        }

if(isset($_POST['id2'])){
    $id=$_POST['id2'];
    $compras[$id]=NULL;
}

$_SESSION('carrito')=$compras;

    }
}


}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wake's Mart</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
<link href ="css/estilo.css" type="text/css" rel="stylesheet" media="all"/>
<link rel="stylesheet" href ="css/slide.css" type="text/css" media="screen"/>
<script src = "js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src = "js/jquery-1.3.4.min.js" type="text/javascript" ></script>
<!--Sliding effect -->
<script src ="js/slide.js" type="text/javascript"></script>

</head>
<body>
    <!-- main -->
    <div id="main">
<!-- Left side bar -->

<div id="LTsidebar">
<div id="logo"></div>

<!-- Quick Search -->$_SESSION

<div id="quicksearch">
<div id="quickheadRT" class="boxheadRT"><h1>Busqueda Rapida</h1></div>
<div class="boxheadLT"></div>
<div class="boxmain">   

<from action="#" method="get">

</body>

