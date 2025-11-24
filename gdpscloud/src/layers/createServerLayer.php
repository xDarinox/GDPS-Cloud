<?php
    include __DIR__ . '/../../src/client/cookies.php';
?>

<div class="create-server-popup" data-showed="false">
    <div class="create-server-container-form">
            <span class="create-server-close-button" onclick="onCreateServer()">
                <img src="src/svg/close-md.svg" style="width:2.2vh">
            </span>

            <div class="create-server-input-content">
                <label class="create-server-input-label">
                    <p style="color:#ff6d62;font-family:Arial,Helvetica,sans-serif;font-size:2.3vh">*</p>
                    Название сервера:
                </label>
                <input type="text" id="server_name" class="create-server-input" maxlength="32" placeholder="Введите название сервера" />
            </div>

            <button class="create-server-event-button" onclick="onCreateServerEvent()">Создать</button>
            <h5 class="create-server-error-handler"></h5>
    </div>
</div>

<style>
    .create-server-popup {
        position: fixed;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        background: #00000080;
        z-index: 160;
        display: none;
        align-items: center;
        justify-content: center;
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
    }

    .create-server-container-form {
        opacity: 0%;
        animation-fill-mode: forwards;
        animation-duration: 0.15s;
        animation-timing-function: linear;
        padding: 5vh 2vh 2vh 2vh;
        background-color: #101010;
        border: 1px solid rgba(255, 255, 255, .1);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-direction: column;
        border-radius: 2vh;
        min-width: 30vh;
        width: 36vh;
        /* height: -webkit-fill-available; */
        position: relative;
    }

    .create-server-close-button {
        position: absolute;
        left: 0;
        top: 0;
        margin-top: 1vh;
        margin-left: 1vh;
    }

    .create-server-input-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
        gap: 1vh;
        width: 100%;
    }

    .create-server-input-label {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 100%;
        font-family: var(--defaultFont);
        gap: 0.6vh;
    }

    .create-server-input {   
        background: black;
        width: 100%;
        border: 1.6px solid #00000000;
        padding: 1.2vh 1.5vh;
        border-radius: 1.2vh;
        transition: .2s;
    }

    .create-server-input:focus {
        outline-style: solid;
        outline-width: 0.6vh;
        outline-color: #d9b9901f;
        border: 1.6px solid #d9b990;
    }

    .create-server-event-button {
        width: 100%;
        padding: 1.4vh;
        border-radius: 1vh;
        margin-top: 1vh;
        font-family: var(--defaultFont);
        color: black;
    }

    .create-server-error-handler {
        text-align: left;
        width: 100%;
        font-family: var(--defaultFont);
        color:#ff6d62;
        margin-top: 1vh;
    }

    .or-text-line-split {
        color: #ffffff24;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.65vh;
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
        margin-top: 0.5vh;
        font-size: 1.45vh;
    }

    .or-text-line-split:before,
    .or-text-line-split:after {
        content: '';
        background: #ffffff24;
        height: 1px;
        flex: 1;
    }

    .text-no-account {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        font-family: var(--defaultFont);
        gap: 1vh;
        margin-top: 0.75vh;
    }
</style>

