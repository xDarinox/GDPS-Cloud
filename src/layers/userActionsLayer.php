<?php
    include __DIR__ . '/../../src/client/cookies.php';
?>

<div class="user-actions-popup" data-showed="false">
    <div class="user-actions-container">
        <span class="user-actions-close-button" onclick="onUserActions()">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 16l-4-4m0 0L8 8m4 4l4-4m-4 4l-4 4"/></svg>
        </span>
        <div class="user-actions-content">
            <div class="user-actions-avatar-content">
                <img src="<?= $s_avatar ?>" 
                     onerror="this.src='https:/\/avatars.githubusercontent.com/u/195661102?v=4?s=400'"
                     style="width:100%;height:100%"
                >
            </div>
            <h4 class="user-actions-uname-label"><?= $s_uname ?></h4>
        </div>
            

        <span class="user-actions-button">
            <h5 style="margin-left:1vh">Мой профиль</h5>
            <img src="src/svg/chevron-right-small.svg" style="filter:brightness(0.5)">
        </span>
        <span class="user-actions-button">
            <h5 style="margin-left:1vh">Мои серверы</h5>
            <img src="src/svg/chevron-right-small.svg" style="filter:brightness(0.5)">
        </span>

        <span class="user-actions-button" style="padding-bottom:0vh;border-bottom:1px solid rgb(0 0 0 / 0%)" onclick="onExitEvent()">
            <h5 style="margin-left:1vh;color:#ff6d62;">Выход из аккаунта</h5>
            <img src="src/svg/chevron-right-small.svg" style="filter:brightness(0.5)">
        </span>
    </div>
</div>

<style>
    .user-actions-popup {
        position: fixed;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        background: #00000035;
        z-index: 150;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .user-actions-avatar-content {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        min-height: 6vh;
        max-height: 6vh;
        min-width: 6vh;
        max-width: 6vh;
        border-radius: 6vh;
        overflow: hidden;
        margin-left: 1vh;
        margin-right: 1.5vh;
    }

    .user-actions-content {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        font-family: var(--defaultFont);
    }

    .user-actions-container {
        opacity: 0%;
        animation-fill-mode: forwards;
        animation-duration: 0.15s;
        animation-timing-function: linear;
        padding: 5vh 1.3vh 2vh 1.3vh;
        background-color: #101010;
        border: 1px solid rgba(255, 255, 255, .1);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-direction: column;
        gap: 1vh;
        border-radius: 2vh;
        min-width: 30vh;
        max-width: 30vh;
        right: 0%;
        position: absolute;
        margin-right: 4.3vw;
        margin-top: 0.5vw;
    }

    .user-actions-close-button {
        position: absolute;
        left: 0;
        top: 0;
        margin-top: 1vh;
        margin-left: 1vh;
    }

    .user-actions-button {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        padding: 0.25vh 0vh;
        font-family: var(--defaultFont);
        font-size: 1.9vh;
        padding-bottom: 1vh;
        border-bottom: 1px solid rgb(0 0 0 / 40%);
        transition: .33s;
    }

    .user-actions-button:hover {
        background: #161616;
    }

    .user-actions-button:active {
        background: #1a1a1a;
    }
</style>

<script>
    function onUserActions() {
        const userActionsPopup = document.querySelector('.user-actions-popup');
        const userActionsLayer = document.querySelector('.user-actions-container');

        if(userActionsPopup.dataset.showed != 'true') {
            mainLayer.style.overflowY = 'hidden';
            userActionsLayer.style.animationName = 'fromUp';
            userActionsPopup.style.display = 'flex';
            userActionsPopup.dataset.showed = true;
            console.log('opened!');
        } else if(userActionsPopup.dataset.showed == 'true') {
            mainLayer.style.overflowY = 'scroll';
            userActionsLayer.style.animationName = 'toUp';
            userActionsPopup.style.display = 'none';
            userActionsPopup.dataset.showed = false;
            console.log('closed!');
        }
    }
</script>