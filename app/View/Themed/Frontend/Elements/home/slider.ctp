<section class="hero-section">
  <div class="overlay"></div>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php echo $this->Html->image('frontend_images/banner-img-1.jpg', array('class' => 'd-block w-100', 'alt' => 'First slide')); ?>
      </div>
      <div class="carousel-item">
        <?php echo $this->Html->image('frontend_images/banner-img-1.jpg', array('class' => 'd-block w-100', 'alt' => 'Second slide')); ?>
      </div>
      <div class="carousel-item">
        <?php echo $this->Html->image('frontend_images/banner-img-1.jpg', array('class' => 'd-block w-100', 'alt' => 'Thrid slide')); ?>
      </div>
    </div>
    <div class="banner-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="content-wrapper">
              <h2>Contrary to popular belief, <span>Ipsum is not simply </span></h2>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random textContrary to popular belief, Lorem Ipsum is not simply random textContrary to popular belief, Lorem Ipsum is not simply random text</p>
              <button class="btn action-btn" type="submit">contact us
              <?php echo $this->Html->image('frontend_images/arrow-sign-used-black.png', array('alt' => 'arrow-sign-used-black')); ?>
            </button>
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.banner-content -->
  </div>
</section>