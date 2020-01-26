<?php

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	
	Router::connect('/aboutus', array('controller' => 'pages', 'action' => 'aboutus'));

	Router::connect('/blog', array('controller' => 'Blogs', 'action' => 'index'));
	
	Router::connect('/blog/categories/:slug', array('controller' => 'Blogs', 'action' => 'index'), array('slug' => '[a-z-]+', 'pass' => array('slug')));

	Router::connect('/post/:slug', array('controller' => 'Blogs', 'action' => 'postdetail'), array('slug' => '[a-z0-9-]+', 'pass' => array('slug')));

	Router::connect('/publication', array('controller' => 'pages', 'action' => 'publication'));

	Router::connect('/pricing-plan', array('controller' => 'pages', 'action' => 'pricingplan'));

	Router::connect('/help-us-grow', array('controller' => 'Pages', 'action' => 'helpusgrow'));

	Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));

	Router::connect('/logout', array('controller' => 'FrontendUsers', 'action' => 'logout'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin'=>true));

	//Router::connect('/admin', array('controller' => 'pages', 'action' => 'publication'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
