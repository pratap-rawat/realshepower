<?php
  $loguser = $this->Session->read('Auth.Admin');
  //echo '<pre>'; print_r($loguser); die;
?>
  <nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <?php
        $path = 'users/profile_images';
        $gender = $loguser['gender'];
        $imgName = $loguser['profile_image'];
        $src = $path . '/' . $imgName;

        if(!file_exists(WWW_ROOT .'img/'. $src)){
          $imgName = 'default_'.$gender.'_profile_image.jpeg';
          $src = $path . '/' . $imgName;
        }
      ?>
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
          <?php
            echo $this->Html->image($src, array('alt' => 'Profile Image', 'class' => 'img-circle', 'height' => '30px', 'widht' => '30px'));
          ?>
          <span class="hidden-xs">&nbsp;<?php echo ucwords($loguser['first_name']. ' ' . $loguser['last_name']); ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <?php
              echo $this->Html->image($src, array('alt' => 'Profile Image', 'class' => 'img-circle'));
            ?>

            <p>
              <?php echo ucwords($loguser['first_name'] .' '. $loguser['last_name']); ?> - <?php echo ucwords(str_replace('_', ' ', $loguser['role'])); ?>
              <small>Joining Date: <?php echo date_format(date_create($loguser['created']), 'Y-m-d'); ?> </small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- <li class="user-body">
            <div class="row">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div>
            /.row
          </li> -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' =>'viewDetails', $loguser['id']), array('class'=>'btn btn-info btn-flat')); ?>
            </div>
            <div class="pull-right">
              <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' =>'logout'), array('class'=>'btn btn-danger btn-flat')); ?>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <!-- <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li> -->
    </ul>
  </div>
</nav>