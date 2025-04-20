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
    echo("no user");
    exit;
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes"))
{
    $notes = scandir($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes");
    $ncount = 0;
    foreach ($notes as $note) {
        if ($note == "." || $note == "..")
        {

        }
        else
        {
            $ncount = $ncount + 1;
        }
    }
    echo($ncount);
    exit;
}
else
{
    echo("0");
    exit;
}