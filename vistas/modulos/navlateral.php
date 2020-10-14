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
					<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php echo $usuario[0]['nombre'].' '.$usuario[0]['apellido']; ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
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
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Equipo
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Reservas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href=""><i class="zmdi zmdi-account zmdi-hc-fw"></i> </a>
						</li>

				</li>
				<li>
					<a href="">
						<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> 
					</a>
				</li>
			</ul>
		</div>
	</section>