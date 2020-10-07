<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
</head>	
<body>
<?php
	$peticionAjax = false;
	require_once "./controlador/vistasControlador.php";

	$vt = new vistasControlador();
	$vistasR = $vt->obtener_vistas_controlador();

	if($vistasR == "login" || $vistasR == "error"){
		if($vistasR == "login" ){
			require_once "./vistas/contenido/login-view.php";
		}else{
			require_once "./vistas/contenido/error-view.php";
		}
	}else{
		session_start();
		include "./vistas/modulos/navlateral.php";
?>
	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
	<?php include "./vistas/modulos/navBar.php"; ?>
		
		<!-- Content page -->
<?php include $vistasR; ?>		
	</section>
<?php } ?>

	<!--====== Scripts -->
<?php include "./vistas/modulos/script.php"; ?>
</body>
</html>