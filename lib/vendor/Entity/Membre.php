<?php

	/*
		Genarkys
		Ver 1.0
	*/
	
	namespace Entity;
	
	use \Core\Entity;
	
	class Membre extends Entity
	{
		protected $pseudo;
		protected $pass;
		protected $accessLevel;
		
		public function getPseudo()
		{
			return $this->pseudo;
		}
		
		public function getPass()
		{
			return $this->pass;
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
		
		
		public function setPass($pass)
		{
			$this->pass = $pass;
		}
		
		public function setAccessLevel($accessLevel)
		{
			$this->accessLevel = $accessLevel;
		}
	}