<header class="header">
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><?php echo $this->Html->image('frontend_images/brand-logo.png', array('alt' => 'Brand Logo')); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/aboutus">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">WRITERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ARTISTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ENTERPRENURE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">PUBLICATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">HELP US GROW!</a>
        </li>
      </ul>
        <a class="btn action-btn" href="#subscribe_section" type="submit">subscribe
          <?php echo $this->Html->image('frontend_images/arrow-sign-used.png', array('alt' => 'arrow-sign-used')); ?>
      </a>&nbsp;
      <?php if($userAuth): ?>
        <?php echo $this->Html->link('Logout', '/logout',array('class' => 'btn action-btn')); ?>
      <?php endif; ?>
    </div>
  </nav>
  </div>
</header>