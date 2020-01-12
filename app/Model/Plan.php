<?php

App::uses('AppModel', 'Model');

class Plan extends AppModel {
    // public $recursive = 0;

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A PLAN FROM is required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A DESCRIPTION TO is required'
            )
        ),
        'price' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A PRICE is required'
            )
        ),
    );

    public function findAllPlans() {
        $data = $this->find('all', array(
        	//'conditions' => array("Plan.is_active = '0'"),
            'fields' => array('id', 'title', 'description', 'sub_title', 'price', 'is_active', 'created')
        ));
        return $data;
    }

    public function findActivePlans() {
        $data = $this->find('all', array(
            'conditions' => array("Plan.is_active = '1'"),
            'fields' => array('id', 'title', 'description', 'sub_title', 'price', 'is_active', 'created')
        ));
        return $data;
    }

    public function findPlanById($planId) {
        $data = $this->find('first', array(
            'conditions' => array("Plan.id = $planId"),
            'fields' => array('id', 'title', 'description', 'sub_title', 'price', 'is_active', 'created')
        ));
        return $data;
    }
}