<?php
	/*
		Genarkys
		ver 1.0
		Pattern Factory
	*/
	namespace Core;
	
	class PDOFactory
	{
		public static function getMysqlConnexion()
		{
			$user = 'root';
			$pass = ''; 
			$host = 'mysql:host=127.0.0.1;dbname=genarkys';
			// On tente la connexion //
			try
			{
				$bdd = new \PDO($host, $user, $pass, array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				return $bdd;
			}
			catch(\Exception $e)
			{
				echo 'Impossible de se connecter à la base de donnée.<br />';
			}
		}
	}
