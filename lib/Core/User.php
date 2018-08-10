<?php

	/*
		Genarkys
		ver 1.0
	*/
	
	namespace Core;
	
	class User
	{
		public function isAuthentificated()
		{
			return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
		}
	}