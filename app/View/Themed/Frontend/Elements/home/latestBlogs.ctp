<?php
  App::import('Model', 'Post');
  $this->Post = new Post();
  $all_timely_active_posts = $this->Post->findTimelyActivedPosts();
  if(count($all_timely_active_posts) > 0) :
?>
<section class="blog-section py-100" style="background-image: url(./app/webroot/img/frontend_images/blog-section-img.jpg); background-position: center;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-heading text-center">
          <h2>blog section</h2>
          <div class="sub-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  <span>has been the industry's standard dummy text ever since the 1500s, when</span></div>
          <!-- /.sub-content -->
        </div>
        <!-- /.main-heading -->
      </div>
    </div>
    <div class="row">
      <?php
        foreach($all_timely_active_posts as $post) :
          //print_r($post); die;
      ?>
      <div class="col-12 col-sm-12 col-md-4">
        <div class="blog-box">
          <div class="img-wrapper">
            <?php echo $this->Html->image('posts/' . $post['Post']['featured_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
          </div>
          <!-- /.img-wrapper -->
          <div class="blog-content text-left">
            <div class="author-img">
              <?php echo $this->Html->image('posts/' . $post['Post']['author_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
            </div>
            <div class="admin-detail">
              <time><i class="far fa-calendar-alt"></i><?php echo date_format(date_create($post['Post']['published_date']), "d M Y"); ?></time>
              <!-- <div class="post"><i class="fas fa-user-alt"></i>Admin</div> -->
            </div>
            <h4><?php echo $post['Post']['title']; ?></h4>
            <p><?php echo $post['Post']['excerpt']; ?></p>
            <a href="post/<?php echo $post['Post']['slug']; ?>">Read me <?php echo $this->Html->image('frontend_images/arrow-sign-used-black.png', array('alt' => 'arrow-sign-used-black')); ?></a>
          </div>
          <!-- /.blog-content -->
        </div>
      </div>
      <?php endforeach; ?>
      <!-- /.col-md-4 -->
      <div class="col-md-12 text-center">
        <a class="btn action-btn rsp_bt_md" href="/blog">Browse all blogs
          <?php echo $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')); ?>
        </a>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /.blog-section -->
<?php endif; ?>