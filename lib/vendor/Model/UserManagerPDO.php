<?php

	namespace Model;
	
	use \Entity\Membre;
	
	class UserManagerPDO extends UserManager
	{
		protected $error = '';
		
		public function userLogin($login, $pass)
		{
			if($this->existLogin($login))
			{
				$req = $this->dao->prepare('SELECT * FROM utilisateur WHERE pseudo = :login');
				$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Membre');
				$req->bindValue(':login', htmlspecialchars($login), \PDO::PARAM_STR);
				$req->execute();
				if($rs = $req->fetch())
				{
					if(password_verify(htmlspecialchars($pass), $rs->getPass()))
					{
						// session_start();
						$_SESSION['auth'] = true;	
						$_SESSION['membre'] = $rs;
						return true;
					}
					else
					{
						$this->setError('Le pass est incorrect.');
						return false;
					}
				}
			}
			else
			{
				/* Si l'utilisateur n'existe pas on lui crée un compte */
				return $this->addUser(htmlspecialchars($login), htmlspecialchars($pass));
			}
		}
		
		public function existLogin($login)
		{
			$req = $this->dao->prepare('SELECT pseudo FROM utilisateur WHERE pseudo = :pseudo');
			$req->bindValue(':pseudo', htmlspecialchars($login), \PDO::PARAM_STR);
			$req->execute();
			if($rs = $req->fetch())
				return true;
			else
				return false;
		}
		
		public function addUser($login, $pass)
		{
			if(is_string($login))
			{
				if(is_string($pass) AND strlen($pass) >= 5)
				{
					
					/* On ajoute l'utilisateur */
					$req = $this->dao->prepare('INSERT INTO utilisateur(pseudo, pass, accessLevel) VALUES(:pseudo, :pass, :accessLevel)');
					$req->bindValue(':pseudo', $login, \PDO::PARAM_STR);
					$req->bindValue(':pass', password_hash($pass, PASSWORD_BCRYPT), \PDO::PARAM_STR);
					$req->bindValue(':accessLevel', 0, \PDO::PARAM_INT);
					$req->execute();
					$this->setError('Compte créé !');
					return false;
				}
				else
				{
					if(strlen($pass) < 5)
					{
						$this->setError('Le Pass doit comporter au moins 5 caractères');
						return false;
					}
					else
					{
						$this->setError('Pass invalide');
						return false;
					}
				}
			}
			else
			{
				$this->setError('Login incorrect');
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