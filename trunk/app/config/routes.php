<?php
#Enable JSON and XML web service
Router::parseExtensions('json');

#Quickly map REST resources
Router::mapResources('products');

#Blah
#Router::connect('/products/:id', array('controller' => 'products', 'action' => 'view'), array('id' => '[0-9]{1,21}',));
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>