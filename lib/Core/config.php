<?php

	namespace Core;
	
	/*
	 * Permet d'aller rechercher des definitions dans les fichiers xml
	*/
	
	class Config extends ApplicationComponent
	{
		protected $vars = [];
		
		public function get($var)
		{
			if(!$this->vars)
			{
				$xml = new \DOMDocument;
				$xml->load(__DIR__.'/../../App/'.$this->app->name().'/Config/app.xml');
				
				$elements = $xml->getElementByTagName('define');
				
				foreach($elements as $element)
				{
					$this->vars[$element->getAttribute('var')] = $element->getAttribute('value');
				}
			}
			
			if(isset($this->vars[$var]))
			{
				return $this->vars[$var];
			}
			
			return null;
		}
	}