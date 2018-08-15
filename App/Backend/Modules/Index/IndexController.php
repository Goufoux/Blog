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
			{
				$this->page->addVar('title', 'Blog - Admin');
				/* On regarde si des commentaires sont signalés, si c'est le cas on les affiche */
				$cManager = $this->managers->getManagerOf('Comment')->getCommentReport();
				$this->page->addVar('report', $cManager);
				
				/* On regarde si des données sont présentes dans l'url */
				if($HTTPRequest->getExists('delComment') AND !empty($HTTPRequest->getData('delComment'))) // Demande de suppression d'un commentaire //
				{
					$e = $this->managers->getManagerOf('Comment')->delComment($HTTPRequest->getData('delComment'));
					if($e)
					{
						$this->app->HTTPResponse()->redirect('/openclassroom/Blog/Web/admin/');
					}
					else // L'id est invalid
					{
						$this->page->addVar('error', 'Id invalid.');
					}
				}
				if($HTTPRequest->getExists('delCommentAndReport') AND !empty($HTTPRequest->getData('delCommentAndReport')))
				{
					$tab = [$HTTPRequest->getData('delCommentAndReport'), $HTTPRequest->getData('email')];
					$e = $this->managers->getManagerOf('Comment')->delComment($tab, true);
					if($e)
					{
						$this->app->HTTPResponse()->redirect('/openclassroom/Blog/Web/admin/');
					}
					else
						$this->page->addVar('error', $e);
				}
			}
			else
				$this->app->HTTPResponse()->redirect('../connect');
		}
		
		public function executeConnect(HTTPRequest $HTTPRequest)
		{
			$this->page->addVar('title', 'Blog - Connexion');
			
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
						$this->page->addVar('error', $uManager->getError());
				}
				else
					$this->page->addVar('error', 'Veuillez renseigner votre Pass.');
			}
		}
		
		public function executeDeconnect(HTTPRequest $HTTPRequest)
		{
			session_destroy();
			$this->app->HTTPResponse()->redirect('../');
		}
		
		public function executeDel(HTTPRequest $HTTPRequest)
		{
			if($this->app->user()->isAuthentificated())
			{
				$this->page->addVar('title', 'Blog - Supprimer');
				if($HTTPRequest->getExists('id'))
				{
					$billet = $this->managers->getManagerOf('Billet')->getBillet($HTTPRequest->getData('id'));
					$this->page->addVar('billet', $billet);
				}
				
				/* Si on trouve la confirmation on supprime le billet */
				if($HTTPRequest->postExists('delBillet') AND $billet)
				{
					if($this->managers->getManagerOf('Billet')->delBillet($billet->getId()))
					{
						$this->page->addVar('success', 'Le billet a bien été supprimé');
					}
				}
			}
			else
			{
				$this->app->HTTPResponse()->redirect('../connect');
			}
		}
		
		public function executeUpd(HTTPRequest $HTTPRequest)
		{
			if($this->app->user()->isAuthentificated())
			{
				$this->page->addVar('title', 'Blog - Modifier');
				
				/* On regarde si le billet à modifier a été séléctionné */
				if($HTTPRequest->getExists('id'))
				{
					$billet = $this->managers->getManagerOf('Billet')->getBillet($HTTPRequest->getData('id'));
					$this->page->addVar('billet', $billet);
				}
				
				if($HTTPRequest->postExists('bTitle') AND !empty($HTTPRequest->postData('bTitle')))
				{
					/* On accède au manager des Billets */
					$bManager = $this->managers->getManagerOf('Billet');
					$billet = new Billet([
					'id' => $billet->getId(),
					'titre' => $HTTPRequest->postData('bTitle'),
					'contenu' => $HTTPRequest->postData('bDesc'),
					'datePub' => $billet->getDatePub()
					]);
					/* On vérifie si il y a des erreurs */
					if(!$billet->getErreurs())
					{
						$e = $bManager->updBillet($billet);
						if($e)
						{
							$this->page->addVar('success', true);
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
			}
			else
			{
				$this->app->HTTPResponse()->redirect('../connect');
			}
			
		}
		
		public function executeAdd(HTTPRequest $HTTPRequest)
		{
			if($this->app->user()->isAuthentificated())
			{
				$this->page->addVar('title', 'Blog - Ajouter');
				
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
							$this->page->addVar('success', true);
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
			}
			else
			{
				$this->app->HTTPResponse()->redirect('../connect');
			}
		}
	}