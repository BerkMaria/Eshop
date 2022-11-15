<?php
return array(
    'product/([0-9]+)' => 'product/view/$1', //actionViews v ProductController
    'catalog' => 'catalog/index', //actionIndex v CatalogController
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',//actionCategory v CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',//actionCategory v CatalogController

    //'cart/add/([0-9]+)' => 'cart/add/$1', //actionAdd v CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', //actionAdd v CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/checkout' => 'cart/checkout',

     'cart' => 'cart/index',


    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cabinet/edit' =>'cabinet/edit',

     'ajax/send' => 'ajax/open',
     'ajax' => 'ajax/xaja',

    'cabinet' => 'cabinet/index',

    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/order' => 'adminOrder/index',

    'admin' => 'admin/index',

    'contacts' => 'site/contact',

    '' => 'site/index', //actionIndex v SiteController


);
