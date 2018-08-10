<?php
	
	/*
		Genarkys
		ver 1.0
		Gestion des requêtes envoyées par le client
	*/
	
	namespace Core;
	
	class HTTPRequest extends ApplicationComponent
	{
		/* Vérifie et retourne un paramètre GET si il existe */
		
		public function getData($key)
		{
			return isset($_GET[$key]) ? $_GET[$key] : null;
		}
		
		/* Vérifie seulement l'existence d'une donnée GET */
		
		public function getExists($key)
		{
			return isset($_GET[$key]);
		}
		
		/* Retourne le type de méthode */
		
		public function method()
		{
			return $_SERVER['REQUEST_METHOD'];
		}
		
		/* Retourne une donnée POST si elle existe */
		
		public function postData($key)
		{
			return isset($_POST[$key]) ? $_POST[$key] : null;
		}
		
		/* Vérifie si une donnée POST existe */
		
		public function postExists($key)
		{
			return isset($_POST[$key]);
		}
		
		/* Vérifie si un cookie existe */
		
		public function cookieExist($key)
		{
			return isset($_COOKIE[$key]);
		}
		
		/* Vérifie et retourne un cookie si il existe */
		
		public function cookieData($key)
		{
			return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
		}
		
		/* Retourne l'url courante */
		
		public function requestURI()
		{
			return $_SERVER['REQUEST_URI'];
		}
		
	}