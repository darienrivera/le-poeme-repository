<?php
session_start();
required_once('connections/tienda.php');
if (!isset($_SESSION["usuario"])) {
	mysql_select_db($database_tienda) or die ("No se esncuentra la base de datos especificada");
	if (isset($_POST['log'])){
		$nickname=$_POST['log'];
		$contrasena=$_POST['pwd'];
		$valido=true;
		$consulta2="SELECT*FROM usuario where nickname='$nickname' AND contrasena='$contrasena'";
		$result=mysql_query($consulta2) or die (mysql_error());
		$filasn=mysql_num_rows($result);
		if ($filasn<=0 || isset($_GET['nologin'])) {
			$valido=false;
		}else{
			$rowsresult=mysql_fetch_array($result);
			$_SESSION['idusuario']=$rowsresult['idusuario'];
			$valido=true;
			//guardamos en sesion el carnet del usuario ya que ese es el identificador en la base de datos//
			$_SESSION["usuario"]=$nickname;
			header("location:carrito.php?login=true");
			echo '<script type=\"text/javascript\">alert(\"Gracias por registrarse\");</script>';
		}

	} 

	}else{
		$_SESSION["usuario"];
	}
	if (isset($_SESSION['carrito'])){
		$compras=$_SESSION['carrito'];
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$duplicadp=-1;
			for ($i=0; $i <=count($compras)-1 ; $i++) {
				if($nombre==$compras[$i]['nombre']){
					$duplicados=$i;
				}
			}
			if ($duplicado != -1) {
				$cantidad_nueva=$compras[$duplicado]['cantidad']+$cantidad;
				$compras[$duplicado]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad_nueva);
			}else{
				$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
			}
		}else{
			$nombre=$_POST['nombre'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$compras[]=array("nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
		}
		if(isset($_POST['cantidadactualizada'])){
			$id=$_POST['id'];
			$contador_cant=$_POST['cantidadactualizada'];
			if($contador_cant<1){
				$compras[$id]=NULL;
			}else{
				$compras[$id]['cantidad']=$contador_cant;	
			}
		}
		if (isset($_POST['id2'])) {
			$id=$_POST['id2'];
			$compras[$id]=NULL;
		}
		$_SESSION['carrito']=$compras;
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Wake's Mart</title>
		<link href="css/style2.css" rel="stylesheet" type="text/css"/>
		<link href="css/estilo.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/slide.css" media="screen" />
		<script src="jquery-1.7.1.min.js" type="text/javascript"></script>
		<!-- Sliding effect -->
		<script type="text/javascript" src="js/silde.js"></script>
	</head>
	<body>
	<!--main-->
	<div id="main">
		<!--left side bar-->
		<div id="logo"></div>
		<!-- Quick Search -->
		<div id="quicksearch">
			<div id="quickheadRT" class="boxheadRT"><h1>Busqueda rapida</h1></div>
			<div class="boxmain">

				<form action="#" method="get">
					<div class="boxmainRT" style="width: 144px">
						<p class="label">Buscar por:</p>
						<input type="text" name="palabra" size="18" />
						<input type="submit" name="buscador" value="Buscar" />
						<?php if (isset($_GET['buscador'])) {
							$buscar=$_GET['palabra'];
							if (empty($buscar)) {
								echo "No se ha ingresado ninguna palabra"
							}else{
								if($buscar=="ram"){
									header("location:cat_rams.php");}
									if($buscar=="procesadores"){
										header("location:cat_procesadores.php");}
											if($buscar=="motherboards"){
												header("location:cat_motherboards.php"):}
											}}?>
										</div>
									</form>
									<div class="boxmainLT"></div>
								</div>
								<div class="boxbottRT"></div>
								<div id="quickbottLT" class="boxbottLT" ></div>

						
					</div> 

					<div class="clear"> </div>


					<div class="inner_copy"></div>

					<div id="categories">

					<div id="categorieheadRT" class="boxheadRT"><h1>Categorias</h1></div>
					<div class="boxheadLT"></div>
					<div class="boxmain">
					<div class="boxmainRT" style="width: 144px;">
					<ul>

					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>
					<li><a href="cat_procesadores.php">Procesadores</a></li>

					</ul>
					</div>
					<div class="boxmainLT"></div>
					</div>
					<div class="boxbottRT"></div>
					<div >

					<¿php 



<ul> 
<li><a href="index.php" > Nuevos Productos </a> </li> </li> </li>

<li><a href="tu_cuenta">Tu cuenta</a>





	</div>
	</body>
	</html>
}