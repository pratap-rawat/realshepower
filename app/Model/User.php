<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    // public $recursive = 0;

    public $validate = array(
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
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
        'confirm_password' => array(
            'length' => array(
                'rule' => array('between', 4, 40),
                'message' => 'Your password must be between 4 and 40 characters.',
            ),
            'compare' => array(
                'rule' => array('validate_passwords'),
                'message' => 'The passwords you entered do not match.',
            )
        )
    );

    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }

    function checkUniqueUser() {
        return ($this->find('count', array('conditions' => array('User.username' => $this->data['User']['username']))) == 0);
    }

    public function findAllUsers() {
        $data = $this->find('all', array(
            //'conditions' => array('User.role NOT IN ("super_admin")'),
            'fields' => array('id', 'first_name', 'last_name', 'email', 'created', 'is_active')
        ));
        return $data;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['confirmPassword']) || isset($this->data[$this->alias]['new_password']) || isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();

            if(isset($this->data[$this->alias]['confirmPassword'])){
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                        $this->data[$this->alias]['confirmPassword']
                );
            } elseif(isset($this->data[$this->alias]['new_password'])){
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                        $this->data[$this->alias]['new_password']
                );
            } elseif(isset($this->data[$this->alias]['password'])){
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                        $this->data[$this->alias]['password']
                );
            }
        }
        return true;
    }

    /*function checkUserName($username) {
        $data = $this->find('first', array(
            'fields' => array('id', 'email', 'is_active'),
            'conditions' => array('User.is_active' => 1, 'User.username' => trim($username['User']['username']))
        ));
        if (!empty($data)) {
            return array('data' => $data, 'status' => TRUE);
        } else {
            return array('data' => null, 'status' => FALSE);
        }
    }*/
    /*function checkUser($conditions) {
        $data = $this->find('first', array(
            'fields' => array('id', 'reset_password_token', 'token_created_at', 'email','username'),
            'conditions' => $conditions));
        if (!empty($data)) {
            return array('data' => $data, 'status' => TRUE);
        } else {
            return array('data' => null, 'status' => FALSE);
        }
    }*/
    /*public function checkAlreadyRegistedUser($memberData,$role) {
        return ($this->find('count', array('conditions' => array('User.email' => $memberData['email'],'User.role'=>$role))) == 0);
    }*/
    /*public function checkCurrentPassword($data) {
        $this->id = AuthComponent::user('id');
        $password = $this->field('password');
        return BlowfishPasswordHasher::check($data['old_password'], $password);
    }*/
    /*public function getUserDetailsByEmailId($emailId)
    {
        if(!empty($emailId)) {
            return $this->find('first', array(
                'fields' => array('User.id', 'User.is_active'), 
                'conditions' => array('LOWER(User.email)' => $emailId), 
                'recursive' => -1)
            );
        }
        return array();
    }*/

    public function getFullNameById($id)
    {
        if(!empty($id)) {
            return $this->find('first', array(
                'fields' => array('User.first_name','User.last_name'), 
                'conditions' => array('User.id' => $id), 
                'recursive' => -1)
            );
        }
        return array();
    }

    public function getUserById($id)
    {
        if(!empty($id)) {
            return $this->find('first', array(
                'fields' => array('User.id', 'User.first_name', 'User.last_name', 'User.gender', 'User.username', 'User.profile_image', 'User.email', 'User.role', 'User.mobile', 'User.created'),
                'conditions' => array('User.id' => $id), 
                'recursive' => -1)
            );
        }
        return array();
    }
}