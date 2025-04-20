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
            echo("already");
            exit;
        }
        else
        {

        }
    }
    else
    {
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes");
    }
    // echo("\\"); exit;
    $newname = str_ireplace("'","\'",$_GET['name']);
    if (strpos($newname, ':') !== false || strpos($newname, '?') !== false || strpos($newname, '{') !== false || strpos($newname, '}') !== false || strpos($newname, '>') !== false || strpos($newname, '<') !== false || strpos($newname, '`') !== false || strpos ($newname, '~') !== false || strpos($newname, '\\') !== false || strpos($newname, ':') !== false || strpos($newname, '"') !== false || strpos($newname, '/') !== false) {
        echo 'invalid';
        exit;
    }
    else
    {
        $notes = scandir($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes");
        foreach ($notes as $note) {
            if ($note == "." || $note == "..")
            {
                
            }
            else
            {
                if (isset($ncount))
                {
                    $ncount = $ncount + 1;
                }
                else
                {
                    $ncount = 1;
                }
            }
        }
        // echo($ncount);
        // exit;
        if (isset($ncount))
        {

        }
        else
        {
            $ncount = 0;
        }
        if ($ncount < 10)
        {
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $newname,"");
            echo 'ok';
            exit;
        }
        else
        {
            echo 'too much';
            exit;
        }
    }
}
else
{
    echo("tokiss");
    exit;
}