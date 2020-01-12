<?php

App::uses('AppController', 'Controller');

class PlansController extends AppController {

	public $components = array('Session','Cookie');

	public $uses = array('Plan');

	public function admin_add() {

        $this->set('title', COMPANY_NAME . ' - Create Plan');

        if ($this->request->is('post')) {
            $this->Plan->create();
            $dataSet = $this->request->data;
            //echo '<pre>'; print_r($dataSet); die;
            if ($this->Plan->save($dataSet)) {
                $this->Session->setFlash(__('PLAN created successfully', null), 'default', array('class' => 'alert alert-success fade in'));
                try {
                   // $this->__sendNewUserEmail($dataSet);
                }  catch (Exception $ex) {
                    $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                }
                return $this->redirect(array('controller' => 'plans', 'action' => 'admin_viewList'));
            } else {
                $this->Session->setFlash(__('The PLAN could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
            }
        }
    }

    public function admin_viewList() {
       	$plans = $this->Plan->findAllPlans();
        //echo '<pre>'; print_r($plans); die;
        $count = count($plans);
        $this->set('data', $plans);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - '.'Plans Listing');
    }

    public function admin_viewDetails() {
    	$id = $this->request->params['pass'][0];
		$plans = $this->Plan->findPlanById($id);
        //echo '<pre>'; print_r($plans); die;
        $count = count($plans);
        $this->set('data', $plans);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - '.' Plan Details');
    }

    public function admin_edit() {

        $id = $this->request->params['pass'][0];
        $this->Plan->id = $id;
        if ($this->Plan->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;
                if ($this->Plan->save($dataSet)) {
                    $this->Session->setFlash(__('Plan has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('controller' => 'plans', 'action' => 'admin_viewList'));
                } else {
                    $this->Session->setFlash(__('Unable to edit Leave Request. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller' => 'plans', 'action' => 'admin_viewList'));
                }
            } else {
                $this->request->data = $this->Plan->read();
            }
        } else {
            $this->Session->setFlash(__('The PLAN you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('controller' => 'plans', 'action' => 'admin_viewList'));
        }

        $this->set('title', COMPANY_NAME . ' - Edit Plan');
        $this->set('loggedRole', $this->Auth->user('role'));
    }

    public function admin_activate($id) {
        
        $this->Plan->id = $id;
        if (!$this->Plan->exists()) {
            throw new NotFoundException(__('Invalid Plan'));
        }
        if ($this->Plan->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' Plan has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' Plan could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }

    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'plans', 'action' => 'admin_viewList'));
        }
        $this->Plan->id = $id;
        if (!$this->Plan->exists()) {
            throw new NotFoundException(__('Invalid Plan'));
        }
        if ($this->Plan->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' Plan has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' Plan could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }
}