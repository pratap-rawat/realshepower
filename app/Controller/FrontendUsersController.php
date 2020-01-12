<?php

App::uses('AppController', 'Controller');

class FrontendUsersController extends AppController
{

    public $components = array('Session', 'Cookie');

    public $uses = array('User');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('addFrontEndUser', 'login');

        if ($this->Auth->user('id')) {
            $this->layout = 'front';
            $this->theme = 'frontend';
        }
    }

    public function addFrontEndUser()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {

            $dataSet = $this->request->data;
            $validateUserInput = $this->__validateUserInput($dataSet['FrontendUsers']);
            if (!$validateUserInput['status']) {
                return json_encode($validateUserInput);
            }

            $this->User->create();

            // return json_encode($dataSet,true);
            $dataSet['User']['first_name'] = ucwords($dataSet['FrontendUsers']['first_name']);
            $dataSet['User']['email'] = $dataSet['FrontendUsers']['email'];
            $dataSet['User']['username'] = $dataSet['FrontendUsers']['email'];
            $dataSet['User']['mobile'] = ucwords($dataSet['FrontendUsers']['mobile']);
            $dataSet['User']['gender'] = ucwords($dataSet['FrontendUsers']['gender']);
            $encPass = AuthComponent::password($dataSet['FrontendUsers']['confirmPassword']);
            $dataSet['User']['password'] = $dataSet['FrontendUsers']['confirmPassword'];
            $output = [];

            /*$this->Model->validator()
            ->add('email', 'required', array(
            'rule' => array('notEmpty'),
            'message' => 'A email is required',
            $output['status'] = false;
            $output['status'] = false;
            ))
            ->add('email', 'isUnique', array(
            'rule' => array('notEmpty'),
            'message' => 'This email is already registered'
            ))
            ->add('email', 'email', array(
            'rule' => array('email'),
            'message' => 'Enter valid mail address'
            ));*/

            //echo '<pre>'; print_r($dataSet); die;
            if ($this->User->save($dataSet)) {
                //pr($this->User->read()); die;
                if ($this->Auth->login($this->User->read())) {
                    $output['status'] = true;
                    $output['message'] = 'signup & login successful';
                } else {
                    $output['status'] = false;
                    $output['message'] = 'login failed';
                }
            } else {
                $output['status'] = false;
                $output['message'] = 'sign-up failed';
                /*$this->Session->setFlash(__('The user could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));*/
            }
            return json_encode($output, true);
        }
    }

    public function login()
    {
        $this->autoRender = false;
        if ($this->Session->check('Auth.User')) {
            return $this->redirect($this->referer());
        }
        if ($this->request->is('post')) {
            $output = array();
            $data = $this->request->data["User"];
            if (isset($data['username']) && empty($data['username'])) {
                return json_encode(array('status' => false, 'message' => 'Please enter username'));
            }

            if (isset($data['password']) && empty($data['password'])) {
                return json_encode(array('status' => false, 'message' => 'Please enter password'));
            }
            // $mainData["User"] = [
            //     "username" => $data["username"],
            //     "password" => $data["password"]
            // ];
            // $this->request=$mainData;

            if ($this->Auth->login()) {
                $output["status"] = true;
                $output["message"] = "Login Successful";
            } else {
                $output["status"] = false;
                $output["message"] = "Invalid username or password";
            }
            return json_encode($output);
        }
    }

    public function logout()
    {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    private function __validateUserInput(array $requestData)
    {
        if (empty(trim($requestData['first_name']))) {
            return array('status' => false, 'message' => 'Please enter first name');
        }

        if (empty(trim($requestData['email']))) {
            return array('status' => false, 'message' => 'Please enter email');
        }

        if (!filter_var(trim($requestData['email']), FILTER_VALIDATE_EMAIL)) {
            return array('status' => false, 'message' => 'Please enter a valid email address');
        }

        if (isset($requestData['password']) && empty($requestData['password'])) {
            return array('status' => false, 'message' => 'Please enter password');
        }

        return array('status' => true);
    }
}
