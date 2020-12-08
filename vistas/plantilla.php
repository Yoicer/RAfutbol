<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo COMPANY; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/calendario.css">
	

		<!--====== Scripts -->
<?php include "./vistas/modulos/script.php"; 
include "./vistas/modulos/logoutScript.php";?>
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
		session_start(['name'=> 'RAFutbol']);
		include_once "./controlador/loginControlador.php";
		$lc = new loginControlador();

		if($vistasR == "registroJugador"){
			$_SESSION['usuario_RAF'] = "registro";
			$_SESSION['tipo_RAF'] = "Jugador";
		}
		if(!isset($_SESSION['usuario_RAF']) || !isset($_SESSION['tipo_RAF'])){
			if($vistasR != "registroJugador"){
				#$lc->forzar_cierre_sesion_controlador();
			}
			
		}

		if($_SESSION['tipo_RAF'] == "jugador"){
			require_once "./controlador/jugadorControlador.php";
				$jugador = new jugadorControlador();
				$usuario = $jugador->Obtener_jugadorXidcuentaControlador();
		}
?>

<?php
		include_once "./vistas/modulos/navlateral.php";
?>
	<!-- Content page-->
			<!-- NavBar -->

	<section class="full-box dashboard-contentPage">
	<?php include_once "./vistas/modulos/navBar.php"; ?>
		
		<!-- Content page -->
<?php 	require_once $vistasR; ?>		
		</section>
<?php 
		
	} 
?>
<script>
    $.material.init();
</script>
</body>
</html>