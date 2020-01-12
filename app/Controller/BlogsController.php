<?php
App::uses('AppController', 'Controller');

class BlogsController extends AppController
{

    public $uses = array('Post', 'Category', 'Like', 'Comment', 'leaveComment');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'loadMorePosts', 'postdetail');
        echo $this->request->prefix;
    }

    public function loadMorePosts()
    {
        $this->layout = 'ajax';
        $cat_id = $this->params['pass'][0];
        $start = $this->params['pass'][1];
        $posts = $this->Post->findLoadMoreActivePosts($cat_id, $start);
        $this->set(compact('posts'));
    }

    public function index()
    {

        $cat_id_slug = 'all';
        $cat_name = 'blogs';
        if (isset($this->params['pass'][0]) && !empty($this->params['pass'][0])) {
            $cat_id = $this->Category->getCategoryIdBySlug($this->params['pass'][0]);

            if (isset($cat_id['Category']['id']) && !empty($cat_id['Category']['id'])) {
                $cat_id_slug = $cat_id['Category']['id'];
                $cat_name = $cat_id['Category']['title'];
            }
        }

        $categories = $this->Category->findAllActiveCategoriesList();
        $posts = $this->Post->findLatestActivePosts($cat_id_slug);
        //echo '<pre>'; print_r($categories); die;

        $this->set(compact('categories', 'posts', 'cat_name'));
        $this->set('title', COMPANY_NAME . ' - Blog');
        $this->set('cat_id', $cat_id_slug);
    }

    public function postdetail()
    {
        $checkUserLikeStatus = 0;
        $slug = $this->params['pass'][0];
        $this->set('title', COMPANY_NAME . ' - Post Detail');
        if(!empty($slug)){
            $postDetail = $this->Post->getPostDetailBySlug($slug);
            $postId = $postDetail['Post']['id'];
            $postTotalLikes = $this->Like->findPostTotalLikes($postId);
            $postTotalComments = $this->Comment->findPostTotalComments($postId);
            $postComments=$this->Comment->getAllCommentOfPost($postId);
            $userAuth = $this->Auth->user();
            if(!empty($userAuth)){
                $authUser = $this->Auth->user();
                $checkUserLikeStatus = $this->Like->checkLoggedInUserAlreadyLike($postId, $authUser['id']);
            }



            $this->set(compact('postDetail', 'postTotalLikes', 'checkUserLikeStatus', 'postTotalComments','postComments'));
        }
    }

    public function increaseLikeCount(){
        $this->layout = 'ajax';
        $loggedInUserId = $this->params['pass'][0];
        $postId = $this->params['pass'][1];
        $postUserId = $this->params['pass'][2];

        $this->Like->create();
        $dataSet['Like']['user_id'] = $loggedInUserId;
        $dataSet['Like']['post_id'] = $postId;
        $dataSet['Like']['post_user_id'] = $postUserId;

        if ($this->Like->save($dataSet)) {
            $postTotalLikes = $this->Like->findPostTotalLikes($postId);
            $this->set(compact('postTotalLikes'));
        } else {
            return false;
        }
    }

    public function leaveComment(){
        $this->layout = 'ajax';

        if ($this->request->is('post')) {
            $output = array();
            $data = $this->request->data;
            $userAuth = $this->Auth->user();
            $dataSet['user_id']=$userAuth['id'];
            $dataSet['post_id']=$data['post_id'];
            $dataSet['post_user_id']=$data['post_user_id'];
            $dataSet['comment']=$data['comment'];

            $this->Comment->create();

            if ($this->Comment->save($dataSet)) {
                $lastComment=$this->Comment->getLoggedinUserRecentComment($userAuth['id']);
                $this->set(compact('lastComment'));
            } else {
                return false;
            }
        }
    }


}
