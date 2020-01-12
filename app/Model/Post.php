<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {
    // public $recursive = 0;

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A TITLE is required'
            )
        ),
        'slug' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A SLUG is required'
            ),
            'isUnique' => array(
                'on' => 'create',
                'rule' => array('checkUniquePostSlug'),
                'message' => 'This Post Slug already exists.'
            )
        ),
        'excerpt' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A SHORT DESCRIPTION is required'
            )
        )
    );

    function checkUniquePostSlug() {
        return ($this->find('count', array('conditions' => array('Post.slug' => $this->data['Post']['slug']))) == 0);
    }

    public function findAllPosts() {
        $data = $this->find('all', array(
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'excerpt', 'description', 'published_date','is_active', 'created')
        ));
        return $data;
    }

    public function findActivePosts() {
        $todayDate = date('Y-m-d');
        $data = $this->find('all', array(
            'conditions' => array('Post.is_active' => '1', 'Post.published_date <=' => $todayDate),
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created')
        ));
        return $data;
    }

    public function findTimelyActivedPosts() {

        $todayDate = date('Y-m-d');
        $data = $this->find('all', array(
            'conditions' => array('Post.is_active' => '1', 'Post.published_date <=' => $todayDate),
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created', 'user_id'),
            'limit' => 6,
            'order' => 'Post.published_date DESC',
        ));
        return $data;
    }

    // Latest 10 Artist Blogs
    public function findLatestArtistsActivedPosts() {
        $todayDate = date('Y-m-d');
        $data = $this->find('all', array(
            'conditions' => array('Post.category' => '8', 'Post.is_active' => '1', 'Post.published_date <=' => $todayDate),
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image'),
            'limit' => 10,
            'order' => 'Post.published_date DESC',
        ));
        return $data;
    }

    // Latest 6 Artist Blogs
    public function findLatestActivePosts($cat_slug) {
        
        if($cat_slug === 'all'){
            $data = $this->find('all', array(
                'conditions' => array('Post.is_active' => '1'),
                'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created','user_id'),
                'limit' => 6,
                'order' => 'Post.published_date DESC',
            ));
        }else{
            $data = $this->find('all', array(
                'conditions' => array('Post.category' => $cat_slug, 'Post.is_active' => '1'),
                'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created','user_id'),
                'limit' => 6,
                'order' => 'Post.published_date DESC',
            ));
        }
        
        return $data;
    }

    // Load More 6 Blogs
    public function findLoadMoreActivePosts($cat_id, $start) {
        
        if($cat_id === 'all'){
            $data = $this->find('all', array(
                'conditions' => array('Post.is_active' => '1'),
                'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created','user_id'),
                'limit' => 6,
                'offset'=>$start,
                'order' => 'Post.published_date DESC',
            ));
        }else{
            $data = $this->find('all', array(
                'conditions' => array('Post.category' => $cat_id, 'Post.is_active' => '1'),
                'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created','user_id'),
                'limit' => 6,
                'offset'=>$start,
                'order' => 'Post.published_date DESC',
            ));
        }
        return $data;
    }

    public function findTimelyActivedArtistsPosts() {
        $todayDate = date('Y-m-d');
        $data = $this->find('all', array(
            'conditions' => array('Post.is_active' => '1', 'Post.published_date <=' => $todayDate, 'category' => '8'),
            'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'image_or_video', 'excerpt', 'description', 'published_date', 'created'),
            'limit' => 8,
            'order' => 'Post.published_date DESC',
        ));
        return $data;
    }

    public function getPostById($id)
    {
        if(!empty($id)) {
            return $this->find('first', array(
                'fields' => array('id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'excerpt', 'description', 'published_date', 'created'),
                'conditions' => array('Post.id' => $id), 
                'recursive' => -1)
            );
        }
        return array();
    }

    public function getPostDetailBySlug($slug)
    {
        if(!empty($slug)) {
            return $this->find('first', array(
                'fields' => array('id', 'user_id', 'category', 'landing_url', 'title', 'slug', 'featured_image', 'author_image', 'about_author', 'tags', 'youtube_url', 'excerpt', 'description', 'published_date', 'created'),
                'conditions' => array('Post.slug' => $slug), 
                'recursive' => -1)
            );
        }
        return array();
    }
}