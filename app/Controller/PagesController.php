<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Page', 'Subscriber');

	public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('home');
        echo $this->request->prefix;
    }

	public function home() {
		$totalSubscribersCount = $this->Subscriber->findTotalSubscribersCount();
		$this->set('totalSubscribersCount', $totalSubscribersCount);
		$this->set('title', COMPANY_NAME . ' - Home Page');
	}

	public function aboutus() {
		//echo 'About'; die;
		$this->set('title', COMPANY_NAME . ' - About Us Page');
	}
}