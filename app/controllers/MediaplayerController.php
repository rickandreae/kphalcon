<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class MediaplayerController extends ControllerBase
{
	public function indexAction()
	{
		$auth = $this->session->get('auth');
		if($auth['lvl'] == 6){
		$this->view->mediabrons = mediabrons::find();
		$this->view->mediazilver = mediazilver::find();
		$this->view->mediagold = mediagold::find();
	}else{
		$this->response->redirect('');
	}
		$this->session->set('mediaid', array('id' =>  $_GET['id']));
	}

	public function playbronsAction()
	{
		$this->session->set('mediaid', array('id' =>  $_GET['id']));
	} 

	public function playzilverAction()
	{
		$this->session->set('mediaid', array('id' =>  $_GET['id']));
	}

	public function playgoldAction()
	{
		$this->session->set('mediaid', array('id' =>  $_GET['id']));
	} 

	public function bronsvideoAction() 
	{
		$auth = $this->session->get('auth');
		if(empty($auth)){
            $this->response->redirect('');
        }
        if($auth['lvl'] == 6){
		if($this->request->isPost()){
				$videos = $this->request->getPost('videos');
				$title = $this->request->getPost('title');
				$description = $this->request->getPost('description');
				$programma = $this->request->getPost('programma');
				$thumbnail = $this->request->getPost('thumbnail');
				$mediabrons = new mediabrons();

				$mediabrons->videos = $videos;
				$mediabrons->title = $title;
				$mediabrons->programma = $programma;
				$mediabrons->thumbnail = $thumbnail;
				$mediabrons->description = $description;

            if($mediabrons->save() != false)
            {
                $this->view->message = 'upload went right';
            }else{
                $this->view->message = 'something went wrong';
            }
				
		}
	}else{
		$this->response->redirect('');
	}
			
			
	}

	public function zilvervideoAction() 
	{
		$auth = $this->session->get('auth');
		if(empty($auth)){
            $this->response->redirect('');
        }
        if($auth['lvl'] == 6){
		if($this->request->isPost()){

				$videos = $this->request->getPost('videos');
				$title = $this->request->getPost('title');
				$description = $this->request->getPost('description');
				$mediazilver = new mediazilver();

				$mediazilver->videos = $videos;
				$mediazilver->title = $title;
				$mediazilver->description = $description;

            if($mediazilver->save() != false)
            {
                $this->view->message = 'upload went right';
            }else{
                $this->view->message = 'something went wrong';
            }
				
		}
	}else{
		$this->response->redirect('');
	}
			
			
	}

	public function goldvideoAction() 
	{
		$auth = $this->session->get('auth');
		if(empty($auth)){
            $this->response->redirect('');
        }
        if($auth['lvl'] == 6){
		if($this->request->isPost()){

				$videos = $this->request->getPost('videos');
				$title = $this->request->getPost('title');
				$description = $this->request->getPost('description');
				$mediagold = new mediagold();

				$mediagold->videos = $videos;
				$mediagold->title = $title;
				$mediagold->description = $description;

            if($mediagold->save() != false)
            {
                $this->view->message = 'upload went right';
            }else{
                $this->view->message = 'something went wrong';
            }
				
		}
	}else{
		$this->response->redirect('');
	}
			
			
	}


    public function videoactionsAction()
    {
        $auth = $this->session->get('auth');
		$this->view->mediabrons = mediabrons::find();
		$this->view->mediazilver = mediazilver::find();
		$this->view->mediagold = mediagold::find();
    }

    public function deletevideoAction($media_id)
    {
    	$auth = $this->session->get('auth');
    	if($auth['lvl'] == 6){
            $media = media::findFirstBymedia_id($media_id);
            if($media->delete() != false){
                $this->response->redirect('');
            }else{
                $this->response->redirect('');
            }
    }
}

 public function uploadAction(){

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        if(empty($auth)){
            $this->response->redirect('');
        }

        if ($this->request->hasFiles() == true){
          
            $baseLocation = 'img/thumbnail/';

            if(!file_exists($baseLocation)){
                mkdir($baseLocation, 0777);
            }
             $extension = array(
              'jpg',
              'png',
              'jpeg');

          foreach ($this->request->getUploadedFiles() as $file) {
            
            if(in_array($file->getExtension(), $extension))
            {
                $path = $baseLocation . $file->getName();
                $this->view->message = $file->getExtension();
                if($file->moveTo($path) != false){
                    $this->view->message .= ' moved';
                }else{
                    $this->view->message .= ' no move';
                }

                 $this->view->message = 'file is uploaded';
            }else{
    
                $this->view->message = 'file is not uploaded... ext: ' . $file->getExtension();
            }         
          }
        }

}

}
