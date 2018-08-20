<?php

	namespace Entity;
	
	use \Core\Entity;
	
	class Comment extends Entity
	{
		protected $idUtilisateur;
		protected $contenu;
		protected $datePub;
		protected $idBillet;
		protected $signaler;
		
		protected $pseudo;
		
		public function getIdUtilisateur()
		{
			return $this->idUtilisateur;
		}
		
		public function getContenu()
		{
			return $this->contenu;
		}
		
		public function getDatePub()
		{
			return $this->datePub;
		}
		
		public function getIdBillet()
		{
			return $this->idBillet;
		}
		
		public function getSignaler()
		{
			return $this->signaler;
		}
		
		public function getPseudo()
		{
			return $this->pseudo;
		}
		
		public function setIdUtilisateur($idUtilisateur)
		{
			$this->idUtilisateur = $idUtilisateur;
		}
		
		public function setContenu($contenu)
		{
			if(!empty($contenu))
			{
				$this->contenu = htmlspecialchars($contenu);
			}
			else
				$this->erreurs[] = "Le contenu est invalide.";
		}
		
		public function setIdBillet($id)
		{
			$this->idBillet = $id;
		}
		
		public function setPseudo($pseudo)
		{
			$this->pseudo = $pseudo;
		}
	}