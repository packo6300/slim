<?php

/**
 * this is the first app build in php slim FrameWork 
 * building RESTFul API
 * @author Packo Delgado <packo6300@gmail.com>
 */
$base = __DIR__ . '/../app/';
$folders = [
    'lib',
    'model',
    'route'
];

foreach($folders as $f){
    foreach (glob($base . "$f/*.php") as $filename){
        require $filename;
    }
}