<?php
// Set default values to prevent undefined variable warnings
$is_talent_test = isset($is_talent_test) ? $is_talent_test : false;
$is_pelamar = isset($is_pelamar) ? $is_pelamar : false;
?>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Chaakra</span>Choise</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-user"></em><span class="label label-danger"></span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="" class="pull-left">
									<a href="<?php  echo base_url('Pelamar/Pelamar/profilawal') ?>" style="color: #283339;">Profil Saya</a>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="" class="pull-left">
									<a href="<?php 	echo base_url('Pelamar/Pelamar/pengaturan') ?>" style="color: #283339;">Pengaturan</a>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="" class="pull-left">
									<a href="<?php 
										if (isset($is_talent_test) && $is_talent_test) {
											echo base_url('talent-test/logout');
										} elseif (isset($is_pelamar) && $is_pelamar) {
											echo base_url('Login_pelamar/logout');
										} else {
											echo base_url('Home');
										}
									?>" style="color: #283339;">Keluar</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>