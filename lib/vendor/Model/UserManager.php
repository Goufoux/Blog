<?php

	namespace Model;
	
	use \Core\Manager;
	
	abstract class UserManager extends Manager
	{
		abstract public function userLogin($login, $pass);
		
		abstract public function existLogin($login);
		
		abstract public function addUser($login, $pass);
	}