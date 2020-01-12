<footer class="footer" id="subscribe_section">
  <div class="footer-top">
    <?php echo $this->Form->create('Subscriber', array('controller' => 'Subscribers', 'action' => 'addSubscriber')); ?>
    <div class="container">
      <div class="newsletter">
            <div class="text-content">
              <i class="bob-icon-mail"></i>
              <p>Get Updates &amp; More! <span>(Thoughtful Thoughts To Your Inbox)</span></p>
            </div>
           <div class="input-group">
            <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Email Address', 'required' => true)); ?>
             <div class="input-group-append">
              <?php echo $this->Form->button('<i class="fas fa-paper-plane"></i>', array('type' => 'submit', 'class' => 'btn-submit')); ?>
             </div>
           </div>
      </div>
    </div>
    <?php echo $this->Form->end(); ?>
    <!-- /.container -->
  </div>

  <div class="footer-main py-60">
    <div class="container">
      <div class="row footer-main-wrapper">
        <div class="col-md-6 col-lg-3 col-xl-3">
          <div id="help_widget-2" class="widget footer-widget Help_Widget">
            <h3 class="footer-title">Need Help?</h3>    
            <figure class="help-widget">
              <!-- Email -->
              <div class="help-widget-item text-email">
                <span><i class="fas fa-envelope"></i>E-mail</span>
                <a href="mailto:info@example.com">info@example.com</a>        
              </div>
              <!-- Phone -->
              <div class="help-widget-item text-phone">
                <span><i class="fas fa-phone"></i>Call Us</span>
                <a href="tel:1234567890">1234567890</a>       
              </div>
              <div class="help-widget-item social-icons">
                <span><i class="fas fa-share-alt"></i>Follow Us</span>
                <a href="#"><i class="fab fa-facebook-f"></i></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>      
              </div>
            </figure>
          </div>
        </div>
        <!-- /.col-md-6 col-lg-3 col-xl-3 -->
        <div class=" col-md-6 col-lg-3 col-xl-3">
          <div id="recent_posts_widget-2" class="widget footer-widget widget_recent_entries">
            <h3 class="footer-title">Latest Updates</h3>      
            <ul class="widget-post">
              <li>
                <figure class="post-wrapper">
                  <a class="post-thumb" href="" title="Your Guide to Traveling Solo Through incredible Himalayas"><img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg"></a>
             

                  <figcaption class="post-content">
                    <h5 class="post-title"><a href="https://thehtmlcoder.net/themes/journey/a-trek-with-the-nature/" title="Your Guide to Traveling Solo Through incredible Himalayas">Your Guide to Traveling Solo...</a></h5><div class="post-date"><a href="https://thehtmlcoder.net/themes/journey/a-trek-with-the-nature/"><time class="entry-date">Sep 05, 2019</time></a></div>
                  </figcaption>
                </figure>
              </li>
              <li>
                <figure class="post-wrapper">
                  <a class="post-thumb" href="" title="Make Your Honeymoon Special With This Year"><img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_2-54x58.jpg"></a>
             
                  <figcaption class="post-content">
                    <h5 class="post-title"><a href="https://thehtmlcoder.net/themes/journey/a-magnificent-cross-over/" title="Make Your Honeymoon Special With This Year">Make Your Honeymoon Special...</a></h5><div class="post-date"><a href="https://thehtmlcoder.net/themes/journey/a-magnificent-cross-over/"><time class="entry-date">Sep 05, 2019</time></a></div>
                  </figcaption>
                </figure>
              </li>
              <li>
                <figure class="post-wrapper">
                  <a class="post-thumb" href="" title="Countries Which Are Providing  Free Visa Entry"><img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_3-54x58.jpg"></a>
             

                    <figcaption class="post-content">
                      <h5 class="post-title"><a href="https://thehtmlcoder.net/themes/journey/a-little-paradise-in-demo-valley/" title="Countries Which Are Providing  Free Visa Entry">Countries Which Are Providing...</a></h5><div class="post-date"><a href="https://thehtmlcoder.net/themes/journey/a-little-paradise-in-demo-valley/"><time class="entry-date">Sep 05, 2019</time></a></div>
                    </figcaption>
                </figure>
              </li>
            </ul>
          </div>        
        </div>
        <!-- /.col-md-6 col-lg-3 col-xl-3 -->
        <div class=" col-md-6 col-lg-3 col-xl-3">
          <div id="woocommerce_product_categories-2" class="widget footer-widget woocommerce widget_product_categories">
            <h3 class="footer-title">Explore</h3>
            <ul class="product-categories">
              <li class="cat-item cat-item-20"><a href="https://thehtmlcoder.net/themes/journey/product-category/adventure-trips/">Adventure Tours</a></li>
              <li class="cat-item cat-item-21"><a href="https://thehtmlcoder.net/themes/journey/product-category/corporate-holidays/">Corporate Tours</a></li>
              <li class="cat-item cat-item-19"><a href="https://thehtmlcoder.net/themes/journey/product-category/family-holidays/">Family Tours</a></li>
              <li class="cat-item cat-item-18"><a href="https://thehtmlcoder.net/themes/journey/product-category/honeymoon-getaways/">Honeymoon Tours</a></li>
              <li class="cat-item cat-item-17"><a href="https://thehtmlcoder.net/themes/journey/product-category/nation-park-tour/">Nation Park Tour</a></li>
              <li class="cat-item cat-item-16"><a href="https://thehtmlcoder.net/themes/journey/product-category/spiritual-tours/">Religious Tours</a></li>
              <li class="cat-item cat-item-66"><a href="https://thehtmlcoder.net/themes/journey/product-category/trending-tour/">Trending Tours</a></li>
              <li class="cat-item cat-item-15"><a href="https://thehtmlcoder.net/themes/journey/product-category/uncategorized/">Uncategorized</a></li>
            </ul>
          </div>        
        </div>
        <!-- /.col-md-6 col-lg-3 col-xl-3 -->
        <div class=" col-md-6 col-lg-3 col-xl-3">
          <div id="instagram_widget-3" class="widget footer-widget widget_media_gallery">
            <h3 class="footer-title">Instagram</h3>         
            <div id="gallery-1" class="gallery galleryid-52 gallery-columns-3 gallery-size-thumbnail">
              <figure class="gallery-item">
                <div class="gallery-icon landscape">
                  <a href="//instagram.com/p/B5YjJyFA0CI/" target="_blank">
                    <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                  </a>
                </div>
                <figcaption class="gallery-caption">
                  <a href="//instagram.com/p/B5YjJyFA0CI/" target="_blank"><i class="fa fa-instagram"></i></a>
                </figcaption>
              </figure>

                
              <figure class="gallery-item">
                <div class="gallery-icon landscape">
                  <a href="//instagram.com/p/B48U4srgSEN/" target="_blank">
                    <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                  </a>
                </div>
                <figcaption class="gallery-caption">
                  <a href="//instagram.com/p/B48U4srgSEN/" target="_blank"><i class="fa fa-instagram"></i></a>
                </figcaption>
              </figure>

                
              <figure class="gallery-item">
                <div class="gallery-icon landscape">
                  <a href="//instagram.com/p/B4z1ZKRgFiA/" target="_blank">
                    <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                  </a>
                </div>
                <figcaption class="gallery-caption">
                  <a href="//instagram.com/p/B4z1ZKRgFiA/" target="_blank"><i class="fa fa-instagram"></i></a>
                </figcaption>
              </figure>

                
              <figure class="gallery-item">
                <div class="gallery-icon landscape">
                  <a href="//instagram.com/p/B4ivRSGA0RP/" target="_blank">
                    <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                  </a>
                </div>
                <figcaption class="gallery-caption">
                  <a href="//instagram.com/p/B4ivRSGA0RP/" target="_blank"><i class="fa fa-instagram"></i></a>
                </figcaption>
              </figure>
                
                <figure class="gallery-item">
                  <div class="gallery-icon landscape">
                    <a href="//instagram.com/p/B4Z03GmggLi/" target="_blank">
                      <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                    </a>
                  </div>
                  <figcaption class="gallery-caption">
                    <a href="//instagram.com/p/B4Z03GmggLi/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </figcaption>
                </figure>

                
                <figure class="gallery-item">
                  <div class="gallery-icon landscape">
                    <a href="//instagram.com/p/B4Li52QAaCx/" target="_blank">
                      <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                    </a>
                  </div>
                  <figcaption class="gallery-caption">
                    <a href="//instagram.com/p/B4Li52QAaCx/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </figcaption>
                </figure>

                
                <figure class="gallery-item">
                  <div class="gallery-icon landscape">
                    <a href="//instagram.com/p/B4FQgg9gtFM/" target="_blank">
                      <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                    </a>
                  </div>
                  <figcaption class="gallery-caption">
                    <a href="//instagram.com/p/B4FQgg9gtFM/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </figcaption>
                </figure>

                
                <figure class="gallery-item">
                  <div class="gallery-icon landscape">
                    <a href="//instagram.com/p/B35iLn-g77c/" target="_blank">
                      <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                    </a>
                  </div>
                  <figcaption class="gallery-caption">
                    <a href="//instagram.com/p/B35iLn-g77c/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </figcaption>
                </figure>

                
                <figure class="gallery-item">
                  <div class="gallery-icon landscape">
                    <a href="//instagram.com/p/B3x5p9VAyxQ/" target="_blank">
                      <img src="https://thehtmlcoder.net/themes/journey/wp-content/uploads/2019/09/Blog_image_1-54x58.jpg" class="attachment-thumbnail size-thumbnail" alt="">
                    </a>
                  </div>
                  <figcaption class="gallery-caption">
                    <a href="//instagram.com/p/B3x5p9VAyxQ/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </figcaption>
                </figure>

                </div>
              </div>        
            </div>
      </div>
      <!-- /.row footer-main-wrapper -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.footer-main -->
  <div class="copyrights">
    <div class="container">
      <span class="inner-wraper"><p>realshe power. <!-- Developed By  <a href="#">web innovation</a> --></p></span>
    </div>
  </div>
