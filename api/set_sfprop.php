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

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['token']))
{
    // if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/sfprop.conf"))
    // {
    //     echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/sfprop.conf"));
    //     exit;
    // }
    // else
    // {
    //     echo("true:true:true:true:true:true:true:true");
    //     exit;
    // }
    if (isset($_GET['value']))
    {
        if ($_GET['value'] == "true")
        {
            $value = "true";
        }
        if ($_GET['value'] == "false")
        {
            $value = "false";
        }
        if ($_GET['value'] != "false" && $_GET['value'] != "true")
        {
            echo("invalid");
            exit;
        }
    }
    else
    {
        echo("no value");
        exit;
    }
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/sfprop.conf", $value);
    echo("ok");
    exit;
}
else
{
    echo("tokiss");
    exit;
}