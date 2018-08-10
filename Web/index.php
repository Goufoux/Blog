<?php

	const APP = 'Frontend';
	
	/* Vérification que la donnée app existe sinon création et assignation de la constante */
	if(!isset($_GET['app']))
		$_GET['app'] = APP;
	
	/* Chargement de composer */
	require(__DIR__.'/../vendor/autoload.php');
	
	
	$app = '\\App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
	$appClass = new $app;
	$appClass->run();