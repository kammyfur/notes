var token;

function nextPage() {
    $("#Login_Comp").fadeOut(2000)
    $("#Login_Loader").fadeIn(2000)
    
    setTimeout(() => {
        if (document.getElementById('Login_User').value.trim() == "") {
            document.getElementById('Login_User').placeholder = lang_new_login_error1
            document.getElementById('Login_User').classList.add("Login_InputErr")
            setTimeout(() => {
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
        } else {
            document.getElementById('Login_NextUser').classList.add("hide")
            document.getElementById('Login_NextPass').classList.remove("hide")
            document.getElementById('Login_Password').classList.remove('hide')
            document.getElementById('Login_User').classList.add('hide')
            document.getElementById('Login_Title').innerHTML = lang_new_login_confirm + document.getElementById('Login_User').value
            setTimeout(() => {
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 4000)
        }
    }, 2000)
}

function replaceCookieByToken() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
    document.cookie = "token=" + token.replace("<br />","") + ";path=/";
}

function endPage() {
    $("#Login_Comp").fadeOut(2000)
    $("#Login_Loader").fadeIn(2000)
    
    setTimeout(() => {
    request = "/api/ssl-login.php"
    ssldata = new FormData()
    ssldata.append("user", document.getElementById('Login_User').value)
    ssldata.append("pass", document.getElementById('Login_Password').value)
    $.ajax({
        url: request,
        dataType: 'html',
        cache: false,
        data: ssldata,
        contentType: false,
        processData: false,
        type: 'post',
        success: function (data) {
            statusText = data;
            if (statusText.startsWith("token=")) {
                token = statusText.replace("token=","")
                replaceCookieByToken()
                if (oback) {
                    if (oback != null || oback != "") {
                        if (oback.trim() != "") {
                            location.href = "/@/oauth2/?lang=" + lang + "&clientid=" + oback;
                        } else {
                            location.href = "/?lang=" + lang;
                        }
                    } else {
                        location.href = "/?lang=" + lang;
                    }
                } else {
                    location.href = "/?lang=" + lang;
                }
                return;
            }
            if (statusText.startsWith("user_nfound")) {
                document.getElementById('Login_User').placeholder = lang_new_login_error2
            document.getElementById('Login_User').classList.add("Login_InputErr")
            setTimeout(() => {
                document.getElementById('Login_User').value = "";
                document.getElementById('Login_Password').value = "";
                document.getElementById('Login_NextUser').classList.remove("hide")
                document.getElementById('Login_NextPass').classList.add("hide")
                document.getElementById('Login_Password').classList.add('hide')
                document.getElementById('Login_User').classList.remove('hide')
                document.getElementById('Login_Title').innerHTML = lang_new_login_home
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
            return;
            }
            if (statusText.startsWith("pass_inv")) {
                document.getElementById('Login_Password').value = "";
                document.getElementById('Login_Password').placeholder = lang_new_login_error4
            document.getElementById('Login_Password').classList.add("Login_InputErr")
            setTimeout(() => {
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
            return;
            }
            if (statusText.startsWith("pass_empty")) {
                document.getElementById('Login_Password').value = "";
                document.getElementById('Login_Password').placeholder = lang_new_login_error5
            document.getElementById('Login_Password').classList.add("Login_InputErr")
            setTimeout(() => {
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
            return;
            }
            if (statusText.startsWith("user_empty")) {
                document.getElementById('Login_User').value = "";
                document.getElementById('Login_Password').value = "";
                document.getElementById('Login_User').placeholder = lang_new_login_error1
            document.getElementById('Login_User').classList.add("Login_InputErr")
            setTimeout(() => {
                document.getElementById('Login_NextUser').classList.remove("hide")
                document.getElementById('Login_NextPass').classList.add("hide")
                document.getElementById('Login_Password').classList.add('hide')
                document.getElementById('Login_User').classList.remove('hide')
                document.getElementById('Login_Title').innerHTML = lang_new_login_home
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
            return;
            } else {
                document.getElementById('Login_Password').placeholder = lang_new_login_error3
            document.getElementById('Login_Password').classList.add("Login_InputErr")
            setTimeout(() => {
                $("#Login_Loader").fadeOut(2000)
                $("#Login_Comp").fadeIn(2000)
            }, 1000)
            }
    }})
    }, 2000)

    // setTimeout(() => {
    //     if (document.getElementById('Login_User').value.trim() == "") {
    //         document.getElementById('Login_User').placeholder = lang_new_login_error1
    //         document.getElementById('Login_User').classList.add("Login_InputErr")
    //         setTimeout(() => {
    //             $("#Login_Loader").fadeOut(2000)
    //             $("#Login_Comp").fadeIn(2000)
    //         }, 1000)
    //     } else {
    //         document.getElementById('Login_NextUser').classList.add("hide")
    //         document.getElementById('Login_NextPass').classList.remove("hide")
    //         document.getElementById('Login_Password').classList.remove('hide')
    //         document.getElementById('Login_User').classList.add('hide')
    //         document.getElementById('Login_Title').innerHTML = lang_new_login_confirm + document.getElementById('Login_User').value
    //         setTimeout(() => {
    //             $("#Login_Loader").fadeOut(2000)
    //             $("#Login_Comp").fadeIn(2000)
    //         }, 4000)
    //     }
    // }, 2000)
}