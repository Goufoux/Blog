<?php

	namespace Entity;
	
	use \Core\Entity;
	
	class Comment extends Entity
	{
		protected $name;
		protected $contenu;
		protected $email;
		protected $datePub;
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getContenu()
		{
			return $this->getContenu;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function getDatePub()
		{
			return $this->datePub;
		}
		
		public function setName($name)
		{
			if(!empty($name) AND is_string($name))
			{
				if(strlen($name) > 1)
				{
					if(strlen($name) <= 25)
					{
						$this->name = $name;
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
				$this->contenu = $contenu;
			}
			else
				$this->erreurs[] = "Le contenu est invalide.";
		}
		
		public function setEmail($email)
		{
			if(!empty($email))
			{
				$this->email = $email;
			}
			else
				$this->errors[] = "L\'email est trop petit";
		}
	}