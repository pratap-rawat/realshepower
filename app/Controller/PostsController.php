<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public $components = array('Session','Cookie');

	public $uses = array('Post', 'Category');

	public function admin_add() {

        $this->set('title', COMPANY_NAME . ' - Post Blog');

        $allCategories = $this->Category->findAllCategoriesList();
        $this->set('categories', $allCategories);

        // get column type
        /*$post_type = $this->Post->getColumnType('type');

        // extract values in single quotes separated by comma
        preg_match_all("/'(.*?)'/", $post_type, $enums);

        $this->set('types', array_combine($enums[1], array_map('ucwords',$enums[1])));*/

        if ($this->request->is('post')) {
            $this->Post->create();
            $dataSet = $this->request->data;

            //echo '<pre>'; print_r($dataSet); die;
            
            /*$dataSet['Post']['category'] = $dataSet['Post']['category'];
            unset($dataSet['Post']['category']);*/
            if(!empty($dataSet['Post']['valueForYourForm'])){
                $tags =  json_encode(explode(',', $dataSet['Post']['valueForYourForm']));
                $dataSet['Post']['tags'] = $tags;
            }else{
                unset($dataSet['Post']['tags']);
            }
            unset($dataSet['Post']['valueForYourForm']);

            //echo '<pre>'; print_r($tags); die;

            //Check if profile image has been uploaded
            if(!empty($dataSet['Post']['featured_image']['name']))
            {
                $file = $dataSet['Post']['featured_image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' .rand(11111,99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . 'post_' .$rand_name.'_featured_image.'.$ext);

                        //prepare the filename for database entry
                        //$dataSet['Post']['featured_image'] = $file['name'];
                        $dataSet['Post']['featured_image'] = 'post_'.$rand_name.'_featured_image.'.$ext;
                }else{
                    $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList', $id));
                }
            }else{
                unset($dataSet['Post']['featured_image']);
            }

            //Check if author image has been uploaded
            if(!empty($dataSet['Post']['author_image']['name']))
            {
                $file = $dataSet['Post']['author_image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' .rand(11111,99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . 'post_' .$rand_name.'author_image.'.$ext);

                        //prepare the filename for database entry
                        //$dataSet['Post']['author_image'] = $file['name'];
                        $dataSet['Post']['author_image'] = 'post_'.$rand_name.'author_image.'.$ext;
                }else{
                    $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList', $id));
                }
            }else{
                unset($dataSet['Post']['author_image']);
            }

            if ($this->Post->save($dataSet)) {
                $this->Session->setFlash(__('User Successfully created', null), 'default', array('class' => 'alert alert-success fade in'));
                try {
                   // $this->__sendNewUserEmail($dataSet);
                }  catch (Exception $ex) {
                    $this->Session->setFlash(__($ex->getMessage()), 'default', array('class' => 'alert alert-danger fade in'));
                }
                return $this->redirect(array('action' => 'admin_viewList'));
            } else {
                $this->Session->setFlash(__('The Post could not be Submitted. Please, try again.'), 'default', array('class' => 'alert alert-danger fade in'));
            }
        }
    }

    public function admin_viewList() {
        // $posts = $this->Post->findActivePosts();
        $posts = $this->Post->findAllPosts();
        //echo '<pre>'; print_r($posts); die;
        $count = count($posts);
        $this->set('data', $posts);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - '.'Posts List');
    }

    public function admin_viewDetails() {
    	$id = $this->request->params['pass'][0];
		$posts = $this->Post->getPostById($id);
        if(count(json_decode($posts['Post']['tags'])) > 0){
            $posts['Post']['tags'] = implode(', ', json_decode($posts['Post']['tags']));
        }else{
            $posts['Post']['tags'] = '';
        }
        //echo '<pre>'; print_r($posts); die;
        $count = count($posts);
        $this->set('data', $posts);
        $this->set('count', $count);
        $this->set('title', COMPANY_NAME . ' - '.' Post Details');
    }

    public function admin_edit() {

        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            if($id != $this->Auth->user('id')){
                $this->Session->setFlash(__("Sorry, You Don't Have Permission To Edit Details!", null), 'default', array('class' => 'alert alert-danger fade in'));
                return $this->redirect(array('action' => 'admin_viewList'));
            }
        }

        $id = $this->request->params['pass'][0];
        
        $this->Post->id = $id;
        if ($this->Post->exists()) {
            if ($this->request->is('post') || $this->request->is('put')) {
                $dataSet = $this->request->data;

                if(!empty($dataSet['Post']['valueForYourForm'])){
                    $tags =  json_encode(explode(',', $dataSet['Post']['valueForYourForm']));
                    $dataSet['Post']['tags'] = $tags;
                }else{
                    unset($dataSet['Post']['tags']);
                }
                unset($dataSet['Post']['valueForYourForm']);

                //echo '<pre>'; print_r($dataSet); die;

                //Check if profile image has been uploaded
            if(!empty($dataSet['Post']['featured_image']['name']))
            {
                $file = $dataSet['Post']['featured_image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' .rand(11111,99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . 'post_' .$rand_name.'_featured_image.'.$ext);

                        //prepare the filename for database entry
                        //$dataSet['Post']['featured_image'] = $file['name'];
                        $dataSet['Post']['featured_image'] = 'post_'.$rand_name.'_featured_image.'.$ext;
                }else{
                    $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList', $id));
                }
            }else{
                unset($dataSet['Post']['featured_image']);
            }

            //Check if author image has been uploaded
            if(!empty($dataSet['Post']['author_image']['name']))
            {
                $file = $dataSet['Post']['author_image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    $rand_name = str_shuffle("abcdefghijklmnopqrstuvwxyz") . '-' .rand(11111,99999);
                        //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/posts/' . 'post_' .$rand_name.'author_image.'.$ext);

                        //prepare the filename for database entry
                        //$dataSet['Post']['author_image'] = $file['name'];
                        $dataSet['Post']['author_image'] = 'post_'.$rand_name.'author_image.'.$ext;
                }else{
                    $this->Session->setFlash(__('Please Upload Only JPG|JPEG|PNG Extension Image.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList', $id));
                }
            }else{
                unset($dataSet['Post']['author_image']);
            }

            //echo '<pre>'; print_r($dataSet); die;


                /*if(in_array(AuthComponent::user('role'), array('admin')))
		        {
		            $dataSet['Post']['action_taken_by'] = $this->Auth->user('id');
		        }*/
                if ($this->Post->save($dataSet)) {
                    $this->Session->setFlash(__('Post has been successfully updated', null), 'default', array('class' => 'alert alert-success fade in'));
                    $this->redirect(array('action' => 'admin_viewList'));
                } else {
                    $this->Session->setFlash(__('Unable to Update Post. Please, try again.', null), 'default', array('class' => 'alert alert-danger fade in'));
                    $this->redirect(array('action' => 'admin_viewList'));
                }
            } else {
                $this->request->data = $this->Post->read();
                $this->request->data['Post']['tagsValues'] = json_decode($this->request->data['Post']['tags']);
                $this->request->data['Post']['tags'] = '';
                if(count($this->request->data['Post']['tagsValues']) > 0)
                {
                    $this->request->data['Post']['valueForYourForm'] = implode(',', $this->request->data['Post']['tagsValues']);
                }else{
                    $this->request->data['Post']['valueForYourForm'] = array();
                }
                //echo '<pre>'; print_r($this->request->data); die;
            }
        } else {
            $this->Session->setFlash(__('The Post you are trying to edit does not exist.', null), 'default', array('class' => 'alert alert-danger fade in'));
            $this->redirect(array('action' => 'admin_viewList'));
        }

        /*$dataSet['Post']['category_id'] = $dataSet['Post']['categoryId'];
        unset($dataSet['Post']['categoryId']);*/

        $allCategories = $this->Category->findAllCategoriesList();
        $this->set('categories', $allCategories);

        $this->set('title', COMPANY_NAME . ' - Edit Post');
    }

    public function admin_activate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList'));
        }
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid Post'));
        }
        if ($this->Post->saveField('is_active', 1)) {
            $this->Session->setFlash(__(' Post has been activated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
        $this->Session->setFlash(__(' Post could not be activated'), 'default', array('class' => 'alert alert-danger fade in'));
        $this->redirect($this->referer());
    }
    public function admin_deactivate($id) {
        if(!in_array(AuthComponent::user('role'), array('admin')))
        {
            $this->Session->setFlash(__("Sorry, You Don't Have Permission!", null), 'default', array('class' => 'alert alert-danger fade in'));
            return $this->redirect(array('controller'=>'Posts', 'action' => 'admin_viewList'));
        }
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid Post'));
        }
        if ($this->Post->saveField('is_active', 0)) {
            $this->Session->setFlash(__(' Post has been Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__(' Post could not be Deactivated'), 'default', array('class' => 'alert alert-success fade in'));
            $this->redirect($this->referer());
        }
    }
}