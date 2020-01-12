<?php

App::uses('AppModel', 'Model');

class Like extends AppModel {
    // public $recursive = 0;

    public function findPostTotalLikes($postId) {
        $data = $this->find('all', array(
            'conditions' => array("post_id = $postId"),
            'fields' => array('id')
        ));
        return sizeof($data);
    }

    public function checkLoggedInUserAlreadyLike($postId, $userId) {
        $data = $this->find('first', array(
            'conditions' => array('Like.post_id' => $postId, 'Like.user_id' => $userId),
            'fields' => array('id')
        ));
        return sizeof($data);
    }
}