<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Session','Cookie');

    public $uses = array('User');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('admin_logout', 'admin_login', 'admin_forgotpassword', 'admin_reset_password_token');
    }

    public function admin_add() {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('action' => 'admin_dashboard'));
        }

        $this->set('title', COMPANY_NAME . ' - User Registration');
        //$this->layout = 'login';

        if ($this->request->is('post')) {
            $this->User->create();
            $dataSet = $this->request->data;
            $dataSet['User']['first_name'] = ucwords($dataSet['User']['first_name']);
            $dataSet['User']['last_name'] = ucwords($dataSet['User']['last_name']);
            $dataSet['User']['password'] = AuthComponent::password($dataSet['User']['confirmPassword']);
            $dataSet['User']['profile_image'] = 'default_'.$dataSet['User']['gender'].'_profile_image.jpeg';

            // echo '<pre>'; print_r($dataSet); die;
            if ($this->User->save($dataSet)) {
                $this->Session->setFlash(__('User Successfully created', null), 'default', array('class' => 'alert alert-success fade in'));
                try {
                   // $this->__sendNewUserEmail($dataSet);
                }  catch (Exception $ex) {
                    $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                }
                return $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
            }
        }
    }

    public function admin_login() {
        $this->set('title', COMPANY_NAME . ' - Login');
        $this->layout = 'login';
        if ($this->Session->check('Auth.Admin')) {
            return $this->redirect($this->referer());
        }
        if ($this->request->is('post')) {
            $dataSet = $this->request->data;
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class' => 'alert alert-danger fade in'));
        }
    }

    public function admin_logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    public function admin_dashboard() {
        $this->set('title', COMPANY_NAME . ' - Dashboard');
    }

    public function admin_viewList() {

        // echo 'User View List'; die;
        //ho AuthComponent::user('role'); die;
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Users', 'action' => 'admin_dashboard'));
        }
        
        $users = $this->User->findAllUsers();
        //echo '<pre>'; print_r($users); die;
        $count = count($users);
        $this->set('data', $users);
        $this->set('count', $count);
        $this->set('title', 'Users List');
    }

    public function admin_edit() {
        $id = $this->request->params['pass'][0];
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            if($id != $this->Auth->user('id')){
                $this->Session->setFlash(__("Sorry, You Don't Have Permission To Edit Details!", null), 'default', array('class' => 'alert alert-danger fade in'));
                return $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
            }
        }

        // get column type
        $gender_type = $this->User->getColumnType('gender');

        // extract values in single quotes separated by comma
        preg_match_all("/'(.*?)'/", $gender_type, $enums1);

        $this->set('genders', array_combine($enums1[1], array_map('ucwords',$enums1[1])));



        $this->User->id = $id;
        if ($this->User->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;
                if (!empty($dataSet['User']['new_password'])) {
                    $dataSet['User']['password'] = AuthComponent::password($dataSet['User']['new_password']);
                }else{
                    unset($dataSet['User']['new_password']);
                }
                $dataSet['User']['full_name'] = ucwords($dataSet['User']['full_name']);

                //Check if profile image has been uploaded
                if(!empty($dataSet['User']['profile_image']['name']))
                {
                    $file = $dataSet['User']['profile_image']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/users/profile_images/' . 'user_' .$id.'_profile_image.'.$ext);

                            //prepare the filename for database entry
                            //$dataSet['User']['profile_image'] = $file['name'];
                            $dataSet['User']['profile_image'] = 'user_'.$id.'_profile_image.'.$ext;
                    }else{
                        $this->Session->setFlash(__('Please Upload Only JPEG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                        $this->redirect(array('controller'=>'Users', 'action' => 'admin_edit', $id));
                    }
                }else{
                    //$dataSet['User']['profile_image'] = AuthComponent::user('profile_image');
                    unset($dataSet['User']['profile_image']);
                }

                if ($this->User->save($dataSet)) {
                    $this->Session->setFlash(__('User has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
                } else {
                    $this->Session->setFlash(__('Unable to edit user. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
                }
            } else {
                $this->request->data = $this->User->read();
            }
        } else {
            $this->Session->setFlash(__('The user you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
        }
        //echo 'pratap--<pre>';print_r($this->request->data); die;

        $this->set('title', COMPANY_NAME . ' - Edit Profile');
        $this->set('loggedRole', $this->Auth->user('role'));
    }

    public function admin_viewDetails() {
        $id = $this->request->params['pass'][0];
        $users = $this->User->getUserById($id);
        //echo '<pre>'; print_r($users); die;
        $count = count($users);
        if($count > 0){
            $this->set('data', $users);
            $this->set('count', $count);
            $this->set('title', COMPANY_NAME . ' - '.' User Details');
        }else {
            $this->Session->setFlash(__('The user you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('controller'=>'Users', 'action' => 'admin_viewList'));
        }
    }

    public function admin_forgotpassword() {
        $this->layout = "login";
        $username = $this->request->data;
        if ($this->request->is('post')) {
            try {
                if (!empty($username)) {
                    $data = $this->User->checkUserName($username);
                    if ($data['status']) {
                        $user = $this->__generatePasswordToken($data['data']);
                        if ($this->User->save($user) && $this->__sendForgotPasswordEmail($user['User']['id'])) {
                            $this->Session->setflash(__('Password reset instructions have been sent to your email address.
                                                    You have 24 hours to complete the request.'), 'default', array('class' => 'alert alert-danger fade in'));
                            return $this->redirect(array('controller' => 'Users', 'action' => 'admin_login'));
                        }
                    }
                } else {
                    $this->Session->setFlash(__('Please enter your username'), 'default', array('class' => 'alert alert-danger fade in'));
                    return $this->redirect(array('controller' => 'Users', 'action' => 'admin_forgotpassword'));
                }
            } catch (Exception $e) {
                $this->Session->setFlash($e->getMessage(), 'default', array('class' => 'alert alert-danger fade in'));
                return $this->redirect(array('controller' => 'Users', 'action' => 'admin_forgotpassword'));
            }
        }
    }

    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
  public  function admin_reset_password_token($reset_password_token = null) {
        $this->layout = "login";
        if (empty($this->request->data)) {
            $this->request->data = $this->User->findByResetPasswordToken($reset_password_token);
            if (!empty($this->request->data['User']['reset_password_token']) && !empty($this->request->data['User']['token_created_at']) &&
                    $this->__validToken($this->request->data['User']['token_created_at'])) {
                $this->request->data['User']['id'] = null;
                $this->Session->write('token', $reset_password_token);
            } else {
                $this->Session->setflash(__('The password reset request has either expired or is invalid.'), 'default', array('class' => 'alert alert-danger fade in'));
                return $this->redirect(array('controller' => 'Users', 'action' => 'admin_login'));
            }
        } else {
            $token = $this->Session->read('token');
            if ($this->request->data['User']['reset_password_token'] != $token) {
                $this->Session->setflash('The password reset request has either expired or is invalid.');
                return $this->redirect(array('controller' => 'Users', 'action' => 'admin_login'));
            }
            $user = $this->User->findByResetPasswordToken($this->request->data['User']['reset_password_token']);
            $this->User->id = $user['User']['id'];
            $this->request->data['User']['password'] = $this->request->data['User']['new_passwd'];

            if ($this->User->save($this->request->data, array('validate' => 'only'))) {
                unset($this->request->data['User']['new_passwd']);
                unset($this->request->data['User']['confirm_passwd']);
                $this->request->data['User']['reset_password_token'] = $this->request->data['User']['token_created_at'] = null;
                if ($this->User->save($this->request->data) && $this->__sendPasswordChangedEmail($user['User']['id'])) {
                    $this->Session->delete('token');
                    $this->Session->setFlash('Your password was changed successfully. Please login to continue.', 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect('/users/admin_login');
                }
            }
        }
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        $user['User']['reset_password_token'] = $hash;
        $user['User']['token_created_at'] = date('Y-m-d H:i:s');
        return $user;
    }

    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
            $Email = new CakeEmail();
            $Email->config(EMAIL_CONFIG);
            $Email->from(array('admin@eyewinawards.com' => COMPANY_NAME));
            $Email->to($User['User']['email']);
            $Email->subject('Password Reset Request - DO NOT REPLY');
            $Email->replyTo('admin@eyewinawards.com');
            $Email->template('reset_password');
            $Email->viewVars(array('name' => $User['User']['full_name'], 'pwdLink' => $User['User']['reset_password_token']));
            $Email->emailFormat('html');
            $Email->send();
            return true;
        }
        return false;
    }

    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    private function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
            $User = $this->User->read();
            $Email = new CakeEmail();
            $Email->config(EMAIL_CONFIG);
            $Email->from(array('admin@friendsreunioncommittee.com' => COMPANY_NAME));
            $Email->to($User['User']['email']);
            $Email->subject('Password Changed - DO NOT REPLY');
            $Email->template('password_reset_confirmation');
            $Email->viewVars(array('first_name' => $User['User']['full_name']));
            $Email->emailFormat('html');
            $Email->send();
            return true;
        }
        return false;
    }

    private function saveLoginLog($id) {
        if (is_numeric($id) && !empty($id)) {
            $logData = array();
            $logData['ip'] = $this->getRealIpAddr();
            $user_agent = env('HTTP_USER_AGENT');
            $ip = env('REMOTE_ADDR');
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"),true);
            $logData['os'] = $this->Common->getOs($user_agent);
            $logData['browser'] = $this->Common->getBrowser($user_agent);
            $logData['userid'] = $id;
            $a = array_merge($logData,$details);
            ClassRegistry::init('LoginLog')->saveLoginLog($a);
        }
    }

    private function getRealIpAddr() {
        if (!empty(env('HTTP_CLIENT_IP'))) {   //check ip from share internet
            $ip = env('HTTP_CLIENT_IP');
        } elseif (!empty(env('HTTP_X_FORWARDED_FOR'))) {   //to check ip is pass from proxy
            $ip = env('HTTP_X_FORWARDED_FOR');
        } else {
            $ip = env('REMOTE_ADDR');
        }
        return $ip;
    }
    
    private function __sendNewUserEmail($userData) {
        $Email = new CakeEmail();
        $Email->config(EMAIL_CONFIG);
        $Email->from(array('admin@eyewinawards.com' => COMPANY_NAME));
        $Email->to($userData['User']['email']);
        $Email->subject('Admin Registration - DO NOT REPLY');
        $Email->template('new_admin_registration');
        $Email->viewVars(array('userData' => $userData));
        $Email->emailFormat('html');
        $Email->send();
    }
    public function admin_activate($id) {
        if(!in_array(AuthComponent::user('role'), array('super_admin','admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Users', 'action' => 'admin_dashboard'));
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid  User'));
        }
        if ($this->User->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' User has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' User could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }
    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('super_admin','admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Users', 'action' => 'admin_dashboard'));
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid  User'));
        }
        if ($this->User->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' User has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' User could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }
}