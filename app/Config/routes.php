<?php

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));

	Router::connect('/blog', array('controller' => 'Blogs', 'action' => 'index'));
	Router::connect('/post/:slug', array('controller' => 'Blogs', 'action' => 'postdetail'), array('slug' => '[a-z0-9-]+', 'pass' => array('slug')));
	Router::connect('/blog/categories/:slug', array('controller' => 'Blogs', 'action' => 'index'), array('slug' => '[a-z-]+', 'pass' => array('slug')));

	Router::connect('/aboutus', array('controller' => 'pages', 'action' => 'aboutus'));

	Router::connect('/logout', array('controller' => 'FrontendUsers', 'action' => 'logout'));

	Router::connect('/admin', array('controller' => 'users', 'action' => 'dashboard', 'admin'=>true));


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
