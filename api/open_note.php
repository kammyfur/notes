<?php

if (isset($_GET['user']))
{

}
else
{
    echo("no user");
    exit;
}

if (isset($_GET['token']))
{

}
else
{
    echo("no token");
    exit;
}

if (isset($_GET['name']))
{

}
else
{
    echo("noname");
    exit;
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['token']))
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name']))
    {
        echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name']));
    }
}
else
{
    echo("tokiss");
    exit;
}