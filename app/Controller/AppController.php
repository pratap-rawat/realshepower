<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array('Flash', 'Auth', 'DebugKit.Toolbar');
	
	public function beforeRender() {
        $this->set('userAuth', $this->Auth->user());
	    $this->response->disableCache();
	}

	public function beforeFilter() {
        if ($this->request->prefix == 'admin') {
            $this->layout = 'backend';
            $this->theme = 'admin';
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->authenticate = array(
                'Form' => array(
                        'passwordHasher' => 'Blowfish',
                        'scope' => array('User.is_active' => '1','User.role'=>'admin'),
                )
            );
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
            $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'admin_viewList');
            $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        } else {
            // echo "Ddd";die;
            $this->layout = 'front';
            $this->theme = 'frontend';
            AuthComponent::$sessionKey = 'Auth.User';
            $this->Auth->authenticate = array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'scope' => array('User.is_active' => '1','User.role'=>'user'),
                )
            );
            $this->Auth->loginAction = array('controller' => 'pages', 'action' => 'home');
            $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'aboutus');
            $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'home');
        }
    }
}