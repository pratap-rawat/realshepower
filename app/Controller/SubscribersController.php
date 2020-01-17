<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('AppController', 'Controller');

class SubscribersController extends AppController {

	public $components = array('Session','Cookie');

	public $uses = array('Subscriber', 'CakeEmail');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('addSubscriber');
    }

	public function addSubscriber() {
        if ($this->request->is('post')) {
            $this->Subscriber->create();
            $dataSet = $this->request->data;

            //echo '<pre>'; print_r($dataSet); die;
            $email = $dataSet['Subscriber']['email'];
            if ($this->Subscriber->save($dataSet)) {
				$Email 		= 	new CakeEmail('gmail');
				$to			=	"pratapsinghg2@gmail.com";
				$subject	=	"New user subscription";
				$mail		=	"<p>Hi Admin</p>";
				$mail		.=	"<p>Greetings</p>";
				$mail		.=	"<p></p>";
				$mail		.=	"<p>New user (".$email.") has been subscribed in RealShePower.com</p>";
				$mail		.=	"<p>regards</p>";
				$mail		.=	"<p>RealShePower</p>";

				$Email->from(array('admin@realshepower.com' => 'RealShePower'))
					  ->to($to)
					  ->emailFormat('both')
					  ->subject($subject)
					  ->send($mail);
                return $this->redirect(array('controller' => 'pages' , 'action' => 'home', 1));
            } else {
                return $this->redirect(array('controller' => 'pages' , 'action' => 'home', 0));
            }
        }
    }

    public function admin_viewList() {
        $subscribers = $this->Subscriber->findAllSubscribers();
        //echo '<pre>'; print_r($subscribers); die;
        $count = count($subscribers);
        $this->set('data', $subscribers);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - '.'Subscribers List');
    }

    /*public function admin_activate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList'));
        }
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid Post'));
        }
        if ($this->Subscriber->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' Post has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' Post could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }
    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList'));
        }
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid Post'));
        }
        if ($this->Subscriber->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' Post has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' Post could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }*/
}