<?php

$root = $_SERVER['DOCUMENT_ROOT'];

function rrmdir($dir) { 
    if (is_dir($dir)) { 
        $objects = scandir($dir); 
        foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
                if (is_dir($dir."/".$object))
                rrmdir($dir."/".$object);
                else
                unlink($dir."/".$object); 
            } 
        }
        rmdir($dir); 
    } 
}

if (isset($_GET['token']) && isset($_GET['user']))
{   
    $token = $_GET['token'];
    $user = $_GET['user'];
    if (file_exists($root . "/db/" . $user . "/tokens/" . $token)) {
        rrmdir($root . "/db/" . $user);
        echo("ok");
    }
    if (file_exists($root . "/res/img/public/" . $user . ".png")) {
        unlink($root . "/res/img/public/" . $user . ".png");
    }
}