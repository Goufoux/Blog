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
			$this->page->addVar('title', 'Genarkys - Admin - Backend');	
			$this->page->addVar('req', $HTTPRequest);
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