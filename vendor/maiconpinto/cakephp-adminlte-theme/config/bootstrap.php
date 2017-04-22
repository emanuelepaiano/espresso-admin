<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;

Configure::write('Theme', [
    'title' => 'AdminLTE',
    'logo' => [
        'mini' => '<b>E</b>Ad',
        'large' => '<b>Espresso</b>Admin'
    ],
    'login' => [
        'show_remember' => true,
        'show_register' => true,
        'show_social' => true
    ],
    'folder' => ROOT
]);
