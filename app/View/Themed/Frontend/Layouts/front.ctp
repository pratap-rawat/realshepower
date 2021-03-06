<?php
  $posts_module = false;
  $currentControllerName = $this->params['controller'];
  $currentActionName = $this->params['action'];
  $controllers = array('FrontendUsers');
  $actions = array('addBlog');
  if(in_array($currentControllerName, $controllers) && in_array($currentActionName, $actions))
  {
    $posts_module = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
  <?php echo $this->Html->css('owl.carousel.min.css'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <?php echo $this->Html->css('responsive.css'); ?>
  <?php echo $this->Html->css('style.css'); ?>
</head>
<body>
  
  <?php echo $this->element('header_navigation'); ?>
  
  <?php echo $this->fetch('content'); ?>
  
  <?php echo $this->element('footer'); ?>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <?php echo $this->Html->script('owl.carousel.min.js'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script type="text/javascript">
    var base_url = '<?php echo $this->webroot;?>';
  </script>
  <?php echo $this->Html->script('script.js'); ?>
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
<!-- Start : Social Share With Facebook -->
<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId            : '528118908102267',
	      autoLogAppEvents : true,
	      xfbml            : true,
	      version          : 'v5.0'
	    });
	};
</script>

<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

<script type="text/javascript">
	function sharethisToFB(url) {
		FB.ui({
		  method: 'share',
		  href: url
		  //quote: "Hi, Pratap",
		  //hashtag:"#Pratap"
		}, function(response){
			console.log(response);
		});
	}

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
</script>
<!-- Start : Social Share With Facebook -->
</html>