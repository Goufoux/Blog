<?php

	namespace App\Backend\Modules\Index;
	
	use \Core\HTTPRequest;
	use \Core\BackController;
	/*
	 * author: Genarkys
	 *
	 * La class IndexController
	*/
	
	class IndexController extends BackController
	{
		public function executeIndex(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Admin - Backend');	
		}
	}