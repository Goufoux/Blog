<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/backend/index.css" />
		<link rel="stylesheet" media="screen and (min-width: 768px)" href="../css/backend/md.css" />
		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/index.js"></script>
		<link rel="icon" type="image/x-icon" href="../img/logo.png" />
		<title><?= isset($title) ? $title : 'Genarkys' ?></title>
	</head>
  
	<body>
		<!-- NAVBAR -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="https://genarkys.fr/openclassroom/Blog/Web/"> Jean Forteroche </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="../list" class="nav-link noActive" title="Roman"> Billet simple pour l'Alaska </a>
					</li>
					<?php
						if(!empty($_SESSION['auth']) AND $_SESSION['auth'])
						{
							if($_SESSION['membre']->getAccessLevel() > 1)
							{
								?>
									<li class="nav-item">
										<a href="/openclassroom/Blog/Web/admin/" class="nav-link" title="deco"> Admin </a>
									</li>
								<?php
							}
							?>
								<li class="nav-item">
									<a href="deconnect" class="nav-link" title="deco"> Déco </a>
								</li>
							<?php
						}
						else
						{
							?>
								<li class="nav-item">
									<a href="connect" class="nav-link" title="connexion"> Connexion </a>
								</li>
							<?php
						}
					?>
				</ul>
			</div>
		</nav>
		<div class="bloc"></div>
		<div class="container-fluid">
			<nav class="col-12 col-sm-12 col-lg-12">
				<h3 class="col-12"> Administration </h3>
					<a href="add"><button id="addPage"> Ajouter un billet </button></a>
					<a href="upd"><button id="updPage"> Modifier un billet </button></a>
			</nav>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<p>
					<?= $content; ?>
				</p>
			</div>
		</div>
	</body>
</html>