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
			$billet = $this->managers->getManagerOf('Billet')->getBillet(false, $nbBillet);
			$this->page->addVar('billet', $billet);
		}
		
		public function executeListBillet(HTTPRequest $HTTPRequest)
		{
			$bManager = $this->managers->getManagerOf('Billet')->getBillet();
			$this->page->addVar('title', 'Liste des Billets');
			$this->page->addVar('list', $bManager);
		}
		
		public function executeConnect(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Connexion');
			
			/* On regarde si des identifiants sont transmis pour une connexion */
			if($HTTPRequest->postExists('uLogin') AND $HTTPRequest->postData('uLogin'))
			{
				if($HTTPRequest->postExists('uPass') AND !empty($HTTPRequest->postData('uPass')))
				{
					$uManager = $this->managers->getManagerOf('User');
					if($uManager->userLogin($HTTPRequest->postData('uLogin'), $HTTPRequest->postData('uPass')))
					{
						$this->app->HTTPResponse()->redirect('.');
					}
					else
						$this->page->addVar('error', $uManager->getError());
				}
				else
					$this->page->addVar('error', 'Veuillez renseigner votre Pass.');
			}
		}
		
		public function executeDeconnect(HTTPRequest $HTTPRequest)
		{
			session_destroy();
			$this->app->HTTPResponse()->redirect('.');
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
				$comment = new Comment([
					'name' => $HTTPRequest->postData('cName'),
					'contenu' => $HTTPRequest->postData('cDesc'),
					'email' => $HTTPRequest->postData('cEmail'),
					'attachId' => $HTTPRequest->postData('bId')
				]);
				/*  */
				if(!$comment->getErreurs())
				{
					$cManager = $this->managers->getManagerOf('comment');
					if($cManager->addComment($comment))
					{
						$this->app->HTTPResponse()->redirect('/openclassroom/Blog/Web/billet-'.$comment->getAttachId());
					}
					else
						$this->page->addVar('error', $cManager->getError());
				}
				else
				{
					$error = $comment->getErreurs();
					$this->page->addVar('error', $error[0]);
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