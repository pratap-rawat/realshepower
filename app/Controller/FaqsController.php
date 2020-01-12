<?php

App::uses('AppController', 'Controller');

class FaqsController extends AppController {

	public $components = array('Session','Cookie');

	public $uses = array('Faq');

	public function admin_add() {

        $this->set('title', COMPANY_NAME . ' - Create FAQ');
        if ($this->request->is('post')) {
            $this->Faq->create();
            $dataSet = $this->request->data;
            //echo '<pre>'; print_r($dataSet); die;
            if ($this->Faq->save($dataSet)) {
                $this->Session->setFlash(__('FAQ created successfully', null), 'default', array('class' => 'alert alert-success fade in'));
                try {
                   // $this->__sendNewUserEmail($dataSet);
                }  catch (Exception $ex) {
                    $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                }
                return $this->redirect(array('controller' => 'faqs', 'action' => 'admin_viewList'));
            } else {
                $this->Session->setFlash(__('The FAQ could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
            }
        }
    }

    public function admin_viewList() {
        $faqs = $this->Faq->findActiveFaqs();
        //echo '<pre>'; print_r($plans); die;
        $count = count($faqs);
        $this->set('data', $faqs);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - ' . 'Faqs Listing');
    }

    public function admin_edit() {

        $id = $this->request->params['pass'][0];
        $this->Faq->id = $id;
        if ($this->Faq->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;
                if ($this->Faq->save($dataSet)) {
                    $this->Session->setFlash(__('Faq has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('controller' => 'faqs', 'action' => 'admin_viewList'));
                } else {
                    $this->Session->setFlash(__('Unable to edit Faq Request. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller' => 'faqs', 'action' => 'admin_viewList'));
                }
            } else {
                $this->request->data = $this->Faq->read();
            }
        } else {
            $this->Session->setFlash(__('The FAQ you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('controller' => 'faqs', 'action' => 'admin_viewList'));
        }

        $this->set('title', COMPANY_NAME . ' - Edit Paq');
        $this->set('loggedRole', $this->Auth->user('role'));
    }

    public function admin_activate($id) {
        
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            throw new NotFoundException(__('Invalid Faq'));
        }
        if ($this->Faq->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' Faq has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' Faq could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }

    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'faqs', 'action' => 'admin_viewList'));
        }
        $this->Faq->id = $id;
        if (!$this->Faq->exists()) {
            throw new NotFoundException(__('Invalid Faq'));
        }
        if ($this->Faq->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' Faq has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' Faq could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }
}