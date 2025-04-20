<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/properties.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/res/lang/langHandler.php" ?>

<!DOCTYPE html5 php js css3>
<html lang="<?= $lang_def ?>" style="height: 100%;" id="placeholder" class="bphlogin0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $lang_new_login_title ?></title>
    <link rel="stylesheet" href="/res/css/login.css">
    <script>
        if (path.includes("?lang=") >= 1) {} else {
            location.href = location.href + "?lang=" + navigator.language.substr(0,2);
        }
        lang = "<?= $lang ?>";
    </script>
</head>
<body id="Privacy" style="margin: 0;height: 100%;overflow-x: hidden;">
    <a href="https://minteck-projects.alwaysdata.net"><img id="Login_Logo" src="/res/img/icon.png" width="48px" height="48px"></a>
    <br>
    <?php

    if ($lang == "fr") {
        echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/@/privacy/fr.html"));
    } else {
        echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/@/privacy/en.html"));
    }

    ?>
    <script>
    
    $("#Login_Comp").fadeOut(0)
    $("#Login_Loader").fadeIn(0)
    
    setTimeout(() => {
        $("#Login_Loader").fadeOut(2000)
        $("#Login_Comp").fadeIn(2000)
    }, 2000)

    lang_new_login_confirm = "<?= $lang_new_login_confirm ?>"
    lang_new_login_error1 = "<?= $lang_new_login_error1 ?>"
    lang_new_login_error2 = "<?= $lang_new_login_error2 ?>"
    lang_new_login_error3 = "<?= $lang_new_login_error3 ?>"
    lang_new_login_error4 = "<?= $lang_new_login_error4 ?>"
    lang_new_login_home = "<?= $lang_new_login_home ?>"

    </script>
</body>
</html>