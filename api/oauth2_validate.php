<?php

$pinpages = "http://localhost";
if (isset($_GET['user']))
{

}
else
{
    echo("no user");
    exit;
}

$data = file_get_contents($pinpages . "/library/checkUserExistance.php?user=" . $_GET['user']);

if ($data == "1") {

} else {
    echo("uinv");
    exit;
}