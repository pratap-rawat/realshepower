<?php
  App::import('Model', 'Post');
  $this->Post = new Post();
  $latestArtistsActivedPosts = $this->Post->findLatestArtistsActivedPosts();
  if(count($latestArtistsActivedPosts) > 0) :
?>
<section class="artist py-100">
  <div class="container">
    <div class="main-heading text-center">
      <h2>Artists <span>Section</span></h2>
      <div class="sub-content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</div>
          <!-- /.sub-content -->
      </div>
  <!-- /.main-heading -->
  </div>
  <!-- /.container -->
  <div class="owl-carousel owl-theme" id="entrepreneur">
    <?php
      foreach($latestArtistsActivedPosts as $articlesPost) :
        //print_r($articlesPost); die;
    ?>
    <div class="item">
        <div class="artist-img">
          <?php echo $this->Html->image('posts/' . $articlesPost['Post']['featured_image'], array('class'=>'img-fluid', 'alt'=>'/')); ?>
          <figcaption class="artist-info">
            <h3><?php echo $articlesPost['Post']['title']; ?></h3>
            <a href="#" class="btn action-btn">More Info <?php echo $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')); ?></a>
          </figcaption>
        </div>
        <!-- /.artist-img -->
      </div>
      <!-- /.item -->
  <?php endforeach; ?>
    <!-- /.item -->
  </div>
  <!-- /.owl-carousel -->
</section>
<!-- /#artist.artist -->

<?php endif; ?>