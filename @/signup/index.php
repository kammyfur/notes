<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/properties.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/res/lang/langHandler.php" ?>

<?php

if (isset($_GET['oauth_back'])) {
    echo("<script>oback = \"{$_GET['oauth_back']}\"</script>");
    $oauth_back = "&oauth_back={$_GET['oauth_back']}";
} else {
    $oauth_back = "";
    echo("<script>oback = \"\"</script>");
}

?>

<!DOCTYPE html5 php js css3>
<html lang="<?= $lang_def ?>" style="height: 100%;" id="placeholder" class="bphlogin0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $lang_new_signup_title ?></title>
    <link rel="stylesheet" href="/res/css/login.css">
    <script>
        if (path.includes("?lang=") >= 1) {} else {
            location.href = location.href + "?lang=" + navigator.language.substr(0,2);
        }
        lang = "<?= $lang ?>";
    </script>
</head>
<body id="Login" style="margin: 0;height: 100%;overflow-x: hidden;">
    <a href="https://minteck-projects.alwaysdata.net"><img id="Login_Logo" src="/res/img/icon.png" width="48px" height="48px"></a>
    <div class="Login_Vcenter" id="Login_Comp">
        <?= $lang_new_login_slogan ?><br>
        <hr>
        <small><?= $lang_new_signup_privacy ?></small><br><small><a href="/@/login/?lang=<?= $lang . $oauth_back ?>" class="Signup_Privacy"><?= $lang_new_signup_switch ?></a></small>
        <br><br>
        <span id="Login_Title"><?= $lang_new_signup_home ?></span><br><small><?= $lang_new_continue_oauth2 ?></small><br>
        <input placeholder="<?= $lang_new_login_user ?>" class="Login_Input" id="Login_User">
        <input placeholder="<?= $lang_new_login_pass ?>" type="password" class="Login_Input hide" id="Login_Password"><br>
        <input placeholder="<?= $lang_new_signup_pass ?>" type="password" class="Login_Input hide" id="Login_PasswordConfirm"><br><br>
        <img height=32px width=32px class="Login_Next" id="Login_NextUser" onclick="nextPage()" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNTAiIGhlaWdodD0iNTAiCnZpZXdCb3g9IjAgMCAyNCAyNCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij4gICAgPHBhdGggc3R5bGU9ImxpbmUtaGVpZ2h0Om5vcm1hbDt0ZXh0LWluZGVudDowO3RleHQtYWxpZ246c3RhcnQ7dGV4dC1kZWNvcmF0aW9uLWxpbmU6bm9uZTt0ZXh0LWRlY29yYXRpb24tc3R5bGU6c29saWQ7dGV4dC1kZWNvcmF0aW9uLWNvbG9yOiMwMDA7dGV4dC10cmFuc2Zvcm06bm9uZTtibG9jay1wcm9ncmVzc2lvbjp0Yjtpc29sYXRpb246YXV0bzttaXgtYmxlbmQtbW9kZTpub3JtYWwiIGQ9Ik0gOS4yMDcwMzEyIDIuNzkyOTY4OCBMIDcuNzkyOTY4OCA0LjIwNzAzMTIgTCAxNS41ODU5MzggMTIgTCA3Ljc5Mjk2ODggMTkuNzkyOTY5IEwgOS4yMDcwMzEyIDIxLjIwNzAzMSBMIDE4LjQxNDA2MiAxMiBMIDkuMjA3MDMxMiAyLjc5Mjk2ODggeiIgZm9udC13ZWlnaHQ9IjQwMCIgZm9udC1mYW1pbHk9InNhbnMtc2VyaWYiIHdoaXRlLXNwYWNlPSJub3JtYWwiIG92ZXJmbG93PSJ2aXNpYmxlIj48L3BhdGg+PC9zdmc+">
        <img height=32px width=32px class="Login_Next hide" id="Login_NextPass" onclick="endPage()" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iNTAiIGhlaWdodD0iNTAiCnZpZXdCb3g9IjAgMCAyNCAyNCIKc3R5bGU9IiBmaWxsOiMwMDAwMDA7Ij4gICAgPHBhdGggc3R5bGU9ImxpbmUtaGVpZ2h0Om5vcm1hbDt0ZXh0LWluZGVudDowO3RleHQtYWxpZ246c3RhcnQ7dGV4dC1kZWNvcmF0aW9uLWxpbmU6bm9uZTt0ZXh0LWRlY29yYXRpb24tc3R5bGU6c29saWQ7dGV4dC1kZWNvcmF0aW9uLWNvbG9yOiMwMDA7dGV4dC10cmFuc2Zvcm06bm9uZTtibG9jay1wcm9ncmVzc2lvbjp0Yjtpc29sYXRpb246YXV0bzttaXgtYmxlbmQtbW9kZTpub3JtYWwiIGQ9Ik0gOS4yMDcwMzEyIDIuNzkyOTY4OCBMIDcuNzkyOTY4OCA0LjIwNzAzMTIgTCAxNS41ODU5MzggMTIgTCA3Ljc5Mjk2ODggMTkuNzkyOTY5IEwgOS4yMDcwMzEyIDIxLjIwNzAzMSBMIDE4LjQxNDA2MiAxMiBMIDkuMjA3MDMxMiAyLjc5Mjk2ODggeiIgZm9udC13ZWlnaHQ9IjQwMCIgZm9udC1mYW1pbHk9InNhbnMtc2VyaWYiIHdoaXRlLXNwYWNlPSJub3JtYWwiIG92ZXJmbG93PSJ2aXNpYmxlIj48L3BhdGg+PC9zdmc+">
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