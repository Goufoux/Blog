<?php
namespace App\Frontend;

use \Core\Application;

class FrontendApplication extends Application
{
	public function __construct()
	{
		parent::__construct();

		$this->name = 'Frontend';
	}

  public function run()
  {
    $controller = $this->getController();
    $controller->execute();

    $this->HTTPResponse->setPage($controller->page());
	
    $this->HTTPResponse->send();
  }
}