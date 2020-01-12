<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo trim(str_replace('RealShePower -', '', $title)); ?>
    <small>RealShePower</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    	<!-- <a href=""><i class="fa fa-dashboard"></i>Home</a> -->
    	<?php echo $this->Html->link('<i class="fa fa-dashboard"></i>Home', array('controller' => 'users', 'action' => 'viewList'), array('escape' => false)); ?>
    </li>
    <li class="active"><?php echo trim(str_replace('RealShePower -', '', $title)) ?></li>
  </ol>
</section>