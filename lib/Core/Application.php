<?php
	/*
		Genarkys
		ver 1.0
		Application.php
		
		Coeur de l'application se charge d'instancier les contrôlleurs
	*/
	namespace Core;
	
	abstract class Application
	{
		protected $name;
		protected $HTTPRequest;
		protected $HTTPResponse;
		protected $user;
		protected $config;
		
		public function __construct()
		{
			$this->HTTPRequest = new HTTPRequest($this);
			$this->HTTPResponse = new HTTPResponse($this);
			$this->user = new User;
			$this->config = new Config($this);
			
			$this->name = '';
		}
		
		public function getController()
		{
			$router = new Router;
			$xml = new \DOMDOCUMENT;
			$xml->load(__DIR__.'/../../App/'.$this->name.'/Config/routes.xml');
			$routes = $xml->getElementsByTagName('route');
			foreach($routes as $route)
			{
				$vars = [];
				if($route->hasAttribute('vars'))
				{
					$vars = explode(',', $route->getAttribute('vars'));
				}
				
				$router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
			}
			try
			{
				$matchedRoute = $router->getRoute($this->HTTPRequest->requestURI());
			}
			catch(\RuntimeException $e)
			{
				if($e->getCode() == Router::NO_ROUTE)
				{
					$this->HTTPResponse->redirect404();
				}
			}
			
			$_GET = array_merge($_GET, $matchedRoute->vars());
			
			$controllerClass = 'App\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
			return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
		}
		
		abstract public function run();
		
		public function name()
		{
			return $this->name;
		}
		
		public function HTTPRequest()
		{
			return $this->HTTPRequest;
		}
		
		public function HTTPResponse()
		{
			return $this->HTTPResponse;
		}
		
		public function user()
		{
			return $this->user;
		}
		
		public function config()
		{
			return $this->config;
		}
	}