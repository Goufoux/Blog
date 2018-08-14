<?php

	namespace Model;
	
	use \Core\Manager;
	
	abstract class UserManager extends Manager
	{
		abstract public function userLogin($login, $pass);
	}