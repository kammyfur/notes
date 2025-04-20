<?php

if (isset($_GET['user']))
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/res/img/public/" . $_GET['user'] . ".png"))
    {
        echo("yes");
        exit;
    }
    else
    {
        echo("default");
        exit;
    }
}
else
{
    echo("no user");
    exit;
}