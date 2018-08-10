<?php

	namespace App\Frontend\Modules\Index;
	
	use \Core\HTTPRequest;
	use \Core\BackController;
	use \Core\LinkCreator;
	
	/*
	 * author: Genarkys
	 *
	 * La class IndexController
	*/
	
	class IndexController extends BackController
	{
		public function executeIndex(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Blog');
		}
	}