<script>
    // Checks for only english letters.
    $('body').on('input','#server_name', function(){this.value=this.value.replace(/[^a-z0-9\s]/gi,'')});

    function makeSessionID() {
        var result = '';
        var characters = '_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-';
        var charactersLength = characters.length;
        for( var i = 0; i < 40; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return '_' + result;
    }

    function onLogin() {
        const loginPopup = document.querySelector('.login-popup');
        const loginLayer = document.querySelector('.login-container-form');

        if(loginPopup.dataset.showed != 'true') {
            mainLayer.style.overflowY = 'hidden';
            loginLayer.style.animationName = 'fromUp';
            loginPopup.style.display = 'flex';
            loginPopup.dataset.showed = true;
            
        } else if (loginPopup.dataset.showed == 'true') {
            mainLayer.style.overflowY = 'scroll';
            loginLayer.style.animationName = 'toUp';
            loginPopup.style.display = 'none';
            loginPopup.dataset.showed = false;
        }
    }

    function onLoginEvent() {
        const loginPopup = document.querySelector('.login-popup');
        const loginValue = document.querySelector('#login_uname').value;
        const passwordValue = document.querySelector('#login_password').value;
        const key = makeSessionID();
        const userAgent = navigator.userAgent;
        const error = document.querySelector('.error-handler');

        if(loginValue === "" || passwordValue === "") error.innerHTML = 'Пустые поля ввода!';
        else {
            $.post(
                'https://api.darinoxgdps.ru/v1/hosting/accounts/loginAccount.php',
                {"uname": loginValue, "password": sha1(passwordValue + 'mI29fmAnxgTs'), "key": key, "agent": userAgent + '|' + getDevice(), "secret": '_uHWFOEyVkH6xsw'},
                responseText => {
                    if(responseText == '-1') error.innerHTML = 'Ошибка подключения! (Код ошибки: ' + responseText + ')';
                    else if(responseText == '-2') error.innerHTML = 'Неверный пароль! (Код ошибки: ' + responseText + ')';
                    else if(responseText == '-3') error.innerHTML = 'Ваш аккаунт заблокирован! (Код ошибки: ' + responseText + ')';
                    else if(responseText == '-4') error.innerHTML = 'Пользователь не найден! (Код ошибки: ' + responseText + ')';
                    else if(responseText == '-5') error.innerHTML = 'Ваш аккаунт не активирован! (Код ошибки: ' + responseText + ')';
                    else 
                    {
                        mainLayer.style.overflowY = 'scroll';
                        loginPopup.style.display = 'none';
                        loginPopup.dataset.showed = false;
                        Cookies.setCookie('udid', key, 7);
                        Cookies.setCookie('userID', responseText.split(":")[1], 7);
                        Cookies.setCookie('uname', responseText.split(":")[3], 7);
                        Cookies.setCookie('email', responseText.split(":")[5], 7);
                        Cookies.setCookie('avatar', responseText.split(":")[7], 7);
                        location.reload();
                    }
                }
            );  
        }
    }

    function onCreateServer() {
        const createSeverPopup = document.querySelector('.create-server-popup');
        const createSeverLayer = document.querySelector('.create-server-container-form');

        if(createSeverPopup.dataset.showed != 'true') {
            mainLayer.style.overflowY = 'hidden';
            createSeverLayer.style.animationName = 'fromUp';
            createSeverPopup.style.display = 'flex';
            createSeverPopup.dataset.showed = true;
        } else if(createSeverPopup.dataset.showed == 'true') {
            mainLayer.style.overflowY = 'scroll';
            createSeverLayer.style.animationName = 'toUp';
            createSeverPopup.style.display = 'none';
            createSeverPopup.dataset.showed = false;
        }
    }

    function onCreateServerEvent() {
        const createSeverPopup = document.querySelector('.create-server-popup');
        const serverName = document.querySelector('#server_name').value;
        const error = document.querySelector('.create-server-error-handler');

        if(serverName === "") error.innerHTML = 'Введите название сервера!';
        else {
            $.post(
                'https://api.darinoxgdps.ru/v1/hosting/createServer.php',
                {"userID": <?= $s_udid !== '' ? $s_userID : 0 ?>, "serverName": serverName, "tarrif": 'free', "secret": '_uHWFOEyVkH6xsw'},
                responseText => {
                    if(responseText == '-1') error.innerHTML = 'Ошибка подключения! (Код ошибки: ' + responseText + ')';
                    else 
                    {
                        Cookies.setCookie('servers', responseText, 7);
                        createSeverPopup.style.display = 'none';
                        createSeverPopup.dataset.showed = false;
                    }
                }
            );  
        }
    }
</script>