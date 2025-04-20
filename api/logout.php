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

$ip = $_SERVER['REMOTE_ADDR'];
$date = date("d/m/Y G:i:s");
$func = "logout";

$content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);

if(isset($_GET['user']))
{
    $username = $_GET['user'];
}
else
{
    echo("No user!");
    exit;
}

if(isset($_GET['token']))
{
    $token = $_GET['token'];
}
else
{
    echo("No token!");
    exit;
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $username . "/tokens/" . $token))
{
    rmdir($_SERVER['DOCUMENT_ROOT'] . "/db/" . $username . "/tokens/" . $token);
    echo("ok");
    exit;
}
else
{
    echo("inv");
    exit;
}