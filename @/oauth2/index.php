<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/properties.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/res/lang/langHandler.php" ?>

<?php

// var_dump($_SERVER);
// exit;

if (isset($_GET['clientid'])) {
    echo("<script>oback = \"{$_GET['clientid']}\"</script>");
    $oauth_back = "&oauth_back={$_GET['clientid']}";
    $cid = $_GET['clientid'];
} else {
    $oauth_back = "";
}

?>

<!DOCTYPE html5 php js css3>
<html lang="<?= $lang_def ?>" style="height: 100%;" id="placeholder" class="bphlogin0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $lang_new_oauth2_title ?></title>
    <link rel="stylesheet" href="/res/css/login.css">
    <script>
        if (path.includes("?lang=") >= 1) {} else {
            location.href = location.href + "?lang=" + navigator.language.substr(0,2);
        }
        lang = "<?= $lang ?>";
    </script>
</head>
<body id="Login" style="margin: 0;height: 100%;overflow-x: hidden;">
    <?php

    if (isset($_COOKIE['token'])) {
        $validation = file_get_contents($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/api/validate_token.php?token={$_COOKIE['token']}");
        global $user;
        $user = $validation;
        if (trim($validation) != "no") {
            
        } else {
            echo("<script>location.href = \"/@/login/?lang={$lang}{$oauth_back}\"</script>");
            exit;
        }
    } else {
        echo("<script>location.href = \"/@/login/?lang={$lang}{$oauth_back}\"</script>");
        exit;
    }

    ?>
    
    <a href="https://minteck-projects.alwaysdata.net"><img id="Login_Logo" src="/res/img/icon.png" width="48px" height="48px"></a>
    <div class="Login_Vcenter" id="Login_Comp">
        <?= $lang_new_oauth2_slogan ?><br><hr>
        <?php

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/apps/" . $cid)) {
            echo("<small>" . $lang_new_oauth2_warn . "</small><br><br>");
            echo($lang_new_oauth2_info1 . file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/apps/" . $cid . "/name") . $lang_new_oauth2_info2 . file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/apps/" . $cid . "/author") . $lang_new_oauth2_info3 . "<br><br><br><a class=\"Oauth2_Allow\" onclick=\"allow()\">{$lang_new_oauth2_allow}</a>\n \n<a class=\"Oauth2_Deny\" onclick=\"deny()\">{$lang_new_oauth2_deny}</a>");
        } else {
            echo($lang_new_oauth2_invalid);
        }

        ?>
    </div>
    <div class="Login_Vcenter hide" id="Oauth2_Done">
        <?= $lang_new_oauth2_slogan ?><br><hr>
        <?php

        echo("<h1>" . $lang_new_oauth2_done1 . "</h1>" . $lang_new_oauth2_done2);

        ?>
    </div>
    <script src="/res/js/jquery.js"></script>
    <script src="index.js"></script>
    <div class="Login_Vcenter hide" id="Login_Loader">
        <svg class="spinner" width="64px" height="64px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div>
    <script>
    
    $("#Login_Comp").fadeOut(0)
    $("#Login_Loader").fadeIn(0)
    
    setTimeout(() => {
        $("#Login_Loader").fadeOut(2000)
        $("#Login_Comp").fadeIn(2000)
    }, 2000)

    lang_new_signup_confirm = "<?= $lang_new_signup_confirm ?>"
    lang_new_login_error1 = "<?= $lang_new_login_error1 ?>"
    lang_new_signup_error1 = "<?= $lang_new_signup_error1 ?>"
    lang_new_login_error3 = "<?= $lang_new_login_error3 ?>"
    lang_new_signup_error2 = "<?= $lang_new_signup_error2 ?>"
    lang_new_login_home = "<?= $lang_new_signup_home ?>"

    </script>
</body>
</html>