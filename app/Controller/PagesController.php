<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Page', 'Subscriber');

	public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('home', 'aboutus', 'publication', 'contact', 'helpusgrow', 'pricingplan');
        //echo $this->request->prefix;
    }

	public function home() {
		$totalSubscribersCount = $this->Subscriber->findTotalSubscribersCount();
		$this->set('totalSubscribersCount', $totalSubscribersCount);
		$this->set('title', COMPANY_NAME . ' - Home Page');
	}

	public function aboutus() {
		$this->set('title', COMPANY_NAME . ' - About Us Page');
	}

	public function publication() {
		$this->set('title', COMPANY_NAME . ' - Publication Page');
	}

	public function contact() {
		$this->set('title', COMPANY_NAME . ' - Contact Page');
	}

	public function helpusgrow() {
		$this->set('title', COMPANY_NAME . ' - Help Us Grow Page');
	}

	public function pricingplan() {
		$this->set('title', COMPANY_NAME . ' - Plans Pricing Page');
	}
}