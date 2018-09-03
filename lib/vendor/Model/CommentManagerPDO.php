<?php

	namespace Model;
	
	use \Entity\Comment;
	
	class CommentManagerPDO extends CommentManager
	{
		protected $error = '';
		
		public function addComment(Comment $comment)
		{
			$req = $this->dao->prepare('INSERT INTO comment(idUtilisateur, contenu, idBillet, datePub, signaler) VALUES(:idUtilisateur, :contenu, :idBillet, :datePub, :signaler)');
			$req->bindValue(':idUtilisateur', $comment->getIdUtilisateur(), \PDO::PARAM_INT);
			$req->bindValue(':contenu', $comment->getContenu(), \PDO::PARAM_STR);
			$req->bindValue(':idBillet', $comment->getIdBillet(), \PDO::PARAM_INT);
			$req->bindValue(':datePub', time(), \PDO::PARAM_INT);
			$req->bindValue(':signaler', 0, \PDO::PARAM_INT);
			$req->execute();
			return true;
		}
		
		public function getComment($id, $module)
		{
			if($module == 'list') // Liste des commentaires d'un billet
			{
				$req = $this->dao->prepare('SELECT c.*, u.pseudo AS pseudo FROM utilisateur u INNER JOIN comment c ON c.idUtilisateur = u.id WHERE idBillet = :idBillet ORDER BY datePub DESC');
				$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
				$req->bindValue(':idBillet', $id, \PDO::PARAM_INT);
				$req->execute();
				if($rs = $req->fetchAll())
				{
					return $rs;
				}
				else
					return false;
			}
			if($module == 'once') // Retourne le nombre de signalement du commentaire avec l'id spécifié
			{
				$req = $this->dao->prepare('SELECT signaler FROM comment WHERE id = :id');
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
		}
		
		public function signalerComment($id, $nb)
		{
			$req = $this->dao->prepare('UPDATE comment SET signaler = :signaler WHERE id = :id');
			$req->bindValue(':signaler', $nb, \PDO::PARAM_INT);
			$req->bindValue(':id', $id, \PDO::PARAM_INT);
			$req->execute();
			return true;
		}
		
		public function getCommentReport()
		{
			$req = $this->dao->prepare('SELECT * FROM comment WHERE signaler > :signaler ORDER BY datePub DESC');
			$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
			$req->bindValue(':signaler', 0, \PDO::PARAM_INT);
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
		
		public function delComment($id)
		{
			if((int)$id)
			{
				$del = $this->dao->prepare('DELETE FROM comment WHERE id = :id');
				$del->bindValue(':id', $id, \PDO::PARAM_INT);
				$del->execute();
				return true;
			}
			else
				return false;
		}
		
		/* Getters */
		
		public function getError()
		{
			return $this->error;
		}
		
		/* Setters */
		
		public function setError($string)
		{
			$this->error = $string;
		}
	}