<?php

return array(
    
    'page-([0-9]+)' => 'site/index/$1',
    
    'delete/([0-9]+)' => 'advt/delete/$1',
    
    //'show/([0-9]+)' => 'advt/show/$1',
    '([0-9]+)' => 'advt/show/$1',
    
    
    'logout' => 'site/logout',
    'edit' => 'advt/add',
    

    '' => 'site/index', //actionIndex в SiteController
    
);
