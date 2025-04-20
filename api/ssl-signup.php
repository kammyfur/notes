<?php

$root = $_SERVER['DOCUMENT_ROOT'];

if (isset($_POST['user']))
{
    $user = $_POST['user'];
}
else
{
    echo("no user");
    exit;
}

if (isset($_POST['pass']))
{
    $pass = $_POST['pass'];
}
else
{
    echo("no pass");
    exit;
}

if (isset($_POST['passc']))
{
    $pass_confirmation = $_POST['passc'];
}
else
{
    echo("no passconf");
    exit;
}

if ($user == "")
{
    echo("user_empty");
    exit;
}

if ($pass == "")
{
    echo("pass_empty");
    exit;
}

if ($pass == $pass_confirmation)
{
}
else
{
    echo("pass_dnm");
    exit;
}

if (file_exists($root . "/db/" . $user))
{
    echo("user_exists");
    exit;
}
else
{
    $p1 = (int)11111111111111111111;
    $p2 = (int)99999999999999999999;
    $uid = rand($p1, $p2);
    $hash = password_hash($pass , PASSWORD_DEFAULT, ['cost' => 12]);
    if (file_exists($root . "/db/" . $user))
    {
    }
    else
    {
        mkdir($root . "/db/" . $user);
    };
    file_put_contents($root . "/db/" . $user . "/passwd", $hash);
    file_put_contents($root . "/db/" . $user . "/uuid", $uid);
    // $fp = fopen($root . "/db/" . $user . "/passwd");
    // fwrite($fp,$hash);
    // fclose($fp);
    // $fp = fopen($root . "/db/" . $user . "/uuid");
    // fwrite($fp,$uid);
    // fclose($fp);
    echo("ok");
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
    $func = "acccr";
    
    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);
    exit;
}