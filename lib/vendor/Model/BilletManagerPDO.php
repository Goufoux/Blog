<?php

	namespace Model;
	
	use \Entity\Billet;
	
	class BilletManagerPDO extends BilletManager
	{
		protected $managerError = [];
		
		public function getBillet($id = false)
		{
			if($id)
			{
				$req = $this->dao->prepare('SELECT * FROM billet WHERE id = :id');
				$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Billet');
				$req->bindValue(':id', $id, \PDO::PARAM_INT);
				$req->execute();
				if($rs = $req->fetch())
				{
					return $rs;
				}
				else
				{
					return false;
				}
			}
			else
			{
				$req = $this->dao->query('SELECT * FROM billet');
				$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Billet');
				$req->execute();
				if($rs = $req->fetchAll())
				{
					return $rs;
				}
				else
				{
					return false;
				}
			}
		}
		
		public function addBillet(Billet $billet)
		{
			$act = getDate(); // Date actuelle pour la date de publication du billet
			if(!$this->existTitle($billet->getTitre()))
			{
				/* On prépare l'insertion en bdd */
				$req = $this->dao->prepare('INSERT INTO billet(titre, contenu, datePub, dateMod) VALUES(:titre, :contenu, :datePub, :dateMod)');
				$req->bindValue(':titre', $billet->getTitre(), \PDO::PARAM_STR);
				$req->bindValue(':contenu', $billet->getContenu(), \PDO::PARAM_STR);
				$req->bindValue(':datePub', $act[0], \PDO::PARAM_INT);
				$req->bindValue(':dateMod', '0', \PDO::PARAM_STR);
				$req->execute();
			}
			else
			{
				$this->setManagerError('Attention ce titre existe déjà');
				return false;
			}
		}
		
		public function existTitle($title)
		{
			$req = $this->dao->prepare('SELECT titre FROM billet WHERE titre = :titre');
			$req->bindValue(':titre', $title, \PDO::PARAM_STR);
			$req->execute();
			if($rs = $req->fetch())
				return true;
			else
				return false;
		}
		
		public function setManagerError($error)
		{
			$this->managerError[] = $error;
		}
		
		public function getManagerError()
		{
			return $this->managerError;
		}
	}