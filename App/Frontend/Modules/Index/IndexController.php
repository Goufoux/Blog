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
			$listComment = $this->managers->getManagerOf('Comment')->getComment($billet->getId(), 'list');
			$this->page->addVar('billet', $billet);
			$this->page->addVar('listComment', $listComment);
			
			/* On regarde si des données pour un commentaire sont présente */
			if($HTTPRequest->postExists('cName'))
			{
				// $this->page->addVar('comment', true);
				$comment = new Comment([
					'name' => $HTTPRequest->postData('cName'),
					'contenu' => $HTTPRequest->postData('cDesc'),
					'email' => $HTTPRequest->postData('cEmail'),
					'attachId' => $HTTPRequest->postData('bId')
				]);
				/*  */
				if(!$comment->getErreurs())
				{
					if($cManager = $this->managers->getManagerOf('comment')->addComment($comment))
						$this->page->addVar('success', 'Commentaire Ok');
					else
						$this->page->addVar('error', 'Erreur Commentaire');
				}
				else
				{
					$this->page->addVar('error', $comment->getErreurs());
				}
			}
			
			/* On regarde si un signalement est effectué */
			if($HTTPRequest->postExists('btSignaler'))
			{
				$idComment = explode('_', $HTTPRequest->postData('btSignaler'));
				/* On récupére le commentaire */
				if($cManager = $this->managers->getManagerOf('comment')->getComment($idComment[1], 'once'))
				{
					$nb = $cManager['signaler'] + 1;
					/* Mise à jour du nb de signalement */
					if($cManager = $this->managers->getManagerOf('comment')->signalerComment($idComment[1], $nb))
						$this->page->addVar('success', 'Signalement pris en compte');
					
				}
				
			}
			
		}
	}