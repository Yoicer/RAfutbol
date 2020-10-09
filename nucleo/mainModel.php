<?php 
   if ($peticionAjax) {
   	  require_once "../nucleo/configApp.php";
   }else{
      require_once "./nucleo/configApp.php";
   }
   
  class mainModel{
   	 protected static function conectar(){
   	 	$enlace= new PDO(SGBD, USER, PASS);
   	 	return $enlace;
   	 }
   	 protected static function ejecutar_consulta_simple($consulta){
   	     	$respuesta=self::conectar()->prepare($consulta);
   	 	    $respuesta->execute();
   	     	return $respuesta;
   	 }

     protected static function agregar_cuenta($datos){
         $sql=self::conectar()->prepare("
							 INSERT INTO 	
							 	`cuenta` (clave, nombre, fecha_registro, Estado, rol)
									 VALUES (:clave, :nombre, now(), '1', :rol);"
							);
         $sql->bindParam(':nombre',$datos['usuario']);
         $sql->bindParam(':clave',$datos['clave']);
         $sql->bindParam(':rol',$datos['rol']);
         $sql->execute();
         return $sql;
      }
      protected static function eliminar_cuenta($id){
         $sql=self::conectar()->prepare(" 
										DELETE FROM `cuenta`
										WHERE ((`id_cuenta` = :id));
		      						");
         $sql->bindParam(":id",$id);
         $sql->execute();
         return $sql;
      }

   	 public static function encriptar($strg){
   	 	   $output=FALSE;
   	   	 $key=hash('sha256', SECRET_KEY);
     	 	 $iv=substr(hash('sha256', SECRET_IV),0, 16);
         $output=openssl_encrypt($strg, METHOD, $key, 0, $iv);
         $output=base64_encode($output);
         return $output;
   	 }

   	 protected function descriptar($strg){
   	 	    $key=hash('sha256', SECRET_KEY);
   	    	$iv=substr(hash('sha256', SECRET_IV), 0, 16);
      	 	$output=openssl_decrypt(base64_decode($strg), METHOD, $key,0, $iv);
   	    	return $output;
   	 }
   	 protected function generar_codigo_aleatorio($letra, $long, $num){
   	 	   for ($i=1; $i<=$long ; $i++) { 
   	 	       	$numero= rand(0,9);
   	 		      $letra.=$numero;
   	 	    }
   	 	    return $letra.$num;
   	 }
   	 protected static function limpiar_cadena($cad){
      	 	$cad=trim($cad);
   	    	$cad=stripslashes($cad);
   	 	    $cad=str_ireplace("<script>", "", $cad);
   	 	    $cad=str_ireplace("</script>", "", $cad);
   	 	    $cad=str_ireplace("<script src>", "", $cad);
   	 	    $cad=str_ireplace("<script type>", "", $cad);
   	 	    $cad=str_ireplace("SELECT * FROM", "", $cad);
   	 	    $cad=str_ireplace("DELETE FROM", "", $cad);
   	 	    $cad=str_ireplace("INSERT INTO", "", $cad);
   	 	    $cad=str_ireplace(";", "", $cad);
   	 	    return $cad;
		}

	protected static function sweet_alert($datos){
		if($datos['Alerta'] == "simple"){
			$alerta = " 
				<script>
					swal(
					'".$datos['Titulo']."',
					'".$datos['Texto']."',
					'".$datos['Tipo']."'
					);
				</script>
			"; 
		}elseif($datos['Alerta'] == "recargar"){
			$alerta = " 
				<script>
					swal({
						title: '".$datos['Titulo']."',
						text: '".$datos['Texto']."',
						type: '".$datos['Tipo']."',
						confirmButtonText: 'Aceptar'
					}).then(function(){
						location.reload();
					});
				</script>
			"; 
		}elseif($datos['Alerta'] == "limpiar"){
			$alerta = " 
				<script>
					swal({
						title: '".$datos['Titulo']."',
						text: '".$datos['Texto']."',
						type: '".$datos['Tipo']."',
						confirmButtonText: 'Aceptar'
					}).then(function(){
						$('.FormularioAjax')[0].reset();
					});
				</script>
			"; 
		}

			 return $alerta;
	 }

   	 protected function alert(){
               $alerta="
                 <script>
                    swal(
                      type: 'error',
                      text: 'No se a podido iniciar sesion ',
                      footer: '<a href>vuelve a intentarlo</a>'
                     );
                 </script>";
          
   	 	    return $alerta;
   	 }
   }