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

if (isset($_GET['oldname']))
{

}
else
{
    echo("no oldname");
    exit;
}

if (isset($_GET['newname']))
{

}
else
{
    echo("no newname");
    exit;
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['token']))
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes"))
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['oldname']))
        {
            if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['newname']))
            {
                if ($_GET['oldname'] == $_GET['newname'])
                {
                    echo("ok");
                    exit;
                }
                else
                {
                    echo("taken");
                    exit;
                }
            }
            else
            {
                $newname = str_ireplace("'","\'",$_GET['newname']);
                if (strpos($newname, ':') !== false || strpos($newname, '?') !== false || strpos($newname, '{') !== false || strpos ($newname, '}') !== false || strpos($newname, '>') !== false || strpos($newname, '<') !== false || strpos($newname, '`') !== false || strpos($newname, '~') !== false || strpos($newname, '\\') !== false || strpos($newname, ':') !== false ||  strpos($newname, '/') !== false) {
                    echo 'invalid';
                    exit;
                }
                else
                {
                    rename($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['oldname'],$_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['newname']);
                    echo 'ok';
                    exit;
                }
            }
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