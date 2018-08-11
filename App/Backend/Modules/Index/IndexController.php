<?php

	namespace App\Backend\Modules\Index;
	
	use \Core\HTTPRequest;
	use \Core\BackController;
	/*
	 * author: Genarkys
	 *
	 * La class IndexController pour le Backend
	*/
	
	class IndexController extends BackController
	{
		public function executeIndex(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Admin - Backend');	
			$this->page->addVar('req', $HTTPRequest);
		}
		
		public function executeAdd(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Admin - Add');
			$this->page->addVar('req', $HTTPRequest->getData('bTitle'));
		}
	}