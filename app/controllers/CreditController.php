<?php

use Phalcon\Mvc\Controller;

class CreditController extends ControllerBase
{
    public function indexAction()
    {  
        $auth = $this->session->get('auth');
        $this->view->auth = $auth;
    }

	public function package1Action()
	{
		$product = "1";
        
		if (isset($_POST['pakket1'])) {
		$this->session->set('producten', array('id' => $product));
    		$this->response->redirect('session/register');
		}; 
	}
		public function package2Action()
	{
		$product = ("2");
        
		if (isset($_POST['pakket2'])) {
		$this->session->set('producten', array('id' => $product));
    		$this->response->redirect('session/register');
		}; 
	}
		public function package3Action()
	{
		$product = ("3");
        
		if (isset($_POST['pakket3'])) {
		$this->session->set('producten', array('id' => $product));
    		$this->response->redirect('session/register');
		}; 
	}
}