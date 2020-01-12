<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    public $components = array('Session','Cookie');

    public $uses = array('Category');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow();
    }

    public function admin_add() {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'categories', 'action' => 'admin_viewList'));
        }

        $this->set('title', COMPANY_NAME . ' - Create Category');
        //$this->layout = 'login';

        if ($this->request->is('post')) {
            $this->Category->create();
            $dataSet = $this->request->data;
            
            // echo '<pre>'; print_r($dataSet); die;
            if ($this->Category->save($dataSet)) {
                $this->Session->setFlash(__('Category Successfully created', null), 'default', array('class' => 'alert alert-success fade in'));
                try {
                   // $this->__sendNewUserEmail($dataSet);
                }  catch (Exception $ex) {
                    $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                }
                return $this->redirect(array('controller'=>'categories', 'action' => 'admin_viewList'));
            } else {
            	$this->Session->setFlash(__('The Category could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
            }
        }
    }

    public function admin_viewList() {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
        }
        
        $this->set('title', COMPANY_NAME . ' - Categories List');

        $users = $this->Category->findAllCategories();
        //echo '<pre>'; print_r($users); die;
        $count = count($users);
        $this->set('data', $users);
        $this->set('count', $count);
    }

    public function admin_activate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
        }
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid Category'));
        }
        if ($this->Category->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' Category has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' Category could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }
    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
        }
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid Category'));
        }
        if ($this->Category->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' Category has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' Category could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }

    public function admin_edit() {
        $id = $this->request->params['pass'][0];
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            if($id != $this->Auth->user('id')){
                $this->Session->setFlash(__("Sorry, You Don't Have Permission To Edit Details!", null), 'default', array('class' => 'alert alert-danger fade in'));
                return $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
            }
        }

        $this->Category->id = $id;
        if ($this->Category->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;
                if ($this->Category->save($dataSet)) {
                    $this->Session->setFlash(__('Category has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
                } else {
                    $this->Session->setFlash(__('Unable to edit Category. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
                }
            } else {
                $this->request->data = $this->Category->read();
            }
        } else {
            $this->Session->setFlash(__('The Category you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('controller'=>'Categories', 'action' => 'admin_viewList'));
        }

        $this->set('title', 'Edit Category');
    }
}