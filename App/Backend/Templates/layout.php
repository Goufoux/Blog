<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/backend/index.css" />
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery-3.3.1.min.js"></script>
		<link rel="icon" type="image/x-icon" href="../img/logo.png" />
		<title><?= isset($title) ? $title : 'Genarkys' ?></title>
	</head>
  
	<body>
		<!-- NAVBAR -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="."> Jean Forteroche </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-link noActive" title="Roman"> Billet simple pour l'Alaska </a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="bloc"></div>
		<div class="container-fluid">
			<div class="row">
				<nav class="col-2">
					<h2> Fonction d'administration </h2>
						<a href="add"><button id="addPage"> Ajouter </button></a>
						<button id="updPage"> Modifier </button>
						<button id="delPage"> Supprimer </button>
				</nav>
				<div class="col-10">
					<p>
						<?= $content; ?>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>