<?php

	namespace Model;
	
	use \Entity\Membre;
	
	class UserManagerPDO extends UserManager
	{
		protected $error = '';
		
		public function userLogin($login, $pass)
		{
			$req = $this->dao->prepare('SELECT * FROM utilisateur WHERE pseudo = :login OR email = :login');
			$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Membre');
			$req->bindValue(':login', $login, \PDO::PARAM_STR);
			$req->execute();
			if($rs = $req->fetch())
			{
				if(password_verify($pass, $rs->getPass()))
				{
					// session_start();
					$_SESSION['auth'] = true;	
					$_SESSION['membre'] = $rs;
					return true;
				}
				else
				{
					$this->setError('Pass incorrect');
					return false;
				}
			}
			else
			{
				$this->setError('Aucun utilisateur avec cet identifiant existant');
				return false;
			}
		}
		
		public function getError()
		{
			return $this->error;
		}
		
		public function setError($error)
		{
			$this->error = $error;
		}
	}