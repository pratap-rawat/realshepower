<?php

App::uses('AppModel', 'Model');

class Comment extends AppModel {
    // public $recursive = 0;

    public function findPostTotalComments($postId) {
        $data = $this->find('all', array(
            'conditions' => array("post_id = $postId"),
            'fields' => array('id')
        ));
        return sizeof($data);
    }

    public function getLoggedinUserRecentComment($userId) {
        $data = $this->find('first', array(
            'conditions' => array('Comment.user_id' => $userId),
            'order' => array('id' => 'DESC'),
            'fields' => array('id','comment','user_id','created')
        ));
        return $data;
    }

    public function getAllCommentOfPost($postId){
        $data = $this->find('all', array(
            'conditions' => array('Comment.post_id' => $postId),
            'fields' => array('id','comment','user_id','created')
        ));
        return $data;
    }
}