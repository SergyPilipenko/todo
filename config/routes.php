<?php
return array(

    'create/save' => 'create/save',
    'task/new' => 'create/new',
    'task/ajax'=> 'preview/ajax',
    'task/overview/([0-9]+)' => 'onetask/overview/$1',
    'task/edit/([0-9]+)' => 'edit/edit/$1',
    'task/update/([0-9]+)' => 'edit/save/$1',
    'sort/sort' => 'sort/sort',
    'login/enter'=>'login/enter',
    'admin/logout' => 'logout/logout',
    'admin/admin/page-([0-9]+)'=> 'admin/admin/$1',
    'site/index/page-([0-9]+)' =>'site/index/$1',
    '' => 'start/index/',

);