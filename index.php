<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/properties.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/res/lang/langHandler.php" ?>

<!DOCTYPE html5 php js css3>
<html lang="<?= $lang_def ?>" style="height: 100%;" id="placeholder" class="bphlogin0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compte Minteck Projects</title>
    <link rel="stylesheet" href="/res/css/style.css">
    <script>
        if (path.includes("?lang=") >= 1) {} else {
            location.href = location.href + "?lang=" + navigator.language.substr(0,2);
        }
        var account
    </script>
</head>
<body style="margin: 0;height: 100%;overflow-x: hidden;">
    <div class="loader centered" id="loader" style="display: none;">
        <img src="/res/img/loader.gif" height=64px width=64px alt="(loader)" /><br>
        <span><?= $lang_loading ?></span>
    </div>
    <div class="when-no-js centered" id="when-no-js">
        <img src="/res/img/error.png" height=64px width=64px alt="(error)" /><br>
        <span style="font-size:24px;"><b><?= $lang_jserror_title ?></b></span><br>
        <span style="font-size:18px;"><?= $lang_jserror_body ?></span>
    </div>
    <div class="too-little centered hide" id="lowres">
        <img src="/res/img/screen.png" height=64px width=64px alt="(screen)" /><br>
        <span style="font-size:18px;"><b><?= $lang_screenerr_title ?></b></span><br>
        <span style="font-size:11px;"><?= $lang_screenerr_body ?></span>
    </div>

    <div class="logged-in hide" id="logged-in">
        <div class="navigator" style="z-index:4;">
            <img class="profile-picture homelink" id="profilepicture" src="/res/img/pploader.svg" onclick="nav_home()" />
            <span class="username homelink" onclick="nav_home()" id="username"><?= $lang_loading ?></span>
            <a class="logoff" onclick="logout()" style="margin-top: 0.8%;margin-right: 10px;"><?= $lang_navigator_logout ?></a>
            <span id="betaInfo" class="hide" style="float: right;margin-top: 0.8%;margin-right: 10px;color: white;background: orange;padding: 2px;font-size: 14px;border-width: 1px;border-radius: 5px;">BETA <span style="color: whitesmoke;font-weight: bold;">1.0</span></span>
            <span class="navigation">
                <a class="navlink" onclick="nav_account()"><?= $lang_navigator_account ?></a>
                <a class="navlink" onclick="nav_notes()"><?= $lang_navigator_notes ?></a>
                <a class="navlink" onclick="nav_security()"><?= $lang_navigator_security ?></a>
                <a class="navlink" onclick="nav_about()"><?= $lang_navigator_about ?></a>
            </span>
        </div>
    </div>

    <div class="default liel-noscroll centered hide" id="page_default">
        <span id="homeclock" style="margin-right:15px;"><b>---:---</b>:---</span>
        <img class="profile-picture-big" id="profilepicture2" src="/res/img/pploader.svg" />
        <span id="welcomeback" style="margin-left:15px;font-size:28px;"><?= $lang_home_goodday ?> </span>
    </div>
    
    <div class="account liel hide" id="page_account">
        <center><span class="bigtitle"><?= $lang_account_title ?></span></center>
        <div class="boxes3"><center><img src="/res/img/key.png" width=64px height=64px /><br>
        <span class="mediumtitle"><?= $lang_account_changepassword_title ?></span><br><br>
        <form id="changePassword">
            <input type="password" name="oldpass" id="oldpass" placeholder="<?= $lang_account_changepassword_old ?>"><br>
            <input type="password" name="newpass" id="newpass" placeholder="<?= $lang_account_changepassword_new ?>"><br>
            <input type="password" name="newpassc" id="newpassc" placeholder="<?= $lang_account_changepassword_confirm ?>"><br>
            <a class="jslink" id="cpsubmit" onclick="changePassword()"><?= $lang_account_changepassword_submit ?></a><br>
            <img class="hide" id="cploader" src="/res/img/loader.gif" width=32px height=32px />
        </form>
        </center></div>
        <div class="boxes3"><center>
            <img src="/res/img/delete_account.png" width=64px height=64px /><br>
            <span class="mediumtitle"><?= $lang_account_deleteaccount_title ?></span><br><br>
            <span><?= $lang_account_deleteaccount_desc ?></span><br>
            <a class="jslink" id="deleteaccount" onclick="deleteAccount()"><?= $lang_account_deleteaccount_submit ?></a><br>
            <img class="hide" id="daloader" src="/res/img/loader.gif" width=32px height=32px />
        </center></div>
        <div class="boxes3"><center>
            <img src="/res/img/profile_picture.png" width=64px height=64px /><br>
            <span class="mediumtitle"><?= $lang_profilepicture_title ?></span><br>
            <span><?= $lang_profilepicture_desc ?></span><br>
            <input id="pp_file" type="file" name="pp_file" /><br>
            <button id="pp_upload" class="jslink" style="background: none;border: none;padding: 0;font-family: 'Calibri','Segoe UI','Arial','Liberation Sans',sans-serif;font-size: 16px;"><?= $lang_profilepicture_submit ?></button> | <a class="jslink" href="/" id="download_pp" download="profile-picture.png"><?= $lang_profilepicture_download ?></a>
        </center></div>
        <div class="boxes3"><center>
            <img src="/res/img/remove_tokens.png" width=64px height=64px /><br>
            <span class="mediumtitle"><?= $lang_forcelogout_title ?></span><br>
            <span><?= $lang_forcelogout_desc ?></span><br>
            <a class="jslink" id="forcelogout" onclick="forceLogout()"><?= $lang_forcelogout_submit ?></a><br>
            <img class="hide" id="flloader" src="/res/img/loader.gif" width=32px height=32px />
        </center></div>
        <div class="boxes3"><center>
            <img src="/res/img/audio-feedback.png" width=64px height=64px /><br>
            <span class="mediumtitle"><?= $lang_sfxopt_title ?></span><br>
            <span><?= $lang_sfxopt_desc ?></span><br>
            <a class="jslink" id="sfxoptEnable" onclick="toggleSfxOpt()"><?= $lang_sfxopt_enable ?></a>
            <a class="jslink" id="sfxoptDisable" onclick="toggleSfxOpt()"><?= $lang_sfxopt_disable ?></a>
            <img class="hide" id="sfxoptLoader" src="/res/img/loader.gif" width=32px height=32px />
        </center></div>
        <div class="boxes3"><center>
            <img src="/res/img/advanced.png" width=64px height=64px /><br>
            <span class="mediumtitle"><?= $lang_devopt_title ?></span><br>
            <span><?= $lang_new_devopt_desc ?></span><br>
            <div style="height:55px;">
                <span style="float:left;">show_version_in_navigation</span> <a class="jslink" style="float:right;" id="ad-svin" onclick="toggleShowVersionInNavigation()">undefined</a><br>
                <span style="float:left;">show_profile_picture</span> <a class="jslink" style="float:right;" id="ad-spp" onclick="toggleShowProfilePicture()">true</a><br>
                <span style="float:left;">show_image_content</span> <a class="jslink" style="float:right;" id="ad-sic" onclick="toggleShowImageContent()">true</a>
            </div>
        </center></div>
    
    <style>

	[type="checkbox"]:not(:checked),
	[type="checkbox"]:checked {
		position: absolute;
		left: -9999px;
	}
	[type="checkbox"]:not(:checked) + label,
	[type="checkbox"]:checked + label {
		position: relative;
		padding-left: 25px;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 10px;
	}

	/* checkbox aspect */
	[type="checkbox"]:not(:checked) + label:before,
	[type="checkbox"]:checked + label:before {
		content: '';
		position: absolute;
		left:0; top: 2px;
		width: 17px; height: 17px;
		border: 1px solid #aaa;
		background: #f8f8f8;
		border-radius: 3px;
		box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
	}
	/* checked mark aspect */
	[type="checkbox"]:not(:checked) + label:after,
	[type="checkbox"]:checked + label:after {
		content: '✔';
		position: absolute;
		top: 0; left: 4px;
		font-size: 14px;
		color: #09ad7e;
		line-height: 1.75;
		-webkit-transition: all .2s;
		-moz-transition: all .2s;
		-ms-transition: all .2s;
		transition: all .2s;
	}
	/* checked mark aspect changes */
	[type="checkbox"]:not(:checked) + label:after {
		opacity: 0;
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
	}
	[type="checkbox"]:checked + label:after {
		opacity: 1;
		-webkit-transform: scale(1);
		-moz-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}
	/* disabled checkbox */
	[type="checkbox"]:disabled:not(:checked) + label:before,
	[type="checkbox"]:disabled:checked + label:before {
		box-shadow: none;
		border-color: #bbb;
		background-color: #ddd;
	}
	[type="checkbox"]:disabled:checked + label:after {
		color: #999;
	}
	[type="checkbox"]:disabled + label {
		color: #aaa;
	}
	/* accessibility */
	[type="checkbox"]:checked:focus + label:before,
	[type="checkbox"]:not(:checked):focus + label:before {
		border: 1px dotted blue;
	}

	
    </style>

    </div>
    
    <div class="about liel hide" id="page_about">
        <center><span class="bigtitle"><?= $lang_about_title ?></span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <div id="betaBanner" class="betaBanner hide" style="padding: 10px;margin-left: 10%;margin-right: 10%;border-width: 1px;border-radius: 5px;background-color: #ffc458;margin-bottom: 10px;text-align: center;"><?= $lang_beta ?></div>
        <center><img src="/res/img/icon.png" width=64px height=64px /><br>
            <?= $lang_about_info ?>
        </center></div>
        
    </div>

    <div class="notes liel hide" id="page_notes">
        <center><span class="bigtitle"><?= $lang_notes_title ?></span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <center><img src="/res/img/note.png" width=64px height=64px /><br>
            <span id="notesph"><?= $lang_notes_loading ?></span>
        </center></div>
        
    </div>

    <div class="notes liel hide" id="page_notes_notecreator">
        <center><span class="bigtitle"><?= $lang_notecreator_title ?></span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <center><form id="notecreatorform"><input name="ncnotename" type="text" placeholder="<?= $lang_notecreator_placeholder ?>"></form>
            <span id="ncsubmit"><a onclick="validateNoteCreation()" class="jslink"><?= $lang_notecreator_submit ?></a></span>
            <span id="ncloader" class="hide"><?= $lang_notecreator_loading ?></span>
        </center></div>
    </div>

    <div class="notes liel hide" id="page_notes_noterenamer">
        <center><span class="bigtitle" id="nrtitle"><?= $lang_noterenamer_title ?></span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <center><form id="noterenamerform"><input name="nrnotename" type="text" placeholder="<?= $lang_noterenamer_placeholder ?>"></form>
            <span id="nrsubmit"><a onclick="validateNoteRename()" class="jslink"><?= $lang_noterenamer_submit ?></a></span>
            <span id="nrloader" class="hide"><?= $lang_noterename_loading ?></span>
        </center></div>
    </div>

    <div class="notes liel hide" id="page_notes_noteeditor">
        <center><span class="bigtitle" id="netitle"><?= $lang_noteeditor_title ?>%noteName%</span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <span id="ncsubmit"><a onclick="renameNote()" class="jslink"><?= $lang_noteeditor_rename ?></a></span> | <span id="ncsubmit"><a onclick="deleteNote()" class="jslink"><?= $lang_noteeditor_delete ?></a></span><span id="filesize"><?= $lang_noteeditor_estimating ?></span><br>
        <center><textarea name="nenote" id="nenote" type="text" style="font-family: sans-serif; width: 462px; height: 187px;">%noteContent%</textarea><br>
            <span id="nesubmit"><a onclick="saveNote()" class="jslink"><?= $lang_noteeditor_save ?></a></span>
            <span id="currentNote" class="hide">%noteName%</span>
            <span id="neloader" class="hide"><?= $lang_noteeditor_saving ?></span>
        </center></div>
    </div>

    <div class="security liel hide" id="page_security">
        <center><span class="bigtitle"><?= $lang_security_title ?></span></center>
        <div class="boxes3" style="margin-bottom: calc(100vh - 460px + 25px);">
        <center><img src="/res/img/history.png" width=64px height=64px /><br>
        </center>
        <div style="background: #ff4d4d;margin: 5px;padding: 10px;border-radius: 5px;box-shadow: 1px 1px 12px #ff4d4d;">
            <table>
                <tr>
                    <td>
                        <img src="/res/img/info.png" alt="(i)" width="32px" height="32px" style="filter: invert(80%);">
                    </td>
                    <td style="padding-left: 10px;">
                        <?= $lang_history_warn ?>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <center><?= $lang_history_disclaimer ?><br><span id="historyc"><?= $lang_history_loader ?></span></center></div>
        
    </div>
    
    <div class="stb centered hide littleTransparency" id="daconfirm">
        <div class="daconfirm errorbox centered">
            <img width=32px height=32px src="/res/img/delete_account.png" /><br>
            <span class="mediumtitle"><?= $lang_daconfirm_title ?></span><br>
            <span><?= $lang_daconfirm_info ?></span><br>
            <span style="float:left" id="dawait"><?= $lang_daconfirm_wait ?></span>
            <span class="jslink hide" id="dasubmit" style="float:left" onclick="dasubmit()"><?= $lang_daconfirm_submit ?></span>
            <span class="jslink" id="dacancel" style="float:right" onclick="dacancel()"><?= $lang_daconfirm_cancel ?></span><br>
        </div>
    </div>
    
    <div class="stb centered hide littleTransparency" id="errorbox">
        <div class="errorbox centered">
            <img width=32px height=32px src="/res/img/error.png" /><br>
            <span class="mediumtitle"><?= $lang_errorbox_title ?></span><br>
            <span id="errorboxmessage"><?= $lang_errorbox_title ?></span><br>
            <a class="jslink" onclick="dismissError()"><?= $lang_errorbox_close ?></a>
        </div>
    </div>
    
    <div class="stb centered hide littleTransparency" id="successbox">
        <div class="successbox centered">
            <img width=32px height=32px src="/res/img/ok.png" /><br>
            <span class="mediumtitle"><?= $lang_successbox_title ?></span><br>
            <span id="successboxmessage"><?= $lang_successbox_title ?></span><br>
            <a class="jslink" onclick="dismissSuccess()"><?= $lang_successbox_close ?></a>
        </div>
    </div>

    <div class="loader2 hide" id="loader2">
            <img src="/res/img/loader.gif" class="loader2-img centered" height=64px width=64px alt="(loader)" />
    </div>

    <div class="login centered hide littleTransparency" style="display:none !important;" id="login">
        <img src="/res/img/icon.png" height=64px width=64px alt="Minteck Projects" /><br>
        <span style="font-size:24px;"><b><?= $lang_login_title ?></b></span><br>
        <form id="loginform">
            <input type="text" class="input-text" id="user" name="user" placeholder="<?= $lang_login_username ?>"><br>
            <input type="password" class="input-text" id="pass" name="pass" placeholder="<?= $lang_login_password ?>"><br>
            <span class="tip"><?= $lang_login_hint ?></span><br style="margin-bottom: 15px;">
            <a onclick="login_submit()" class="account-submit"><?= $lang_login_submit ?></a><br><br>
            <small><a onclick="login_notyet()" style="margin-top:5px;" class="jslink"><?= $lang_login_notyet ?></a> | <?= $lang_switchlang ?></small>
        </form>
    </div>

    <div class="signup centered hide littleTransparency" id="signup">
        <img src="/res/img/icon.png" height=64px width=64px alt="Minteck Projects" /><br>
        <span style="font-size:24px;"><b><?= $lang_signup_title ?></b></span><br>
        <form id="signupform">
            <input type="text" class="input-text" id="user" name="user" placeholder="<?= $lang_login_username ?>"><br>
            <input type="password" class="input-text" id="pass" name="pass" placeholder="<?= $lang_login_password ?>"><br>
            <input type="password" class="input-text" id="passvalidate" name="pass-validate" placeholder="<?= $lang_signup_passconf ?>"><br>
            <span class="tip"><?= $lang_signup_hint ?></span><br style="margin-bottom: 15px;">
            <a onclick="signup_submit()" class="account-submit"><?= $lang_signup_submit ?></a><br><br>
            <small><a onclick="signup_already()" style="margin-top:5px;" class="jslink"><?= $lang_signup_already ?></a> | <?= $lang_switchlang ?></small>
        </form>
    </div>

    <div class="stb centered hide littleTransparency" id="signup-success">
        <div class="signup-success" style="padding-bottom:25px;">
            <img src="/res/img/ok.png" height=64px width=64px alt="(OK)" /><br>
            <span style="font-size:24px;"><b><?= $lang_supok_title ?></b></span><br>
            <span style="font-size:18px;padding-bottom:15px;"><?= $lang_supok_body ?></span><br><br>
            <a onclick="login_fromSignup()" class="account-submit"><?= $lang_supok_button ?></a>
        </div>
    </div>

    <div class="stb centered hide littleTransparency" id="login-error">
        <div class="login-error" style="padding-bottom:25px;">
            <img src="/res/img/error.png" height=64px width=64px alt="(error)" /><br>
            <span style="font-size:24px;"><b><?= $lang_loginerror_title ?></b></span><br>
            <span id="login-error-message" style="font-size:18px;padding-bottom:15px;"><?= $lang_loginerror_title ?></span><br><br>
            <a onclick="login_retry()" class="account-submit"><?= $lang_login_returnToPrompt ?></a>
        </div>
    </div>
    
    <div class="stb centered hide littleTransparency" id="signup-error">
        <div class="signup-error centered littleTransparency" style="padding-bottom:25px;">
            <img src="/res/img/error.png" height=64px width=64px alt="(error)" /><br>
            <span style="font-size:24px;"><b><?= $lang_loginerror_title ?></b></span><br>
            <span id="signup-error-message" style="font-size:18px;padding-bottom:15px;"><?= $lang_loginerror_title ?></span><br><br>
            <a onclick="signup_retry()" class="account-submit"><?= $lang_login_returnToPrompt ?></a>
        </div>
    </div>
    
    <div class="stb centered hide littleTransparency" id="offline">
        <div class="offline centered littleTransparency">
            <img src="/res/img/offline.png" height=64px width=64px alt="(offline)" /><br>
            <span style="font-size:24px;"><b><?= $lang_offline_title ?></b></span><br>
            <span style="font-size:18px;"><?= $lang_offline_body ?></span>
        </div>
    </div>

    <script src="/res/js/jquery.js"></script>
    <script src="/res/js/sessionManager.js"></script>
    <script src="/res/js/uiButtons.js"></script>
    <script src="/res/js/uiAnimate.js"></script>
    <script src="/res/js/soundLib.js"></script>
    <script src="/res/js/notesManager.js"></script>
    <script src="/res/js/warner.js"></script>
    <script src="/res/js/navigator.js"></script>
    <script src="/res/js/errorHandler.js"></script>

    <script>
    document.getElementById('when-no-js').classList.add('hide')
    var windowSize = $(window).width(); 
        if(windowSize < 740){
                    lowresStart();
                }
    $(window).on('resize', function(event){
        windowSize = $(window).width(); 
        if(windowSize < 740){
                    lowresStart();
                }
    });
    
    var loginErrorMessage1 = "<?= $lang_loginerror_type1 ?>";
    var loginErrorMessage2 = "<?= $lang_loginerror_type2 ?>";
    var loginErrorMessage3 = "<?= $lang_loginerror_type3 ?>";
    var loginErrorMessage4 = "<?= $lang_loginerror_type4 ?>";
    var signupErrorMessage1 = "<?= $lang_superror_type1 ?>";
    var signupErrorMessage2 = "<?= $lang_superror_type2 ?>";
    var signupErrorMessage3 = "<?= $lang_superror_type3 ?>";
    var signupErrorMessage4 = "<?= $lang_superror_type4 ?>";

    checkLogon();

    var version = "<?= $properties_version ?>"
    var build = "<?= $properties_build ?>"

    </script>

    <script src="/res/js/beta.js"></script>

    <script>
        // document.getElementById('login').classList.remove('hide');
    </script>

    <div class="stb centered hide littleTransparency" id="privacy_fr">
        <div class="privacy centered" style="height: 40%;width: 60%;">
            <span class="privacyTitle"><?= $lang_privacy ?></span><span class="privacyClose" onclick="hideFade('privacy_fr')">X</span><br>
            <div class="privacyText">
                <div class="WordSection1"><p class="MsoTitle" style="font-size:36px;font-weight:bolder;margin:16px 0">Politique de confidentialité Minteck Projects</p><h1>Préambule</h1><p class="MsoNormal">Chez Minteck Projects, votre sécurité est notre priorité. Nousrespectons votre vie privée est sommes entièrement responsable de toute fuiteou utilisation détournée de ces dernières.</p><p class="MsoNormal">La politique de confidentialité suivante s’applique à tousles services Minteck Projects, et doit être acceptée pour avoir la meilleur expérience.</p><h1>1. Informations personnelles</h1><h2 style="margin-left:35.4pt">1a. Quelles informations recueillons-nous&nbsp;?</h2><p class="MsoNormal" style="margin-left:70.8pt">Chaque seconde, au moins uneinformation personnelle concernant quelqu’un est collectée. Chez Minteck Projects,nous essayons de collecter le moins d’informations personnelles possibles.</p><p class="MsoNormal" style="margin-left:70.8pt">Nous pouvons collecter vosinteractions avec le site qui seront utilisées à des fins de statistiques, maisvous pourrez interdire cela.</p><p class="MsoNormal" style="margin-left:70.8pt">Ces informations peuvent êtrecollectées et vous être envoyées :</p><p class="MsoListParagraphCxSpFirst" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Position</p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date et heure</p><p class="MsoListParagraphCxSpLast" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Informations sur le navigateur</p><p class="MsoNormal" style="margin-left:70.8pt">Ces informations seront aussienregistrées dans nos fichiers journaux :</p><p class="MsoListParagraphCxSpFirst" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Adresse Internet (IP)</p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Date et heure</p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Page demandée</p><p class="MsoListParagraphCxSpLast" style="margin-left:106.8pt;text-indent:-18.0pt">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Informations sur le navigateur</p><p class="MsoNormal" style="margin-left:70.8pt">Nous n’utilisons pas de logiciel(s)espion et ne collectons pas d’informations sans vous concerner.</p><h2 style="margin-left:35.4pt">1b. Comment nous utilisons vos données&nbsp;?</h2><p class="MsoNormal" style="margin-left:70.8pt">Ces informations ne quittent jamaisnos serveurs, et ne sont pas vendues à des entreprises de tierce partie. </p><p class="MsoNormal" style="margin-left:70.8pt">Nous essayons d’être conforme auRGPD le plus possible lorsque nous collectons certaines de vos données.</p><h1>2. Cookies</h1><h2 style="margin-left:35.4pt">2a. Que sont les cookies&nbsp;?</h2><p class="MsoNormal" style="margin-left:70.8pt">Les cookies sont de petitesinformations laissées par les sites Web sur votre navigateur. Ils servent leplus souvent à partager des données de pistage entre les différents sites.</p><h2 style="margin-left:35.4pt">2b. Pourquoi nous utilisons des cookies&nbsp;?</h2><p class="MsoNormal" style="margin-left:70.8pt">Les cookies sont requis pourfaire fonctionner nos sites. Nous utilisons des cookies pour vous garderconnecté à un site Web, et uniquement pour ça.</p><p class="MsoNormal" style="margin-left:70.8pt">Nos cookies ne sont pas utilizes pourle pistage.</p><h1>3. Sécurité</h1><h2 style="margin-left:35.4pt">3a. Stockage sécurisé</h2><p class="MsoNormal" style="margin-left:70.8pt">En utilisant nos services, nosstockons vos données dans des espaces de stockage sécurisés. Ces espacessécurisés ne sont pas accessibles au public, et leurs données sont vérifiées tousles mois.</p><p class="MsoNormal" style="margin-left:70.8pt">Nous verifions chaque requête à nosserveurs, and automatically block piracy tries.</p><h2 style="margin-left:35.4pt">3b. Récupérez vos données</h2><p class="MsoNormal" style="margin-left:70.8pt">Certaines personnes peuventvouloir savoir quelles données nous avons vous concernant. Si vous voulezobtenir une copie de vos données, demander leur suppression, ou les modifier, envoyezun courrier électronique à <a href="mailto:minteck-projects@europe.com">minteck-projects@europe.com</a>,nous vous répondrons dans environ 1 semaine.</p><p class="MsoNormal" style="margin-left:70.8pt">Vous ne pouvez pas récupérer lesdonnées stockées dans les journaux, mais vous pourrez récupérer votre Base deDonnées Utilisateur PinPages, ou votre Stockage du Compte Minteck Projects.</p><h2 style="margin-left:35.4pt">3c. Demande légale</h2><p class="MsoNormal" style="margin-left:70.8pt">Si vos données sont demandéespour des actions légales importantes, nous leur donneront uniquement s’ils respectentla politique de confidentialité en vigueur.</p><h2 style="margin-left:35.4pt">3d. Télémétrie</h2><p class="MsoNormal" style="margin-left:70.8pt">Si vous avez autorisé cela, nouscollecterons des données anonymes, incluant les rapports de plantage et de bogues,vos statistiques d’utilisation quotidienne, et plus, afin d’améliorer l’expérienceavec nous services.</p><p class="MsoNormal" style="margin-left:70.8pt">Autoriser la télémétrie est uneoption.</p><h1>4. Contenu pour personnes de tout âge</h1><p class="MsoNormal" style="margin-left:35.4pt">Pour la sécurité de votre enfant,nous pouvons collecter des informations concernant son utilisation de nosservices afin d’améliorer la classification d’âge des contenus.</p><p class="MsoNormal" style="margin-left:35.4pt">Cela fait partie de la télémétrie(Article 3d), et ne s’applique que si vous avez activé le contrôle parental.</p><h1>5. Crédits et contact</h1><p class="MsoNormal" style="margin-left:35.4pt">Cette politique deconfidentialité fut rédigée par l’équipe Minteck Projects, et s’applique pourle monde entier.</p><p class="MsoNormal" style="margin-left:35.4pt">Elle peut changer par le futur, etnous vous recommandons de la consulter régulièrement. La traduction dans d’autreslangues peut ne pas être précise à 100%.</p><p class="MsoNormal" style="margin-left:35.4pt">Si vous voulez nous contacter àpropos de la politique de confidentialité, ou à propos de quoi que ce soit d’autre,envoyez un courrier électronique à l’adresse suivante :</p><p class="MsoNormal" style="margin-left:35.4pt"><a href="mailto:minteck-projects@europe.com">minteck-projects@europe.com</a></p><p class="MsoNormal" style="margin-left:35.4pt">&nbsp;</p></div>
        </div>
    </div>

    <div class="stb centered hide littleTransparency" id="privacy_en">
        <div class="privacy centered" style="height: 40%;width: 60%;">
            <span class="privacyTitle"><?= $lang_privacy ?></span><span class="privacyClose" onclick="hideFade('privacy_en')">X</span><br>
            <div class="privacyText">
                <div class="WordSection1"><p class="MsoTitle"><span style="font-size:36px;font-weight:bolder" lang="EN-US">Minteck Projects Privacy Policy</span></p><h1><span lang="EN-US">Preamble</span></h1><p class="MsoNormal"><span lang="EN-US">With Minteck Projects, your security is our priority. We value your privacy and are entirely responsible of any leak or misuse of your data.</span></p><p class="MsoNormal"><span lang="EN-US">The following Privacy Policy applies to all our services, and needs to be agreed if you want to have a great experience.</span></p><h1><span lang="EN-US">1. Personal Information</span></h1><h2 style="margin-left:35.4pt"><span lang="EN-US">1a. What info we collect?</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Every second, a personal information about someone is collected. On Minteck Projects, we try to collect minimal personal information.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">We might collect your interactions with the website for statistics purpose, but we let you disable that.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">We can collect this info that will be sent to you:</span></p><p class="MsoListParagraphCxSpFirst" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Location</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Time and date</span></p><p class="MsoListParagraphCxSpLast" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Browser information</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">And we can collect this info for our logs:</span></p><p class="MsoListParagraphCxSpFirst" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">IP address</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Time and date</span></p><p class="MsoListParagraphCxSpMiddle" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Page loaded</span></p><p class="MsoListParagraphCxSpLast" style="margin-left:106.8pt;text-indent:-18.0pt"><span lang="EN-US">-<span style="font:7.0pt &quot;Times New Roman&quot">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-US">Browser information</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">We don’t use spyware and we don’t collect data without the consent of the user.</span></p><h2 style="margin-left:35.4pt"><span lang="EN-US">1b. How we use this info?</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">This infousually never leaves our servers, and isn’t sold with third party corporates. </span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">We try to beGDPR compliant when collecting your data.</span></p><h1><span lang="EN-US">2. Cookies</span></h1><h2 style="margin-left:35.4pt"><span lang="EN-US">2a. What are cookies?</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Cookies arelittle info let by websites on your browser. They’re mostly used to sharetracking info within different websites.</span></p><h2 style="margin-left:35.4pt"><span lang="EN-US">2b. Why we use cookies?</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Cookies arerequired to keep our websites working. We use cookies to keep you logged in toa website, and only for that.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Our cookiesaren’t used for tracking.</span></p><h1><span lang="EN-US">3. Security</span></h1><h2 style="margin-left:35.4pt"><span lang="EN-US">3a. Secured storage</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">When using ourwebsites, we store your data to a secured storage space. This secured storagespace isn’t accessible publicly, and this data is reviewed monthly.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">We check everyrequest to our servers, and automatically block piracy tries.</span></p><h2 style="margin-left:35.4pt"><span lang="EN-US">3b. Get your data</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Some people maywant to know what data we have about us. If you want to get a copy of yourdata, delete all your data, or edit your data, just send an email to </span><a href="mailto:minteck-projects@europe.com"><span lang="EN-US">minteck-projects@europe.com</span></a><span lang="EN-US">, we’ll answer you in about 1 week.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">You can’t getyour data that is stored from logs, but you can get data such as your PinPagesUser Database, or your Minteck Projects Account Storage.</span></p><h2 style="margin-left:35.4pt"><span lang="EN-US">3c. Legal requirement</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">If your data isrequired for important legal actions, we’ll give this data only if the legalcompany that ask for your data follow the terms of this Privacy Policy.</span></p><h2 style="margin-left:35.4pt"><span lang="EN-US">3d. Telemetry</span></h2><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">If you allowedthat, we’ll collect anonymous usage data, including crash and bugs reports,your daily usage statistics, and more, to improve the experience with ourservices.</span></p><p class="MsoNormal" style="margin-left:70.8pt"><span lang="EN-US">Allowingtelemetry is absolutely an optional thing.</span></p><h1><span lang="EN-US">4. Child-safe content</span></h1><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">For the safetyof your children, we may collect some info concerning its usage to helpblocking chocking content.</span></p><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">It’s a part ofthe Telemetry section (Article 3d), and only applies if you enable parentalcontrol.</span></p><h1><span lang="EN-US">5. Credits and contact</span></h1><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">This Privacy Policywas written by the Minteck Projects team, and apply all over the world.</span></p><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">It may change onthe future, so check it regularly. The translation in other languages may notbe 100% accurate.</span></p><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">If you want tocontact us about something in our Privacy Policy, or anything else, just sendan email to the following address:</span></p><p class="MsoNormal" style="margin-left:35.4pt"><a href="mailto:minteck-projects@europe.com"><span lang="EN-US">minteck-projects@europe.com</span></a></p><p class="MsoNormal" style="margin-left:35.4pt"><span lang="EN-US">&nbsp;</span></p></div>
            </div>
        </div>
    </div>

</body>
</html>