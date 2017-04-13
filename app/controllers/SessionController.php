<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Validator\Uniqueness;

class SessionController extends ControllerBase
{
    public function indexAction()
    {
       
        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        if($this->request->isPost())
        {
            $password = $this->request->getPost("password");
            $email = $this->request->getPost('email');
            $user = Users::findFirstByEmail($email);
            if ($user) { if ($this->security->checkToken()){
                if ($this->security->checkHash($password, $user->password)) {
                    $this->_authSession($user);
                    $this->response->redirect('');
                }
                else{
                    $this->view->title = 'banaan';
                }
            }
        }
        }
        // The validation has failed
    }

    private function _authSession($user){
        $this->session->set('auth', array(
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'phone' => $user->phone,
            'mobile' => $user->mobile,
            'birthdate' => $user->birthdate,
            'address' => $user->address,
            'zipcode' => $user->zipcode,
            'city' => $user->city,
            'userid' => $user->user_id,
            'lvl' => $user->lvl
            ));
    }


    public function ProfileAction()
    {
        
    }

        public function changeEmailAction()
    {
        if($this->request->isPost())
        {
            $id = $this->session->get('auth');
            print_r($id['userid']);

             $user = Users::findFirstByuser_id($id['userid']);
             if (!$user) {
            echo "User does not exist";
            die;
        }
        $user->email = $this->request->getPost('email');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }
        }
       
        
    }



    // private function changepasswordAction()
    // {
    //     $password = new password();
    //    $oldpassword = $this->request->getPost('oldpassword'); 
    //    $newpassword = $this->request->getPost('newpassword');
    // }

        public function changeBirthdateAction()
    {
        if($this->request->isPost())
        {

            $id = $this->session->get('auth');
            print_r($id['userid']);

            $user = Users::findFirstByuser_id($id['userid']);
            if (!$user) {
                print_r($id);
            echo "User does not exist";
            die;
        }
        $user->birthdate = $this->request->getPost('birthdate');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }
        }               
    }





        public function changePhoneAction()
    {
        if($this->request->isPost())
        {
            $id = $this->session->get('auth');
            print_r($id['userid']);

             $user = Users::findFirstByuser_id($id['userid']);
             if (!$user) {
            echo "User does not exist";
            die;
        }
        $user->phone = $this->request->getPost('phone');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }
        }
       
        
    }



        public function changeMobileAction()
    {
        if($this->request->isPost())
        {
            $id = $this->session->get('auth');
            print_r($id['userid']);

             $user = Users::findFirstByuser_id($id['userid']);
             if (!$user) {
            echo "User does not exist";
            die;
        }
        $user->mobile = $this->request->getPost('mobile');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }
        }
       
        
    }

    // private function changepasswordAction()
    // {
    //     $password = new password();
    //    $oldpassword = $this->request->getPost('oldpassword'); 
    //    $newpassword = $this->request->getPost('newpassword');
    // }


        public function changeAddressAction()
    {
        if($this->request->isPost())
        {
            $id = $this->session->get('auth');
            print_r($id['userid']);
             $user = Users::findFirstByuser_id($id['userid']);
             if (!$user) {
            echo "User does not exist";
            die;
        }
        $user->address = $this->request->getPost('address');
        $user->zipcode = $this->request->getPost('zipcode');
        $user->city = $this->request->getPost('city');
        $result = $user->save();
        if(!result) {
            print_r($user->getMessages());
        }
        }
       
        
    }

    public function changePasswordAction()
    {
        if($this->request->isPost())
        {
            $id = $this->session->get('auth');
            print_r($id['userid']);

            $user = Users::findFirstByuser_id($id['userid']);
            $oldpassword = $this->request->getPost('oldpassword');
        if($oldpassword == $this->security->checkHash($oldpassword, $user->password))
        {
             if (!$user) {
            echo "User does not exist";
            die;
        }
        $password = $this->request->getPost('newpassword');
        $password = $this->request->getPost('newpassword1');
        $user->password = $this->security->hash($password);
        $result = $user->save();
        if(!$result) 
        {
            echo "Password not Changed!";       
        }
        else
        {
            echo "Password Changed!";
            die;
        }
    }
    }
    }

    public function registerAction()
    {
        $auth = $this->session->get('auth');
        $this->view->auth = $auth;

        if($this->request->isPost())
        {
            $roles_type = $this->request->getPost('roles_name');
            $school = $this->request->getPost('school_name');
            $package = $this->request->getPost('product_name');
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $birthdate = $this->request->getPost('birthdate');
            $phone = $this->request->getPost('phone');
            $mobile = $this->request->getPost('mobile');
            $address = $this->request->getPost('address');
            $zipcode = $this->request->getPost('zipcode');
            $city = $this->request->getPost('city');

            $user = new Users();

            $user->roles_type = $roles_type;
            $user->school = $school;
            $user->package = $package;
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->email = $email;
            $user->password = $this->security->hash($password);
            $user->birthdate = $birthdate;
            $user->phone = $phone;
            $user->mobile = $mobile;
            $user->address = $address;
            $user->zipcode = $zipcode;
            $user->city = $city;
            $user->created_at = date;
            $user->lvl = 1;

            if($user->save() != false)
            {
                $this->response->redirect('session');
            }else{
                $this->view->message = 'something went wrong';
            }
        }
    }

    public function logoutAction()
    {
        $this->session->remove('auth');
        $this->response->redirect('');
    }
} 

