<?php

return [
    '/home' => 'site/home',
    '/about' => 'site/about',
    '/login' => 'site/loginform',

    '/usergroup/page{page}' => 'usergroup/show',
    '/usergroup/edit{id}' => 'usergroup/showeditform',
    '/usergroup/add' => 'usergroup/showaddform',
    '/usergroup/delete{id}' => 'usergroup/delete',

    '/feedback/page{page}' => 'feedback/show',
    '/feedback/edit{id}' => 'feedback/showeditform',
    '/feedback/add' => 'feedback/showaddform',
    '/feedback/delete{id}' => 'feedback/delete',

    '/users/page{page}' => 'users/show',
    '/users/edit{id}' => 'users/showeditform',
    '/users/add' => 'users/showaddform',
    '/users/delete{id}' => 'users/delete',

    '/karta/page{page}' => 'karta/show',
    '/karta/edit{id}' => 'karta/showeditform',
    '/karta/add' => 'karta/showaddform',
    '/karta/delete{id}' => 'karta/delete',

    '/privivki/page{page}' => 'privivki/show',
    '/privivki/edit{id}' => 'privivki/showeditform',
    '/privivki/add' => 'privivki/showaddform',
    '/privivki/delete{id}' => 'privivki/delete',

    '/patients/page{page}' => 'patients/show',
    '/patients/edit{id}' => 'patients/showeditform',
    '/patients/add' => 'patients/showaddform',
    '/patients/delete{id}' => 'patients/delete',

    '/signup' => 'signup/showform'
];
