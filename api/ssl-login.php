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
$func = "connect";

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user))
{
    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);
}

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

if (file_exists($root . "/db/" . $user))
{
    $p1 = (int)1111111111111111111111111;
    $p2 = (int)9999999999999999999999999;
    (string)$p3 = rand($p1,$p2);
    (string)$p4 = rand($p1,$p2);
    $token = "\$mpt$" . $p3 . "$" . $p4;
    if (password_verify($pass,file_get_contents($root . "/db/" . $user . "/passwd")))
    {
        $files = scandir($root . "/db/");
        foreach ($files as $file) {
            if (is_dir($file))
            {
                if ($file == "." || $file == "..")
                {
                }
                else
                {
                    if (file_exists($root . "/db/" . $file . "/tokens/"))
                    {
                        if (file_exists($root . "/db/" . $file . "/tokens/" . $token)) {
                            (string)$p3 = rand($p1,$p2);
                            (string)$p4 = rand($p1,$p2);
                            $token = "\$mpt$" . $p3 . "$" . $p4;
                        }
                    }
                }
            }
        }
        echo("token=" . $token);
        if (file_exists($root . "/db/" . $user . "/tokens/"))
        {
        }
        else
        {
            mkdir($root . "/db/" . $user . "/tokens/");
        }
        mkdir($root . "/db/" . $user . "/tokens/" . $token);
        exit;
    }
    else
    {
        echo("pass_inv");
        exit;
    }
}
else
{
    echo("user_nfound");
    exit;
}