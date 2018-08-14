<?php

	namespace Model;
	
	use \Core\Manager;
	use \Entity\Billet;
	
	abstract class BilletManager extends Manager
	{
		abstract public function addBillet(Billet $billet);
		
		abstract public function existTitle($title);
		
		abstract public function getBillet($id = false);
	}