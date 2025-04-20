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
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes"))
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name']))
        {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name']);
            echo("ok");
            exit;
        }
        else
        {
            echo("not found");
            exit;
        }
    }
    else
    {
        echo("no notedir");
        exit;
    }
}
else
{
    echo("tokiss");
    exit;
}