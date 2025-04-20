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

if (isset($_GET['content']))
{
    $content = $_GET['content'];
}
else
{
    if (isset($_POST['content']))
    {
        $content = $_POST['content'];
    }
    else
    {
        echo("nocnt");
        exit;
    }
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['token']))
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes"))
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name']))
        {
            $lines_arr = preg_split('/\n|\r/',$content);
            $lines = count($lines_arr); 
            // echo $num_newlines;
            // $lines = count($_GET['name']) - 1;
            if ($lines > 150)
            {
                echo("too high");
                exit;
            }
            else
            {
                $ip = $_SERVER['REMOTE_ADDR'];
                $date = date("d/m/Y G:i:s");
                $func = "noteed";
                $user = $_GET['user'];

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user))
                {
                    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
                    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);
                }
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes/" . $_GET['name'],$_GET['content']);
                echo("ok");
                exit;
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
    }
}
else
{
    echo("tokiss");
    exit;
}