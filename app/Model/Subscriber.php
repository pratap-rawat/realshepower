<?php

App::uses('AppModel', 'Model');

class Subscriber extends AppModel {
    // public $recursive = 0;

    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A TITLE is required'
            )
        )
    );

    public function findAllSubscribers() {
        $data = $this->find('all', array(
            'fields' => array('email', 'created')
        ));
        return $data;
    }

    public function findTotalSubscribersCount() {
        $totalCount = $this->find('count');
        return $totalCount;
    }

    /*public function findActivePosts() {
        $todayDate = date('Y-m-d');
        $data = $this->find('all', array(
            'conditions' => array('Post.is_active' => '1', 'Post.published_date <=' => $todayDate),
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created')
        ));
        return $data;
    }*/
}