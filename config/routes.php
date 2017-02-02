<?php
//Маршруты
return array(    
    'edit/([0-9]+)' => 'advt/add/$1',//actionAdd в AdvtController
    'page-([0-9]+)' => 'site/index/$1',//actionIndex в SiteControoller 
    'delete/([0-9]+)' => 'advt/delete/$1',//actionDelete в AdvtController
    '([0-9]+)' => 'advt/show/$1',//actionShow в AdvtController      
    'logout' => 'user/logout',//actionLogout в UserController
    'edit' => 'advt/add',//actionAdd в AdvtController
    '' => 'site/index', //actionIndex в SiteController    
);
