<?php

	namespace Entity;
	
	use \Core\Entity;
	
	class Billet extends Entity
	{
		protected $titre;
		protected $contenu;
		protected $datePub;
		protected $dateMod;
		
		/* Getters */
		
		public function getTitre()
		{
			return $this->titre;
		}
		
		public function getContenu()
		{
			return $this->contenu;
		}
		
		public function getDatePub()
		{
			return $this->datePub;
		}
		
		public function getDateMod()
		{
			return $this->dateMod;
		}
		
		/* Setters */
		
		public function setTitre($titre)
		{
			if(!empty($titre) AND is_string($titre))
			{
				if(strlen($titre) > 1)
				{
					if(strlen($titre) <= 25)
					{
						$this->titre = $titre;
					}
					else
						$this->erreurs[] = "Le titre doit être inférieur ou égal à 25 caractères.";
				}
				else
					$this->erreurs[] = "Le titre doit être supérieur ou égal à 2 caractères.";
			}
			else
				$this->erreurs[] = "Le titre est invalide";
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
		
		public function setDatePub($datePub)
		{
			return $this->datePub = $datePub;
		}
		
		public function setDateMod($dateMod)
		{
			return $this->dateMod = $dateMod;
		}
		
	}