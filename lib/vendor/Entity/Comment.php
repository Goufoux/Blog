<?php

	namespace Entity;
	
	use \Core\Entity;
	
	class Comment extends Entity
	{
		protected $name;
		protected $contenu;
		protected $datePub;
		protected $idBillet;
		protected $signaler;
		
		public function getName()
		{
			return $this->name;
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
		
		public function setName($name)
		{
			if(!empty($name) AND is_string($name))
			{
				if(strlen($name) > 1)
				{
					if(strlen($name) <= 25)
					{
						$this->name = htmlspecialchars($name);
					}
					else
						$this->erreurs[] = "Le name doit être inférieur ou égal à 25 caractères.";
				}
				else
					$this->erreurs[] = "Le name doit être supérieur ou égal à 2 caractères.";
			}
			else
				$this->erreurs[] = "Le name est invalide";
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
	}