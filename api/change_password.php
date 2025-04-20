<?php

if ($_SERVER['REMOTE_ADDR'] == "::1") {
    $_SERVER['REMOTE_ADDR'] = "127.0.0.1";
};

if (isset($_GET['user']))
{
    $user = $_GET['user'];
}
if (isset($_POST['user']))
{
    $user = $_POST['user'];
}

$root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_GET['token']) && isset($_GET['user']) && isset($_GET['oldpass']) && isset($_GET['newpass']))
{
    $token = $_GET['token'];
    $user = $_GET['user'];
    $newpass = $_GET['newpass'];
    $oldpass = $_GET['oldpass'];
}
else
{
    echo("Fatal Error");
    exit;
}

if (file_exists($root . "/db/" . $user . "/tokens/" . $token))
{
    if (password_verify($oldpass, file_get_contents($root . "/db/" . $user . "/passwd")))
    {
        file_put_contents($root . "/db/" . $user . "/passwd", password_hash($newpass , PASSWORD_DEFAULT, ['cost' => 12]));
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date("d/m/Y G:i:s");
        $func = "passch";
        $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);
        echo("ok");
        exit;
    }
    else
    {
        echo("inv");
        exit;
    }
}