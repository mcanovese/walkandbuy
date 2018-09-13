<?php

$router->get('','PagesController@home');
$router->get('home','PagesController@home');
$router->get('whoAreWe','PagesController@whoAreWe');
$router->get('partner','PagesController@partner');
$router->get('howWork','PagesController@howWork');
$router->get('contact','PagesController@contact');
$router->get('add-user','PagesController@addUser');
$router->get('404','PagesController@notFound');
$router->get('item','PagesController@item');
$router->get('category', 'PagesController@category');
$router->get('signin', 'PagesController@signIn');
$router->get('user','PagesController@user');
$router->get('addtocart','PagesController@addToCart');
$router->get('logout','PagesController@logout');
$router->get('cart','PagesController@cart');
$router->get('cassa','PagesController@cassa');
$router->get('itemUpdate','ItemsController@itemUpdate');
$router->get('admin','PagesController@admin');
$router->get('order','PagesController@order');



$router->post('assegnaAzienda','PagesController@assegnaAzienda');




$router->get('users','UsersController@index');
$router->post('insertItem','PagesController@addItem');
$router->post('updateItem','PagesController@updateItem');
$router->post('registerUser','PagesController@registerUser');
$router->post('login','PagesController@loginPOST');
