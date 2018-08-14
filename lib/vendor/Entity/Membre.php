<?php

	/*
		Genarkys
		Ver 1.0
	*/
	
	namespace Entity;
	
	use \Core\Entity;
	
	class Membre extends Entity
	{
		protected $id;
		protected $pseudo;
		protected $email;
		protected $pass;
		protected $dti;
		protected $accessLevel;
		
		public function getId()
		{
			return $this->id;
		}
		
		public function getPseudo()
		{
			return $this->pseudo;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function getPass()
		{
			return $this->pass;
		}
		
		public function getDti()
		{
			return $this->dti;
		}
		
		public function getAccessLevel()
		{
			return $this->accessLevel;
		}
		
		/* Setters */
		
		public function setId($id)
		{
			$this->id = $id;
		}
		
		public function setPseudo($pseudo)
		{
			$this->pseudo = $pseudo;
		}
		
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function setPass($pass)
		{
			$this->pass = $pass;
		}
		
		public function setDti($dti)
		{
			$this->dti = $dti;
		}
		
		public function setAccessLevel($accessLevel)
		{
			$this->accessLevel = $accessLevel;
		}
	}