</footer>
<?php if(!$userAuth): ?>
<div class="rsp_login">
  <div class="rsp_login_button">
    <span>login / register</span>
  </div>
  <!-- /.rsp_login_button -->
  <div class="rsp_login_form_container">
    <div class="rsp_login_tab_button">
      <span id="login" data-value="login" class="">login</span>
      <span id="signup" data-value="sign" class="active_form">sign up</span>
    </div>
    <!-- /.rsp_login_tab_button -->
    <div class="rsp_login_form login rsp_form">
      <?php 
        echo $this->Form->create(false, array(
          'url' => array('controller' => 'FrontendUsers', 'action' => 'login'),
          'id' => 'FrontendUsersLogin'
        ));
      ?>
        <span class="rps_form"><p style="color:red" id='loginerror'></p></span>
        <span class="rps_form">
          <input type="text" placeholder="username" name="data[User][username]">
        </span>
        <span class="rps_form">
          <input type="password" placeholder="password" name="data[User][password]">
        </span>
        <span class="rps_form rsp_form_checkwrap">
          <div class="rps_form_check">
            <input type="checkbox">remember me
          </div>
          <a href="#">forget password ?</a>
          <!-- /.rps_form_check -->
        </span>
        <span class="rps_submit d-block text-center">
          <button class="rps_submit_btn action-btn">
            login <?php echo $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')); ?>
          </button>
        </span>
      </form>
    </div>
    <!-- /.rsp_login_form -->
    <div class="rsp_signup_form sign rsp_form form_active">
      <?php echo $this->Form->create('FrontendUsers', array('action' => 'addFrontEndUser')); ?>
      <span class="rps_form"><p style="color:red" id='SignupErrorMessage'></p></span>
        <span class="rps_form">
          <?php echo $this->Form->input('first_name', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter First Name')); ?>
        </span>
        <span class="rps_form">
          <?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => false, 'required' => TRUE, 'placeholder' => 'Enter Email')); ?>
        </span>
        <span class="rps_form">
          <?php echo $this->Form->input('mobile', array('class' => 'form-control', 'label' => false, 'required' => TRUE, 'placeholder' => 'Enter Mobile Number')); ?>
        </span>
        <span class="rps_form">
          <?php echo $this->Form->input('gender', array('class' => 'form-control','required'=>TRUE, 'options' => array('female'=> 'Female', 'male' => 'Male'), 'label' => false)); ?>
        </span>
        <!-- <span class="rps_form">
          <?php //echo $this->Form->input('password', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Password')); ?>
        </span> -->
        <span class="rps_form">
          <?php echo $this->Form->input('confirmPassword', array('class' => 'form-control','required'=>TRUE, 'label' => false, 'placeholder' => 'Enter Password', 'type' => 'password')); ?>
        </span>
        <span class="rps_submit d-block text-center">
          <?php echo $this->Form->button('Sign Up' . $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')), array('type' => 'submit', 'class' => 'rps_submit_btn action-btn')); ?> 
        </span>
      <?php echo $this->Form->end(); ?>
    </div>
    <!-- /.rsp_signup_form -->
  </div>
  <!-- /.rsp_login_form_container -->
</div>
<?php endif; ?>