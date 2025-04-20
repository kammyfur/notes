<?php

include_once "../properties.php";
include_once "../res/lang/langHandler.php";

if (isset($_GET['user']))
{

}
else
{
    echo("no user");
}

if (isset($_GET['token']))
{

}
else
{
    echo("no token");
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/tokens/" . $_GET['token']))
{

}
else
{
    exit;
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes"))
{
    $files = scandir($_SERVER['DOCUMENT_ROOT'] . "/db/" . $_GET['user'] . "/notes");
    foreach ($files as $file) {
        if ($file == "." || $file == "..")
        {
            // return;
        }
        else
        {
            echo("<a class=\"notelink\" onclick=\"openNote('" . $file . "')\">" . $file . "</a><hr>");
        }
    }
}
else
{
    echo("<span class=\"no-notes\">" . $lang_notes_none . "<br></span>");
}