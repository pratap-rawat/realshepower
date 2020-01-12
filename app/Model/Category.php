<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {
    // public $recursive = 0;

    public $validate = array(
        'title' => array(
            'required' => array(
                'on' => 'create',
                'rule' => 'notBlank',
                'message' => 'A Title is required'
            ),
            'isUnique' => array(
                'on' => 'create',
                'rule' => array('checkUniqueCategory'),
                'message' => 'This Category already exists.'
            )
        ),
        'slug' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A Slug is required'
            )
        )
    );

    function checkUniqueCategory() {
        return ($this->find('count', array('conditions' => array('Category.title' => $this->data['Category']['title']))) == 0);
    }

    public function findAllCategories() {
        $data = $this->find('all', array(
            //'conditions' => array('Category.is_active' => 1),
            'fields' => array('id', 'title', 'slug', 'is_active', 'created')
        ));
        return $data;
    }

    public function findAllCategoriesList() {
        $data = $this->find('list');
        return $data;
    }

    public function findAllActiveCategoriesList() {
        $data = $this->find('all',array('fields' => array('id', 'title', 'slug'), 'conditions'=>array('is_active'=>1)));
        return $data;
    }

    public function getCategoryTitleById($id)
    {
        if(!empty($id)) {
            return $this->find('first', array(
                'fields' => array('Category.title'), 
                'conditions' => array('Category.id' => $id), 
                'recursive' => -1)
            );
        }
        return array();
    }

    public function getCategoryById($id)
    {
        if(!empty($id)) {
            return $this->find('first', array(
                'fields' => array('Category.title', 'Category.slug'),
                'conditions' => array('Category.id' => $id), 
                'recursive' => -1)
            );
        }
        return array();
    }

    public function getCategoryIdBySlug($slug)
    {
        if(!empty($slug)) {
            return $this->find('first', array(
                'fields' => array('Category.id', 'Category.title'),
                'conditions' => array('Category.slug' => $slug), 
                'recursive' => -1)
            );
        }
        return array();
    }
}