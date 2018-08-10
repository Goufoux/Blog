<?php

	const APP = 'Frontend';
	
	if(!isset($_GET['app']))
		$_GET['app'] = APP;
	
	
	/* Chargement de composer */
	require(__DIR__.'/../vendor/autoload.php');
	
	
	$app = '\\App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
	$appClass = new $app;
	$appClass->run();