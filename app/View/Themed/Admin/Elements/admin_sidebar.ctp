<?php
 $loguser = $this->Session->read('Auth.Admin');
?>
<aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <?php

        ?>
        <div class="pull-left image">
          <?php
              $path = 'users/profile_images';
              $gender = $loguser['gender'];
              $imgName = $loguser['profile_image'];
              $src = $path . '/' . $imgName;
              //echo WWW_ROOT .'img/'. $src; die;
              if(!file_exists(WWW_ROOT .'img/'. $src)){
                $imgName = 'default_'.$gender.'_profile_image.jpeg';
                $src = $path . '/' . $imgName;
              }
              echo $this->Html->image($src, array('alt' => 'Sidebar - Profile Image', 'class' => 'img-circle'));
            ?>
        </div>
        <?php

        ?>
        <div class="pull-left info">
          <p><?php echo ucwords($loguser['first_name'] . ' ' . $loguser['last_name']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">USER CONTROLS</li>
        <!-- <li>
        <?php
            //echo $this->Html->link('<i class="fa fa-circle-o text-red"></i><span>Dashboard</span>', array('controller' => 'users', 'action' => 'dashboard'), array('escape' => false));
        ?>
        </li> -->
        <li>
        <?php
            echo $this->Html->link('<i class="fa fa-circle-o text-aqua"></i><span>User Profile</span>', array('controller'=>'users', 'action' => 'viewDetails', $loguser['id']), array('escape' => false));
        ?>
        </li>
        
        <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Register User</span>', array('controller' => 'users', 'action' => 'add'), array('escape' => false));
          ?>
          </li>
          <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-green"></i><span>Users List</span>', array('controller' => 'users', 'action' => 'viewList'), array('escape' => false));
          ?>
        </li>

        <li class="header">CATEGORIES CONTROLS</li>
        <li>
        <?php
          echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Create Category</span>', array('controller' => 'categories', 'action' => 'add'), array('escape' => false));
        ?>
        </li>
        <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-green"></i><span>Categories List</span>', array('controller' => 'categories', 'action' => 'viewList'), array('escape' => false));
          ?>
        </li>

        <li class="header">POSTS CONTROLS</li>
        <li>
        <?php
          echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Create Blog</span>', array('controller' => 'posts', 'action' => 'add'), array('escape' => false));
        ?>
        </li>
        <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-green"></i><span>Blogs List</span>', array('controller' => 'posts', 'action' => 'viewList'), array('escape' => false));
          ?>
        </li>

        <li class="header">PLANS CONTROLS</li>
        <li>
        <?php
          echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Create Plan</span>', array('controller' => 'plans', 'action' => 'add'), array('escape' => false));
        ?>
        </li>
        <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-green"></i><span>Plans List</span>', array('controller' => 'plans', 'action' => 'viewList'), array('escape' => false));
          ?>
        </li>
        <li class="header">FAQS CONTROLS</li>
        <li>
        <?php
          echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Create Faq</span>', array('controller' => 'faqs', 'action' => 'add'), array('escape' => false));
        ?>
        </li>
        <li>
          <?php
              echo $this->Html->link('<i class="fa fa-circle-o text-green"></i><span>Faqs List</span>', array('controller' => 'faqs', 'action' => 'viewList'), array('escape' => false));
          ?>
        </li>
        <li class="header">SUBSCRIBERS</li>
        <li>
        <?php
          echo $this->Html->link('<i class="fa fa-circle-o text-yellow"></i><span>Subscribers List</span>', array('controller' => 'subscribers', 'action' => 'viewList'), array('escape' => false));
        ?>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>