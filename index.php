<?php
include '../../pocket-knife/start.php';
include 'Post.php';
include 'Posts.php';

// choose DB to use
$dbs = array(
    'sql' => array('type'=>'pdo', 'username'=>'dev', 'password'=>'dev', 'location'=>'localhost', 'database'=>'blog'),
    'couch' => array('type'=>'couch', 'username'=>'dev', 'password'=>'dev', 'location'=>'localhost', 'database'=>'blog'),
    'mongo' => array('type'=>'mongo', 'username'=>'dev', 'password'=>'dev', 'location'=>'localhost', 'database'=>'blog'),
    'json' => array('type'=>'json', 'location'=>'db.json', 'schema'=>''),
);
if( array_key_exists(@$_GET['storage'], $dbs) ){
    $storage = @$_GET['storage'];
}
else{
    $storage = 'json';
}

// setup application
$configuration = new Configuration(array(
    'acl' => array('* can access * in post', '* can access * in posts'),
    'template' => 'template.php',
    'storage' => $dbs[$storage]   
));

$app = new Service($configuration);
$app->execute();