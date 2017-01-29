<?php

return array(
        
//    'product/([0-9]+)' => 'product/view/$1', //actionView в ProductController
//    
//    'catalog' => 'catalog/index', //actionIndex в CatalogController
//    
//    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', //actionCategory В CatalogController
//    'category/([0-9]+)' => 'catalog/category/$1', //actionCategory в CatalogController
    
    'delete/([0-9]+)' => 'advt/delete/$1',
    '([0-9]+)' => 'advt/show/$1',
    'logout' => 'site/logout',
    'edit' => 'advt/add',
    
    '' => 'site/index' //actionIndex в SiteController
    
);
