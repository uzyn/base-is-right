<?php
Router::parseExtensions('json');

Router::connect('/products/:id', array('controller' => 'products', 'action' => 'view'), array('id' => '[0-9]{1,21}',));
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>