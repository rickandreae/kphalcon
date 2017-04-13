<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
    	mediabrons::find();
    	mediazilver::find();
    	mediagold::find();

    	$query = $this->modelsManager->createQuery("SELECT media_id, videos, title, description FROM mediabrons ORDER BY media_id DESC LIMIT 3");
		$this->view->mediabrons = $query->execute();
		$query = $this->modelsManager->createQuery("SELECT media_id, videos, title, description FROM mediazilver ORDER BY media_id DESC LIMIT 3");
		$this->view->mediazilver = $query->execute();
		$query = $this->modelsManager->createQuery("SELECT media_id, videos, title, description FROM mediagold ORDER BY media_id DESC LIMIT 3");
		$this->view->mediagold = $query->execute();

		// $this->view->mediazilver = mediazilver::find();
		// $this->view->mediagold = mediagold::find();
    }
}