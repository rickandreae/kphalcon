<?php

use Phalcon\Mvc\Controller;

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
				$mediabrons = new mediabrons();

				$mediabrons->videos = $videos;
				$mediabrons->title = $title;
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

}
