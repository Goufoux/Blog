<?php

	/*
		Genarkys
		ver 1.0
		Assigne une vue à la page
	*/
	namespace Core;
	
	use \Core\Style;
	
	class Page extends ApplicationComponent
	{
		protected $contentFile;
		protected $vars = [];
		
		public function addVar($var, $value)
		{
			if(!is_string($var) || is_numeric($var) || empty($var))
			{
				throw new \InvalidArgumentException('Le nom de la variable n\'est pas valide ou n\'existe pas.');
			}
			
			$this->vars[$var] = $value;
		}
		
		public function getGeneratedPage()
		{
			if(!file_exists($this->contentFile))
			{
				echo 'La vue spécifiée n\'existe pas.' . $this->contentFile;
			}
			
			$user = $this->app->user();
			$style = new Style();
			extract($this->vars);
			ob_start();
				require $this->contentFile;
			$content = ob_get_clean();
			
			ob_start();
				require __DIR__.'/../../App/'.$this->app->name().'/Templates/layout.php';
			return ob_get_clean();
			
		}
		
		public function setContentFile($contentFile)
		{
			if(!is_string($contentFile) || empty($contentFile))
			{
				throw new \InvalidArgumentException('La vue spécifiée est invalide, ou vide.');
			}
			
			$this->contentFile = $contentFile;
		}
	}