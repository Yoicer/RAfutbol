<section class="full-box cover dashboard-sideBar" style="background-image: url(<?php echo SERVERURL; ?>vistas/assets/img/login.jpeg);">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				<?php echo COMPANY; ?> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
		
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/jugador.jpeg" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php echo $usuario[0]['nombre'].' '.$usuario[0]['apellido']; ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
			<!-- 
				<li>
						<a href="" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href="" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
			 -->
					<li>
						<a href="<?php echo $lc->encriptar($_SESSION['usuario_RAF']); ?>" title="Salir del sistema" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="<?php echo SERVERURL; ?>equipos">
						<i class="zmdi zmdi-accounts-alt"></i> Equipos
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>cDeportivos">
						<i class="zmdi zmdi-storage"></i> Centros Deportivos
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>reservas">
						<i class="zmdi zmdi-calendar"></i> Reservas 
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>campeonatos">
						<i class="zmdi zmdi-slideshare"></i> Campeonatos
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>retos">
						<i class="zmdi zmdi-inbox"></i> Retos
					</a>
				</li>
				
			</ul>
		</div>
	</section>