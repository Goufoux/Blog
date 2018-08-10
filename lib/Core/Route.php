<?php
	
	/*
		Genarkys
		ver 1.0
		Route.php : décompose et analyse une route 
	*/
	namespace Core;
	
	class Route
	{
		protected $action;
		protected $module;
		protected $url;
		protected $varsNames;
		protected $vars = [];
		
		public function __construct($url, $module, $action, array $varsNames)
		{
			$this->setUrl($url);
			$this->setModule($module);
			$this->setAction($action);
			$this->setVarsNames($varsNames);
		}
		
		/* Vérifie la présence de variable dans la route */
		public function hasVars()
		{
			return !empty($this->varsNames);
		}
		
		/* Vérifie que l'url transmise correspond à l'url défini dans les attributs */
		public function match($url)
		{
			if(preg_match('`^'.$this->url.'$`', $url, $matches))
			{
				return $matches;
			}
			else
			{
				return false;
			}
		}
		
		/* SETTERS */
		
		public function setVars(array $vars)
		{
			$this->vars = $vars;
		}
		public function setAction($action)
		{
			$this->action = $action;
		}
		
		public function setModule($module)
		{
			$this->module = $module;
		}
		
		public function setUrl($url)
		{
			$this->url = $url;
		}
		
		public function setVarsNames(array $varsNames)
		{
			$this->varsNames = $varsNames;
		}
		
		/* GETTERS */
		public function action()
		{
			return $this->action;
		}
		
		public function module()
		{
			return $this->module;
		}
		
		public function url()
		{
			return $this->url;
		}
		
		public function varsNames()
		{
			return $this->varsNames;
		}
		
		public function vars()
		{
			return $this->vars;
		}
	}