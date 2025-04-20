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
$func = "profch";

$content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt");
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/db/" . $user . "/history.txt", $ip . "~" . $date . "~" . $func . "\n" . $content);

$root = $_SERVER['DOCUMENT_ROOT'];
$user = $_POST['user'];
$token = $_POST['token'];

if (isset($_FILES) && isset($_POST['user']) && isset($_POST['token']) && isset($_FILES['file']))
{
}
else
{
    echo("unset");
    exit;
}

if (isset($_FILES))
{
    if ($_FILES['file']['error']) {     
        switch ($_FILES['file']['error']){     
                 case 1: // UPLOAD_ERR_INI_SIZE     
                 echo"sizeerr";     
                 break;     
                 case 2: // UPLOAD_ERR_FORM_SIZE     
                 echo "limiterr"; 
                 break;     
                 case 3: // UPLOAD_ERR_PARTIAL     
                 echo "interrupt";     
                 break;     
                 case 4: // UPLOAD_ERR_NO_FILE     
                 echo "nullsize"; 
                 break;     
        }     
    }     
    else {     
        if (file_exists($root . "/db/" . $user . "/tokens/" . $token))
        {
            if ($_FILES['file']['type'] != 'image/png')
            {
                echo "nopng";
            }
            else
            {
                if (file_exists($root . "/res/img/public/" . $user . ".png"))
                {
                    unlink($root . "/res/img/public/" . $user . ".png");
                    move_uploaded_file($_FILES["file"]["tmp_name"],$root . "/res/img/public/" . $user . ".png");
                    echo("ok");
                    exit;
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"],$root . "/res/img/public/" . $user . ".png");
                    echo("ok");
                    exit;
                }
            }
        }
    }     
}
else
{
    echo("no file");
    exit;
}