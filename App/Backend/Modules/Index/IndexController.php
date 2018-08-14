<?php

	namespace App\Backend\Modules\Index;
	
	use \Core\HTTPRequest;
	use \Core\BackController;
	use \Entity\Billet;
	
	/*
	 * author: Genarkys
	 *
	 * La class IndexController pour le Backend
	*/
	
	class IndexController extends BackController
	{
		public function executeIndex(HTTPRequest $HTTPRequest)
		{
			if($this->app->user()->isAuthentificated())
				$this->page->addVar('title', 'Genarkys - Admin - Backend');	
			else
				$this->app->HTTPResponse()->redirect('connect');
		}
		
		public function executeConnect(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Connexion');
			
			/* On regarde si des identifiants sont transmis pour une connexion */
			if($HTTPRequest->postExists('uLogin'))
			{
				if($HTTPRequest->postExists('uPass') AND !empty($HTTPRequest->postData('uPass')))
				{
					$uManager = $this->managers->getManagerOf('User');
					if($uManager->userLogin($HTTPRequest->postData('uLogin'), $HTTPRequest->postData('uPass')))
					{
						$this->app->HTTPResponse()->redirect('../');
					}
					else
						$this->page->addVar('success', $uManager->getError());
				}
				else
					$this->page->addVar('success', 'Renseigné Pass');
			}
		}
		
		public function executeDeconnect(HTTPRequest $HTTPRequest)
		{
			session_destroy();
			$this->app->HTTPResponse()->redirect('../');
		}
		
		public function executeAdd(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Genarkys - Admin - Add');
			
			/* On vérifie la page pour voir si il y a des données POST qui ont été transmise (données d'ajout du billet) */
			if($HTTPRequest->postExists('bTitle') AND !empty($HTTPRequest->postData('bTitle')))
			{
				/* On accède au manager des Billets */
				$bManager = $this->managers->getManagerOf('Billet');
				$billet = new Billet([
				'titre' => $HTTPRequest->postData('bTitle'),
				'contenu' => $HTTPRequest->postData('bDesc')
				]);
				/* On vérifie si il y a des erreurs */
				if(!$billet->getErreurs())
				{
					$e = $bManager->addBillet($billet);
					if($e)
					{
						$this->page->addVar('success', $bManager->getManagerError());
					}
					else
					{
						$this->page->addVar('error', $bManager->getManagerError());
					}
				}
				else
				{
					$this->page->addVar('error', $billet->getErreurs());
				}
			}
			else
			{
				$this->page->addVar('req', 'Formulaire non détécté');
				$this->page->addVar('method', $HTTPRequest->method());
			}
		}
	}