<?php 
	/*
		Genarkys
		ver 1.0
		Se charge d'appeler le constructeur parent pour créer une instance de la classe Page qui sera stocké et assigne les valeurs (module, action, vue)
	*/
	namespace Core;
	
	abstract class BackController extends ApplicationComponent
	{
		protected $action = '';
		protected $module = '';
		protected $page = null;
		protected $view = '';
		protected $managers = null;
		
		public function __construct(Application $app, $module, $action)
		{
			parent::__construct($app);
			
			$this->managers = new managers('PDO', PDOFactory::getMysqlConnexion());
			$this->page = new Page($app);
			
			$this->setModule($module);
			$this->setAction($action);
			$this->setView($action);
		}
		
		/* Invoque la méthode correspondant à l'action */
		
		public function execute()
		{
			$method = 'execute'.ucfirst($this->action);
			if(!is_callable([$this, $method]))
			{
				throw new \RuntimeException('L\'action ' . $this->action . ' n\'est pas définie sur ce module.');
			}
			$this->$method($this->app->HTTPRequest());
			
		}
		
		public function page()
		{
			return $this->page;
		}
		
		public function getManagers()
		{
			return $this->managers;
		}
		
		public function setAction($action)
		{
			if(!is_string($action) || empty($action))
			{
				throw new \InvalidArgumentException('L\'action doit être une chaîne de caractères valide.');
			}
			$this->action = $action;
		}
		
		public function setModule($module)
		{
			if(!is_string($module) || empty($module))
			{
				throw new \InvalidArgumentException('Le module doit être une chaîne de caractères valide.');
			}
			$this->module = $module;
		}
		
		public function setView($view)
		{
			if(!is_string($view) || empty($view))
			{
				throw new \InvalidArgumentException('La vue n\'existe pas ou n\'est pas valide.');
			}
			$this->view = $view;
			
			$this->page->setContentFile(__DIR__.'/../../App/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
		}
	}