<?php
App::uses('AppModel', 'Model');

class Faq extends AppModel {
    // public $recursive = 0;

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Title is required'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A DESCRIPTION is required'
            )
        )
    );

    public function findAllFaqs() {
        $data = $this->find('all', array(
        	//'conditions' => array("Faq.is_active = '0'"),
            'fields' => array('id', 'title', 'description', 'is_active', 'created')
        ));
        return $data;
    }

    public function findActiveFaqs() {
        $data = $this->find('all', array(
            'conditions' => array("Faq.is_active = '1'"),
            'fields' => array('id', 'title', 'description', 'is_active', 'created')
        ));
        return $data;
    }

    public function findFaqById($faqId) {
        $data = $this->find('first', array(
            'conditions' => array("Faq.id = $faqId"),
            'fields' => array('id', 'title', 'description', 'is_active', 'created')
        ));
        return $data;
    }
}