<!DOCTYPE html>
  <html>
  <head>
    <title><?php echo COMPANY ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>
  <body>

<?php 
        $peticionAjax=false;

     
        require_once "./controlador/vistasControlador.php";

        $vt = new vistasControlador();
        $vis = $vt->obtener_vistas_controlador();

        if ($vis == "login"):
            require_once "./vistas/contenido/login-view.php";

        else:
?>
  		
      <?php require_once $vis; ?>



    <?php endif; ?>
    
  </body>
</html>
