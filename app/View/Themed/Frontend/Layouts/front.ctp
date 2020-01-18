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
</script>
<!-- Start : Social Share With Facebook -->
</html>