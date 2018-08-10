<?php

	/*
		Genarkys
		ver 1.0
		Se charge de stocker l'instance de l'application exécutée
	*/
	
	
	namespace Core;
	
	class ApplicationComponent
	{
		protected $app;
		
		public function __construct(Application $app)
		{
			$this->app = $app;
		}
		
		public function app()
		{
			return $this->app;
		}
	}