<?php

$root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_GET['token']))
{
    $token = $_GET['token'];
    $files = scandir($root . '/db/');
    $ok = false;
    foreach($files as $file) {
        if ($file == "." || $file == "..")
        {
        }
        else
        {
            if (is_dir($root . '/db/' . $file))
            {
                if (file_exists($root . '/db/' . $file . "/tokens/" . $token))
                {
                    echo($file);
                    $ok = true;
                    exit;
                }
            }
        }
    }
    if ($ok == false)
    {
        echo("no");
        exit;
    };
}
else
{
    echo("No token given!");
    exit;
};
