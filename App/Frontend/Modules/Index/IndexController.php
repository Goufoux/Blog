<?php

	namespace App\Frontend\Modules\Index;
	
	use \Core\HTTPRequest;
	use \Core\BackController;
	use \Entity\Comment;
	
	/*
	 * author: Genarkys
	 *
	 * La class IndexController pour le Frontend 
	*/
	
	class IndexController extends BackController
	{
		public function executeIndex(HTTPRequest $HTTPRequest)
		{
			$nbBillet = $this->app->config()->get('nbBillet');
			$this->page->addVar('title', 'Genarkys - ' . $nbBillet . ' derniers billets');
			$billet = $this->managers->getManagerOf('Billet')->getBillet();
			$this->page->addVar('billet', $billet);
		}
		
		public function executeShowBillet(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Billet');
			$billet = $this->managers->getManagerOf('Billet')->getBillet($HTTPRequest->getData('id'));
			$this->page->addVar('billet', $billet);
			
			/* On regarde si des données pour un commentaire sont présente */
			if($HTTPRequest->postExists('cName'))
			{
				// $this->page->addVar('comment', true);
				$comment = new Comment([
					'name' => $HTTPRequest->postData('cName'),
					'contenu' => $HTTPRequest->postData('cDesc'),
				]);
				/*  */
				$e = count($comment->getErreurs());
				$this->page->addVar('success', $e);
			}
			
		}
	}