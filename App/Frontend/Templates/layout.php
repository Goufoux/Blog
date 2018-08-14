<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/frontend/index.css" />
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/index.js"></script>
		<link rel="icon" type="image/x-icon" href="img/logo.png" />
		<title><?= isset($title) ? $title : 'Genarkys' ?></title>
	</head>
  
	<body>
		<!-- NAVBAR -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="http://genarkys/openclassroom/Blog/Web/"> Jean Forteroche </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="#" class="nav-link noActive" title="Roman"> Billet simple pour l'Alaska </a>
					</li>
					<li class="nav-item">
						<a href="http://genarkys/openclassroom/Blog/Web/admin/" class="nav-link noActive" title="Admin"> Admin </a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="bloc"></div>
		<div class="container-fluid">
			<div class="row">
				<?= $content; ?>
			</div>
		</div>
	</body>
</html>