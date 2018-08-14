<?php

	namespace Model;
	
	use \Entity\Comment;
	
	class CommentManagerPDO extends CommentManager
	{
		public function addComment(Comment $comment)
		{
			$act = getDate();
			$req = $this->dao->prepare('INSERT INTO comment(name, contenu, email, idAttach, datePub) VALUES(:name, :contenu, :email, :idAttach, :datePub)');
			$req->bindValue(':name', $comment->getName(), \PDO::PARAM_STR);
			$req->bindValue(':contenu', $comment->getContenu(), \PDO::PARAM_STR);
			$req->bindValue(':email', $comment->getEmail(), \PDO::PARAM_STR);
			$req->bindValue(':idAttach', $comment->getAttachId(), \PDO::PARAM_INT);
			$req->bindValue(':datePub', $act[0], \PDO::PARAM_INT);
			$req->execute();
			return true;
		}
		
		public function getComment($id, $module)
		{
			if($module == 'list') // Liste des commentaires d'un billet
			{
				$req = $this->dao->prepare('SELECT * FROM comment WHERE idAttach = :idAttach');
				$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
				$req->bindValue(':idAttach', $id, \PDO::PARAM_INT);
				$req->execute();
				if($rs = $req->fetchAll())
				{
					return $rs;
				}
				else
					return false;
			}
			if($module == 'once') // Un seul Commentaire
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
	}