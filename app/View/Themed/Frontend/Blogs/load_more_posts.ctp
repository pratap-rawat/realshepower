<?php
  App::import('Model', 'User');
  $this->User = new User(); 
?>
<input type='hidden' id='totalAjaxPosts' value="<php echo count($posts); ?>" />
<?php if(isset($posts) && !empty($posts)): ?>
    <?php foreach($posts as $singlePost) : ?>
<div class="col-md-4 all post_cat video">
    <div class="blog-box">
        <div class="img-wrapper">
            <?php echo $this->Html->image('posts/' . $singlePost['Post']['featured_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
        </div>
        <!-- /.img-wrapper -->
        <div class="blog-content text-left">
            <div class="author-img">
                <?php echo $this->Html->image('posts/' . $singlePost['Post']['author_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
            </div>
            <div class="admin-detail">
                <time><i class="far fa-calendar-alt"></i><?php echo date_format(date_create($singlePost['Post']['created']), 'd M Y'); ?></time>
                <div class="post"><i class="fas fa-user-alt"></i><?php $user= $this->User->getFullNameById($singlePost['Post']['user_id']); echo ucwords($user['User']['first_name'].' '.$user['User']['last_name']); ?></div>
            </div>
            <h4><?php echo $singlePost['Post']['title']; ?></h4>
            <p><?php echo $singlePost['Post']['excerpt']; ?></p>
            <a href="post/<?php echo $singlePost['Post']['slug']; ?>">Read me <?php echo $this->Html->image('frontend_images/arrow-sign-used-black.png', array('alt' => 'arrow-sign-used-black')); ?></a>
        </div>
<!-- /.blog-content -->
    </div>
</div>
<!-- /.col-md-4 -->
<?php endforeach; ?>
<?php endif; ?>