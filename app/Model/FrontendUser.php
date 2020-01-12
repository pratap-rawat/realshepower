<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class FrontendUser extends AppModel {
    // public $recursive = 0;

    /*public $validate = array(
        'username' => array(
            'required' => array(
                'on' => 'create',
                'rule' => 'notBlank',
                'message' => 'A username is required'
            ),
            'isUnique' => array(
                'on' => 'create',
                'rule' => array('checkUniqueUser'),
                'message' => 'This username already exists.'
            )
        ),
        'first_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Username is required'
            )
        ),
        'confirm_password' => array(
            'length' => array(
                'rule' => array('between', 4, 40),
                'message' => 'Your password must be between 4 and 40 characters.',
            )
        )
    );

    function checkUniqueUser() {
        return ($this->User->find('count', array('conditions' => array('User.username' => $this->data['FrontendUsers']['username']))) == 0);
    }

    public function myencryption($encPass) {
            $passwordHasher = new BlowfishPasswordHasher();
            return $passwordHasher->hash($encPass);
    }*/
}