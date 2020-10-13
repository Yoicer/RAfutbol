<script>
$(document).ready(function(){
    $('.btn-exit-system').on('click', function(e){
        e.preventDefault();
        var usuario = $(this).attr('herf');
		swal({
		  	title: 'Esta Seguro?',
		  	text: "La sesion actual se va a cerrar!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Si, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
			$.ajax({
                url:'<?php echo SERVERURL; ?>ajax/loginAjax.php?usuario='+usuario,
                success: function(data){
                    if(data == "True"){
                        window.location.href="<?php echo SERVERURL; ?>";
                    }else{
                        swal(
                            "Ocurrio un error",
                            "No se pudo cerrar la sesion",
                            "error"
                        );
                    }
                }
            });
		});
	});

});
</script>