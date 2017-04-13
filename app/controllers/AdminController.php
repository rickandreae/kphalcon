<?php

class AdminController extends ControllerBase
{
	public function indexAction()
	{
		$auth = $this->session->get('auth');
		if(empty($auth)){
            $this->response->redirect('');
        }
	}

	public function changelvlAction()
	{
		$auth = $this->session->get('auth');
		if(empty($auth)){
            $this->response->redirect('');
        }
		if($this->request->isPost())
        {
        $id = $this->request->getPost(user_id);
		$user = users::findFirstByuser_id($id);
        $user->lvl = $this->request->getPost('lvl');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }else{
        	$this->response->redirect('');
        }
	}
}
}