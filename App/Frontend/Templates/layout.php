<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../Web/css/bootstrap.min.css" />
		<script src="../Web/js/bootstrap.min.js"></script>
		<script src="../Web/js/jquery-3.3.1.min.js"></script>
		<link rel="icon" type="image/x-icon" href="../Web/img/favicon.ico" />
		<title><?= isset($title) ? $title : 'Genarkys' ?></title>
	</head>
  
	<body>
		<?= $content ?>
	</body>
</html>