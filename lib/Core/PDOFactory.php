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
			$user = 'root'; // dbo597819563
			$pass = ''; //azf2ukb7901$
			$host = 'mysql:host=127.0.0.1;dbname=genarkys'; // host=db597819563.db.1and1.com;dbname=db597819563
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