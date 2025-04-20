<?php
if (isset($_GET['token']))
{
}
else
{
    echo "no token";
    exit;
}
if (isset($_GET['user']))
{
}
else
{
    echo "no user";
    exit;
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['tokens']))
{
    $files = scandir($_SERVER['DOCUMENT_ROOT'] . '/db/' . $_GET['user'] . "/tokens/");
    foreach($files as $file) {
        if ($file == "." || $file == "..")
        {
        }
        else
        {
            rmdir($_SERVER['DOCUMENT_ROOT'] . '/db/' . $_GET['user'] . "/tokens/" . $file);
        }}
}
else
{
    echo "invalid token";
    exit;
}