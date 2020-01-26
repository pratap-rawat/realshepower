<?php

App::uses('AppController', 'Controller');

class FrontendUsersController extends AppController
{

    public $components = array('Session', 'Cookie');

    public $uses = array('User','Category','Post');

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

            //  echo '<pre>'; print_r($dataSet); die;
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

    public function dashboard()
    {
        $userData = $this->Auth->user();
		$id = $userData['id'];
		$userinfo=$this->User->getUserById($id);
        $this->set('userProfile', $userinfo['User']);
        $this->set('title', COMPANY_NAME . ' - Dashboard');
    }

    public function profile()
    {
		$userData = $this->Auth->user();
		$id = $userData['id'];
		$userinfo=$this->User->getUserById($id);
        $this->set('userProfile', $userinfo['User']);
        $this->set('title', COMPANY_NAME . ' - Profile');
    }

    public function editprofile()
    {
        $userData = $this->Auth->user();
        $id = $userData['id'];
        $this->User->id = $id;
        if ($this->User->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;

                //Check if profile image has been uploaded
                if (!empty($dataSet['profile_image']['name'])) {
                    $file = $dataSet['profile_image']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                    //only process if the extension is valid
                    if (in_array($ext, $arr_ext)) {
                        $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' . rand(11111, 99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/frontend_images/user/' . 'user_' . $rand_name . '_profile_image.' . $ext);

                        $dataSet['profile_image'] = 'user_' . $rand_name . '_profile_image.' . $ext;
                    } else {
                        $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                        $this->redirect(array('action' => 'profile', $id));
                    }
                } else {
                    unset($dataSet['profile_image']);
                }

                if ($this->User->save($dataSet)) {
                    $this->Session->setFlash(__('Password has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('action' => 'profile'));
                } else {
                    $this->Session->setFlash(__('Unable to Update password. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('action' => 'profile'));
                }
            }
        } else {
            $this->Session->setFlash(__('User does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('action' => 'profile'));
        }
        
        $this->set('title', COMPANY_NAME . ' - Change Profile');

		$userinfo=$this->User->getUserById($id);
        $this->set('userProfile', $userinfo['User']);
    }

    public function addBlog()
    {
        $userData = $this->Auth->user();
        $id = $userData['id'];
        $userinfo=$this->User->getUserById($id);
        
        if(strtolower($userinfo['User']['gender'])=='male'){
            return $this->redirect(array('action' => 'dashboard'));
        }

        if ($this->request->is('post')) {
            $this->Post->create();
            $dataSet = $this->request->data;

            if(!empty($dataSet['valueForYourForm'])){
                $tags =  json_encode(explode(',', $dataSet['valueForYourForm']));
                $dataSet['tags'] = $tags;
            }else{
                unset($dataSet['tags']);
            }
            unset($dataSet['valueForYourForm']);
            $dataSet['user_id']=$id;

            //echo '<pre>'; print_r($tags); die;

            //Check if profile image has been uploaded
            if(!empty($dataSet['featured_image']['name']))
            {
                $file = $dataSet['featured_image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' .rand(11111,99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . 'post_' .$rand_name.'_featured_image.'.$ext);

                        //prepare the filename for database entry
                        //$dataSet['featured_image'] = $file['name'];
                        $dataSet['featured_image'] = 'post_'.$rand_name.'_featured_image.'.$ext;
                }else{
                    $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                }
            }else{
                unset($dataSet['featured_image']);
            }

            if ($this->Post->validates()) {
                if ($this->Post->save($dataSet)) {
                    $this->Session->setFlash(__('Your blog has been successfully post', null), 'default', array('class' => 'alert alert-success fade in'));
                    try {
                       // $this->__sendNewUserEmail($dataSet);
                    }  catch (Exception $ex) {
                        $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                    }
                    return $this->redirect(array('action' => 'addBlog'));
                } else {
                    $this->Session->setFlash(__('The Blog could not be Submitted. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
                }
            } else {
                $errors = $this->ModelName->validationErrors;
                echo $errors;
            }

            
        }

        $this->set('title', COMPANY_NAME . ' - Post Blog');
        
        $this->set('userProfile', $userinfo['User']);
        $allCategories = $this->Category->findAllCategoriesList();
        $this->set('categories', $allCategories);
    }

    public function changePassword()
    {
        $userData = $this->Auth->user();
        $id = $userData['id'];
        $this->User->id = $id;
        if ($this->User->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;
                if ($this->data['FrontendUsers']['password'] !== $this->data['FrontendUsers']['confirm_password']) {
                 
                    $this->Session->setFlash(__('Confirm password must match Password  .', null), 'default', array('class' => 'alert alert-danger fade in'));
                    
                }else{
                    $encPass = AuthComponent::password($dataSet['FrontendUsers']['password']);
                    $dataSet['User']['password']=$dataSet['FrontendUsers']['password'];
                    unset($dataSet['FrontendUsers']['confirm_password']);
                    if ($this->User->save($dataSet)) {
                        $this->Session->setFlash(__('Password has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                        $this->redirect(array('action' => 'dashboard'));
                    } else {
                        $this->Session->setFlash(__('Unable to edit password. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                        $this->redirect(array('action' => 'changePassword'));
                    }
                }
                
            }
        } else {
            $this->Session->setFlash(__('User does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('action' => 'profile'));
        }
        
        $this->set('title', COMPANY_NAME . ' - Change Profile');

        $userinfo=$this->User->getUserById($id);
        $this->set('userProfile', $userinfo['User']);
    }
}
