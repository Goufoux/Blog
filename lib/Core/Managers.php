<?php
	/*
		Genarkys
		ver 1.0
		Gère les différents managers et permettra aux classes filles d'y accéder 
	*/
	namespace Core;
	
	class Managers
	{
		protected $api = null;
		protected $dao = null;
		protected $managers = [];
		
		public function __construct($api, $dao)
		{
			$this->api = $api;
			$this->dao = $dao;
		}
		
		public function getApi()
		{
			return $this->api;
		}
		
		public function getDAO()
		{
			return $this->dao;
		}
		
		public function getManagerOf($module)
		{
			if(!is_string($module) || empty($module))
			{
				throw new \InvalidArgumentException('Le module spécifié est invalide.');
			}
			if(!isset($this->managers[$module]))
			{
				$manager = '\\Model\\'.$module.'Manager'.$this->api;
				
				$this->managers[$module] = new $manager($this->dao);
			}
			
			return $this->managers[$module];
		}
	}