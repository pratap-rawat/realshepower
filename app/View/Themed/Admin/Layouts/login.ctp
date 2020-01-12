<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <?php
     // Bootstrap 3.3.7
    //echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min.css');
    // Font Awesome
    echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css');
    // Ionicons
    echo $this->Html->css('bower_components/Ionicons/css/ionicons.min.css');
    // Theme style
    echo $this->Html->css('dist/css/AdminLTE.min.css');
    // iCheck
    echo $this->Html->css('plugins/iCheck/square/blue.css');
  ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition login-page">
  
  <?php echo $this->fetch('content'); ?>

<?php
  // jQuery 3
  echo $this->Html->script('bower_components/jquery/dist/jquery.min.js');
  // Bootstrap 3.3.7
  echo $this->Html->script('bower_components/bootstrap/dist/js/bootstrap.min.js');
  // iCheck
  echo $this->Html->script('plugins/iCheck/icheck.min.js');
?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
