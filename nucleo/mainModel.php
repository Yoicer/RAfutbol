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
   	 protected function ejecutar_consulta_simple($consulta){
   	     	$respuesta=self::conectar()->prepare($consulta);
   	 	    $respuesta->execute();
   	     	return $respuesta;
   	 }

     protected function agregar_cuenta($datos){
         $sql=self::conectar()->prepare("INSERT INTO cuenta(IdCuenta,usuario,contraseña,rol) 
            VALUES(:id,:usuario,:contraseña,:rol)");
         $sql->bindParam(":id",$datos['id']);
         $sql->bindParam(":usuario",$datos['usuario']);
         $sql->bindParam(":contraseña",$datos['contraseña']);
         $sql->bindParam(":rol",$datos['rol']);
         $sql->execute();
         return $sql;
      }
      protected function eliminar_cuenta($id){
         $sql=self::conectar()->prepare("DELETE FROM usuario WHERE id_usuario =:id");
         $sql->bindParam(":id",$id);
         $sql->execute();
         return $sql;
      }

   	 public function encriptar($strg){
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
   	 	    return $letra."-".$num;
   	 }
   	 protected function limpiar_cadena($cad){
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