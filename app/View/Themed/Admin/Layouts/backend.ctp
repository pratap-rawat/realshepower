<?php
  $posts_module = false;
  $currentControllerName = $this->params['controller'];
  $currentActionName = $this->params['action'];
  $controllers = array('posts');
  $actions = array('admin_add', 'admin_edit');
  if(in_array($currentControllerName, $controllers) && in_array($currentActionName, $actions))
  {
    $posts_module = true;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .error-message{
      background-color:#dd4b39;
      color: white;
    }
  </style>
  <?php echo $this->Html->charset(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php
  if($posts_module === true){
?>
    <?php //echo $this->Html->css('ckeditor/samples.css'); ?>
<?php
  }
?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <?php echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
  <!-- Font Awesome -->
  <?php //echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min.css'); ?>
  <?php echo $this->Html->css('bower_components/bootstrap-datepicker/dist/css/bootstrap-datetimepicker.min.css'); ?>
  <?php echo $this->Html->css('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>
  <!-- Theme style -->
  <?php echo $this->Html->css('dist/css/AdminLTE.min.css'); ?>
  <?php echo $this->Html->css('dist/css/skins/_all-skins.min.css'); ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RSP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>R</b>eal<b>S</b>he<b>P</b>ower</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php echo $this->element('top_nav_bar'); ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->element('admin_sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
	<?php echo $this->element('admin_breadcrumb'); ?>
    <!-- Main content -->
    <?php echo $this->fetch('content'); ?> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>DataMart - Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Pratap Rawat</a>.</strong> All rights reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('bower_components/jquery/dist/jquery.min.js'); ?><!-- jQuery UI 1.11.4 -->
<?php echo $this->Html->script('bower_components/jquery-ui/jquery-ui.min.js'); ?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>

<?php  echo $this->Html->script('bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>

<?php echo $this->Html->script('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>
<!-- dateTimePicker -->
<?php echo $this->Html->script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datetimepicker.min.js'); ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('dist/js/adminlte.min.js'); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php //echo $this->Html->script('dist/js/pages/dashboard.js'); ?>
<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('dist/js/demo.js'); ?>

<?php
    if($posts_module === true)
    {
  ?>
      <?php echo $this->Html->script('ckeditor/ckeditor.js'); ?>
      <?php echo $this->Html->script('ckeditor/sample.js'); ?>
      <script> initSample(); </script>
  <?php
    }
  ?>

</body>
</html>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
  var values = [];
  $("#add-label").on("click", function(e) {
      var i = 0;
      e.preventDefault();
      var _val = $("#text-field").val();
      if(_val !== '') {
        _val = _val.trim();
        _val = _val.toLowerCase();
        if(values.indexOf(_val) < 0){
          values.push(_val);
            $("#label-box").append('<label class="label"><span>'+ _val +'</span><span class="close-label">x</span></label>');
            $("#text-field").val('');
            var labelInput = $("#labelInput").val();
            if(labelInput == '') {
                $("#labelInput").val(_val);
            } else {
                var newVal = labelInput + ',' + _val;                    
                $("#labelInput").val(newVal);
            }               
              i++; 
        }else{
          alert('"' +_val + '" tag is already exist.');
              $("#text-field").val('');
        }
      }
  });

  $("body").on("click", ".close-label", function(e) {
      var _label = $(this).closest(".label");
      var _val = _label.find("span:first-child").text();
      var labelInput = $("#labelInput").val();
      labelInput = labelInput.split(",");
      labelInput.splice(labelInput.indexOf(_val), 1);
      $("#labelInput").val(labelInput.join());            
      _label.remove();
  });
</script>

<!-- DateTime Picker -->
<script type="text/javascript">
  $('.form_datetime').datetimepicker({
    format: 'yyyy-mm-dd hh:ii:00',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 0,
    startDate: '+1d',
    endDate: '+1m'
  });
</script>