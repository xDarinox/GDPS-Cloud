<?php
    include __DIR__ . '/src/client/cookies.php';
?>

<!DOCTYPE php>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GDPS Cloud - xостинг приватных серверов по Geometry Dash.">
    <meta name="keywords" content="GDPS Cloud, GD, Geometry Dash, RobTop, Mobile, Game, PC-game, Online features, ГД, РобТоп, Мобильные, ПК, онлайн">
    <meta name="author" content="xDarinox">
    <meta name="generator" content="Microsoft Visual Studio Code">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#4285f4">
    <meta property="og:title" content="GDPS Cloud"> 
    <meta property="og:description" content="GDPS Cloud - xостинг приватных серверов по Geometry Dash."> 
    <meta property="og:image" content="https://example.com/image.jpg">
    <title>GDPS Cloud</title>
    <link rel="stylesheet" href="resources/css/m_main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.7.0/sha1.min.js"></script>
    <script src="https://cdn.forever-host.xyz/gdpscloud/cookies.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
    <header class="__header">
        <div class="__header-content">
            <span class="__header-logo">
                <img src="resources/images/main/cloud.png" draggable="false" style="width: 2.75vh">
                <h3 class="__header-logo-label">GDPS Cloud</h3>
            </span>

            <div class="sections-menu">
                <a href="" class="select-header-node">Главная</a>
                <span class="select-header-node-splitter">|</span>
                <a href="#tarrifs" class="select-header-node">Тарифы</a>
                <span class="select-header-node-splitter">|</span>
                <a href="#how-to-install" class="select-header-node">Серверы</a>
            </div>
            <?php if($s_udid && $s_udid !== ''): ?>
                <div onclick="onUserActions()" class="user-button-content">
                    <div class="user-avatar-content">
                        <img src="<?= $s_avatar ?>" 
                             onerror="this.src='https:/\/avatars.githubusercontent.com/u/195661102?v=4?s=400'"
                             style="width:100%;height:100%"
                        >
                    </div>
                    <h4 class="user-name-label"><?= $s_uname ?></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20" style="margin-bottom:0.5vh"><path fill="#ffffff" d="m15 8l-4.03 6L7 8z"/></svg>
                </div>
            <?php else: ?>
                <a onclick="onLogin()" class="login-button">Войти</a>
            <?php endif; ?>
        </div>
    </header>
    <script>
        // authLayer script
        const authLayer = document.createElement('authLayer');
        authLayer.id = 'authLayer';
        document.body.appendChild(authLayer);
        $('#authLayer').load('src/layers/authLayer.htm');

        // userActionsLayer script
        const userActionsLayer = document.createElement('userActionsLayer');
        userActionsLayer.id = 'userActionsLayer';
        document.body.appendChild(userActionsLayer);
        $('#userActionsLayer').load('src/layers/userActionsLayer.php');

        // userActionsLayer script
        const createServerLayer = document.createElement('createServerLayer');
        document.body.appendChild(createServerLayer);
        $('createServerLayer').load('src/layers/createServerLayer.php');
    </script>
    <main>
        <section class="section-1">
            <div class="state-title-main">
                <img src="resources/images/main/cloud.png" draggable="false" style="width: 15vh">
                <h3 class="state-title-label">GDPS Cloud</h3>
            </div>
            <h3 class="state-title-description">Игровой хостинг по игре <co>Geometry Dash</co>!</h3>
        </section>

        <section class="section-2">
            <h1 class="tarrif-section-name">Почему именно мы?</h1>
            <p class="tarrif-section-description">У нас появилась некая возможность помочь вам с управлением ваших серверов - в 2 клика!<br>
                                                  Есть некоторые функции, которые вас  могут заинтересовать: 
            </p>

            <div class="about-content">
                <div class="about-card">
                    <div class="about-card-list">
                        <div class="about-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/></svg>
                            <span class="about-name">Простота и удобство</span>
                        </div>
                    
                        <div class="about-description-bg">
                            <p class="about-feature-description">У нас есть удобное решение, чтобы упростить управление вашим сервером.<br>
                                                                 Вся настройка сервера в <cy>ваших руках</cy> в удобной панели)
                            </p> 
                        </div>
                    </div>
                </div>

                <div class="about-card">
                    <div class="about-card-list">
                        <div class="about-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><path fill="currentColor" d="M18.33 3.57s.27-.8-.31-1.36c-.53-.52-1.22-.24-1.22-.24c-.61.3-5.76 3.47-7.67 5.57c-.86.96-2.06 3.79-1.09 4.82c.92.98 3.96-.17 4.79-1c2.06-2.06 5.21-7.17 5.5-7.79M1.4 17.65c2.37-1.56 1.46-3.41 3.23-4.64c.93-.65 2.22-.62 3.08.29c.63.67.8 2.57-.16 3.46c-1.57 1.45-4 1.55-6.15.89"/></svg>
                            <span class="about-name">Простая кастомизация</span>
                        </div>
                    
                        <div class="about-description-bg">
                            <p class="about-feature-description">Управляйте <cg>оформлением страницы</cg> скачивания и т.д</p> 
                        </div>
                    </div>
                </div>

                <div class="about-card">
                    <div class="about-card-list">
                        <div class="about-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><path fill="#ffffff" d="M10.986 7.54L10.57 9h1.529a.4.4 0 0 1 .307.656l-2.658 3.19c-.293.35-.856.05-.726-.388L9.455 11H7.9a.4.4 0 0 1-.307-.657l2.668-3.188c.29-.348.85-.051.726.385M8 2.5a.5.5 0 0 0-1 0V4h-.5A2.5 2.5 0 0 0 4 6.5V7H2.5a.5.5 0 0 0 0 1H4v1.5H2.5a.5.5 0 0 0 0 1H4V12H2.5a.5.5 0 0 0 0 1H4v.5A2.5 2.5 0 0 0 6.5 16H7v1.5a.5.5 0 0 0 1 0V16h1.5v1.5a.5.5 0 0 0 1 0V16H12v1.5a.5.5 0 0 0 1 0V16h.5a2.5 2.5 0 0 0 2.5-2.5V13h1.5a.5.5 0 0 0 0-1H16v-1.5h1.5a.5.5 0 0 0 0-1H16V8h1.5a.5.5 0 0 0 0-1H16v-.5A2.5 2.5 0 0 0 13.5 4H13V2.5a.5.5 0 0 0-1 0V4h-1.5V2.5a.5.5 0 0 0-1 0V4H8zM13.5 5A1.5 1.5 0 0 1 15 6.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 5 13.5v-7A1.5 1.5 0 0 1 6.5 5z"/></svg>
                            <span class="about-name">Собственное ядро</span>
                        </div>
                    
                        <div class="about-description-bg">
                            <p class="about-feature-description">У нас с нуля написанное ядро <co>FastCore</co>, которое проще от Cvolton'a в 4 раза!</p> 
                        </div>
                    </div>
                </div>

                <!-- <div class="about-card">
                    <div class="about-card-list">
                        <div class="about-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20"><path fill="#ffffff" d="M10.986 7.54L10.57 9h1.529a.4.4 0 0 1 .307.656l-2.658 3.19c-.293.35-.856.05-.726-.388L9.455 11H7.9a.4.4 0 0 1-.307-.657l2.668-3.188c.29-.348.85-.051.726.385M8 2.5a.5.5 0 0 0-1 0V4h-.5A2.5 2.5 0 0 0 4 6.5V7H2.5a.5.5 0 0 0 0 1H4v1.5H2.5a.5.5 0 0 0 0 1H4V12H2.5a.5.5 0 0 0 0 1H4v.5A2.5 2.5 0 0 0 6.5 16H7v1.5a.5.5 0 0 0 1 0V16h1.5v1.5a.5.5 0 0 0 1 0V16H12v1.5a.5.5 0 0 0 1 0V16h.5a2.5 2.5 0 0 0 2.5-2.5V13h1.5a.5.5 0 0 0 0-1H16v-1.5h1.5a.5.5 0 0 0 0-1H16V8h1.5a.5.5 0 0 0 0-1H16v-.5A2.5 2.5 0 0 0 13.5 4H13V2.5a.5.5 0 0 0-1 0V4h-1.5V2.5a.5.5 0 0 0-1 0V4H8zM13.5 5A1.5 1.5 0 0 1 15 6.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 5 13.5v-7A1.5 1.5 0 0 1 6.5 5z"/></svg>
                            <span class="about-name">Мод в Geode</span>
                        </div>
                    
                        <div class="about-description-bg">
                            <p class="about-feature-description">У нас есть мод <cg>GDPS Cloud Manager</cg> в индексе <co>Geode</co>, который позваляет настраивать игру под ваши нужды.</p> 
                        </div>
                    </div>
                </div> -->

                <div class="about-card">
                    <div class="about-card-list">
                        <div class="about-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M20 2H4c-1.103 0-2 .894-2 1.992v12.016C2 17.106 2.897 18 4 18h3v4l6.351-4H20c1.103 0 2-.894 2-1.992V3.992A1.998 1.998 0 0 0 20 2z" fill="currentColor"/></svg>
                            <span class="about-name">Поддержка</span>
                        </div>
                    
                        <div class="about-description-bg">
                            <p class="about-feature-description">Отзывчивая поддержка, моментально ответим на ваши вопросы и решим их, касаемо вашего сервера.</p> 
                        </div>
                    </div>
                </div>

            </div>
        </section>
    
        <section class="section-3" id="tarrifs">
            <h1 class="tarrif-section-name">Тарифы</h1>
            <p class="tarrif-section-description">Выберите тариф по вашему вкусу. Настройки и параметры сервера будут зависеть от вашего выбора!</p>
            <p class="state-warn-description">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="#ff9100ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8.45v4M12 21a9 9 0 1 1 0-18a9 9 0 0 1 0 18m.05-5.55v.1h-.1v-.1z"/></svg>
                На данный момент существует один тестовый тариф!
            </p>
            <div class="tarrifs-content">
                <div class="tarrif-card">
                    <div class="tarrif-card-list">
                        <div class="tarrif-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 20 20"><path fill="#ffffff" d="M10.986 7.54L10.57 9h1.529a.4.4 0 0 1 .307.656l-2.658 3.19c-.293.35-.856.05-.726-.388L9.455 11H7.9a.4.4 0 0 1-.307-.657l2.668-3.188c.29-.348.85-.051.726.385M8 2.5a.5.5 0 0 0-1 0V4h-.5A2.5 2.5 0 0 0 4 6.5V7H2.5a.5.5 0 0 0 0 1H4v1.5H2.5a.5.5 0 0 0 0 1H4V12H2.5a.5.5 0 0 0 0 1H4v.5A2.5 2.5 0 0 0 6.5 16H7v1.5a.5.5 0 0 0 1 0V16h1.5v1.5a.5.5 0 0 0 1 0V16H12v1.5a.5.5 0 0 0 1 0V16h.5a2.5 2.5 0 0 0 2.5-2.5V13h1.5a.5.5 0 0 0 0-1H16v-1.5h1.5a.5.5 0 0 0 0-1H16V8h1.5a.5.5 0 0 0 0-1H16v-.5A2.5 2.5 0 0 0 13.5 4H13V2.5a.5.5 0 0 0-1 0V4h-1.5V2.5a.5.5 0 0 0-1 0V4H8zM13.5 5A1.5 1.5 0 0 1 15 6.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 5 13.5v-7A1.5 1.5 0 0 1 6.5 5z"/></svg>
                            <span class="tarrif-name">TEST</span>
                        </div>
                    
                        <div class="tarrif-features-list">
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><g fill="#ffffff"><path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2s2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2s1.12-2 2.5-2s2.5.895 2.5 2"/><path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/><path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/></g></svg>
                                <h5>Музыка из NewGrounds</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M14 16a1 1 0 0 1-.707-1.707l7-7a1 1 0 0 1 1.414 1.414l-7 7A.997.997 0 0 1 14 16M3 17a1 1 0 0 1-.707-1.707l6-6a1 1 0 0 1 1.414 1.414l-6 6A.997.997 0 0 1 3 17"/><path fill="#ffffff" d="M14 16a.997.997 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414l5 5A1 1 0 0 1 14 16"/></svg>
                                <h5>Небольшая аналитика сервера</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M13.82 22h-3.64a1 1 0 0 1-.977-.786l-.407-1.884a8.002 8.002 0 0 1-1.535-.887l-1.837.585a1 1 0 0 1-1.17-.453L2.43 15.424a1.006 1.006 0 0 1 .193-1.239l1.425-1.3a8.1 8.1 0 0 1 0-1.772L2.623 9.816a1.006 1.006 0 0 1-.193-1.24l1.82-3.153a1 1 0 0 1 1.17-.453l1.837.585c.244-.18.498-.348.76-.5c.253-.142.513-.271.779-.386l.408-1.882A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .976.787l.412 1.883a8.192 8.192 0 0 1 1.535.887l1.838-.585a1 1 0 0 1 1.169.453l1.82 3.153c.232.407.152.922-.193 1.239l-1.425 1.3a8.1 8.1 0 0 1 0 1.772l1.425 1.3c.345.318.425.832.193 1.239l-1.82 3.153a1 1 0 0 1-1.17.453l-1.837-.585a7.98 7.98 0 0 1-1.534.886l-.413 1.879a1 1 0 0 1-.976.786ZM11.996 8a4 4 0 1 0 0 8a4 4 0 0 0 0-8Z"/></svg>
                                <h5>Панель управления сервером</h5>
                            </span>
                        </div>
                    </div>
                    <?php if($s_udid && $s_udid !== ''): ?>
                        <div class="tarrif-price-button" onclick="<?= ($s_servers === '') ? 'onCreateServer()' : '' ?>">
                            <input style="<?= ($s_servers === '') ? 'display:none' : 'display:flex' ?>" minlength="32" maxlength="32" type="text" class="copy-link-server" value="https://www.gdpscloud.ru/db/<?=$s_servers?>">
                            <h5 class="tarrif-price-button-title"><?= ($s_servers === '') ? 'Бесплатно' : "" ?></h5>
                        </div>
                    <?php else: ?>
                        <div class="tarrif-price-button" onclick="onLogin()">
                            <h5 class="tarrif-price-button-title">Бесплатно</h5>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- <div class="tarrif-card tarrif-coming-soon">
                    <div class="tarrif-card-list">
                        <div class="tarrif-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 20 20"><path fill="#ffffff" d="M10.986 7.54L10.57 9h1.529a.4.4 0 0 1 .307.656l-2.658 3.19c-.293.35-.856.05-.726-.388L9.455 11H7.9a.4.4 0 0 1-.307-.657l2.668-3.188c.29-.348.85-.051.726.385M8 2.5a.5.5 0 0 0-1 0V4h-.5A2.5 2.5 0 0 0 4 6.5V7H2.5a.5.5 0 0 0 0 1H4v1.5H2.5a.5.5 0 0 0 0 1H4V12H2.5a.5.5 0 0 0 0 1H4v.5A2.5 2.5 0 0 0 6.5 16H7v1.5a.5.5 0 0 0 1 0V16h1.5v1.5a.5.5 0 0 0 1 0V16H12v1.5a.5.5 0 0 0 1 0V16h.5a2.5 2.5 0 0 0 2.5-2.5V13h1.5a.5.5 0 0 0 0-1H16v-1.5h1.5a.5.5 0 0 0 0-1H16V8h1.5a.5.5 0 0 0 0-1H16v-.5A2.5 2.5 0 0 0 13.5 4H13V2.5a.5.5 0 0 0-1 0V4h-1.5V2.5a.5.5 0 0 0-1 0V4H8zM13.5 5A1.5 1.5 0 0 1 15 6.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 5 13.5v-7A1.5 1.5 0 0 1 6.5 5z"/></svg>
                            <span class="tarrif-name">TEST 2</span>
                        </div>

                        <div class="tarrif-features-list">
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 20v-8m0 0V4m0 8h8m-8 0H4"/></svg>
                                <h5>Все функции "TEST"</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><g fill="#ffffff"><path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2s2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2s1.12-2 2.5-2s2.5.895 2.5 2"/><path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/><path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/></g></svg>
                                <h5>Музыка из NewGrounds, кастомная</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M14 16a1 1 0 0 1-.707-1.707l7-7a1 1 0 0 1 1.414 1.414l-7 7A.997.997 0 0 1 14 16M3 17a1 1 0 0 1-.707-1.707l6-6a1 1 0 0 1 1.414 1.414l-6 6A.997.997 0 0 1 3 17"/><path fill="#ffffff" d="M14 16a.997.997 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414l5 5A1 1 0 0 1 14 16"/></svg>
                                <h5>Расширенная аналитика сервера</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M13.82 22h-3.64a1 1 0 0 1-.977-.786l-.407-1.884a8.002 8.002 0 0 1-1.535-.887l-1.837.585a1 1 0 0 1-1.17-.453L2.43 15.424a1.006 1.006 0 0 1 .193-1.239l1.425-1.3a8.1 8.1 0 0 1 0-1.772L2.623 9.816a1.006 1.006 0 0 1-.193-1.24l1.82-3.153a1 1 0 0 1 1.17-.453l1.837.585c.244-.18.498-.348.76-.5c.253-.142.513-.271.779-.386l.408-1.882A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .976.787l.412 1.883a8.192 8.192 0 0 1 1.535.887l1.838-.585a1 1 0 0 1 1.169.453l1.82 3.153c.232.407.152.922-.193 1.239l-1.425 1.3a8.1 8.1 0 0 1 0 1.772l1.425 1.3c.345.318.425.832.193 1.239l-1.82 3.153a1 1 0 0 1-1.17.453l-1.837-.585a7.98 7.98 0 0 1-1.534.886l-.413 1.879a1 1 0 0 1-.976.786ZM11.996 8a4 4 0 1 0 0 8a4 4 0 0 0 0-8Z"/></svg>
                                <h5>Много возможностей в панели</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M12.865 2.996a1 1 0 0 0-1.73 0L8.421 7.674a1.25 1.25 0 0 1-.894.608L2.44 9.05c-.854.13-1.154 1.208-.488 1.76l3.789 3.138c.35.291.515.75.43 1.197L5.18 20.35a1 1 0 0 0 1.448 1.072l4.79-2.522a1.25 1.25 0 0 1 1.164 0l4.79 2.522a1 1 0 0 0 1.448-1.072l-.991-5.205a1.25 1.25 0 0 1 .43-1.197l3.79-3.139c.665-.55.365-1.63-.49-1.759l-5.085-.768a1.25 1.25 0 0 1-.895-.608z"/></svg>
                                <h5>Рейт-бот в Telegram</h5>
                            </span>
                        </div>
                    </div>
                    <div class="tarrif-price-button">
                        <h5 class="tarrif-price-button-title">Скоро</h5>
                    </div>
                </div> -->

                <!-- <div class="tarrif-card tarrif-coming-soon">
                    <div class="tarrif-card-list">
                        <div class="tarrif-name-content">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 20 20"><path fill="#ffffff" d="M10.986 7.54L10.57 9h1.529a.4.4 0 0 1 .307.656l-2.658 3.19c-.293.35-.856.05-.726-.388L9.455 11H7.9a.4.4 0 0 1-.307-.657l2.668-3.188c.29-.348.85-.051.726.385M8 2.5a.5.5 0 0 0-1 0V4h-.5A2.5 2.5 0 0 0 4 6.5V7H2.5a.5.5 0 0 0 0 1H4v1.5H2.5a.5.5 0 0 0 0 1H4V12H2.5a.5.5 0 0 0 0 1H4v.5A2.5 2.5 0 0 0 6.5 16H7v1.5a.5.5 0 0 0 1 0V16h1.5v1.5a.5.5 0 0 0 1 0V16H12v1.5a.5.5 0 0 0 1 0V16h.5a2.5 2.5 0 0 0 2.5-2.5V13h1.5a.5.5 0 0 0 0-1H16v-1.5h1.5a.5.5 0 0 0 0-1H16V8h1.5a.5.5 0 0 0 0-1H16v-.5A2.5 2.5 0 0 0 13.5 4H13V2.5a.5.5 0 0 0-1 0V4h-1.5V2.5a.5.5 0 0 0-1 0V4H8zM13.5 5A1.5 1.5 0 0 1 15 6.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 5 13.5v-7A1.5 1.5 0 0 1 6.5 5z"/></svg>
                            <span class="tarrif-name">TEST 3</span>
                        </div>

                        <div class="tarrif-features-list">
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 20v-8m0 0V4m0 8h8m-8 0H4"/></svg>
                                <h5>Все функции "TEST 2"</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><g fill="#ffffff"><path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2s2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2s1.12-2 2.5-2s2.5.895 2.5 2"/><path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/><path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/></g></svg>
                                <h5>Музыка из NewGrounds, кастомная</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M14 16a1 1 0 0 1-.707-1.707l7-7a1 1 0 0 1 1.414 1.414l-7 7A.997.997 0 0 1 14 16M3 17a1 1 0 0 1-.707-1.707l6-6a1 1 0 0 1 1.414 1.414l-6 6A.997.997 0 0 1 3 17"/><path fill="#ffffff" d="M14 16a.997.997 0 0 1-.707-.293l-5-5a1 1 0 0 1 1.414-1.414l5 5A1 1 0 0 1 14 16"/></svg>
                                <h5>Расширенная аналитика сервера</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M13.82 22h-3.64a1 1 0 0 1-.977-.786l-.407-1.884a8.002 8.002 0 0 1-1.535-.887l-1.837.585a1 1 0 0 1-1.17-.453L2.43 15.424a1.006 1.006 0 0 1 .193-1.239l1.425-1.3a8.1 8.1 0 0 1 0-1.772L2.623 9.816a1.006 1.006 0 0 1-.193-1.24l1.82-3.153a1 1 0 0 1 1.17-.453l1.837.585c.244-.18.498-.348.76-.5c.253-.142.513-.271.779-.386l.408-1.882A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .976.787l.412 1.883a8.192 8.192 0 0 1 1.535.887l1.838-.585a1 1 0 0 1 1.169.453l1.82 3.153c.232.407.152.922-.193 1.239l-1.425 1.3a8.1 8.1 0 0 1 0 1.772l1.425 1.3c.345.318.425.832.193 1.239l-1.82 3.153a1 1 0 0 1-1.17.453l-1.837-.585a7.98 7.98 0 0 1-1.534.886l-.413 1.879a1 1 0 0 1-.976.786ZM11.996 8a4 4 0 1 0 0 8a4 4 0 0 0 0-8Z"/></svg>
                                <h5>Много возможностей в панели</h5>
                            </span>
                            <span class="tarrif-feature-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#ffffff" d="M12.865 2.996a1 1 0 0 0-1.73 0L8.421 7.674a1.25 1.25 0 0 1-.894.608L2.44 9.05c-.854.13-1.154 1.208-.488 1.76l3.789 3.138c.35.291.515.75.43 1.197L5.18 20.35a1 1 0 0 0 1.448 1.072l4.79-2.522a1.25 1.25 0 0 1 1.164 0l4.79 2.522a1 1 0 0 0 1.448-1.072l-.991-5.205a1.25 1.25 0 0 1 .43-1.197l3.79-3.139c.665-.55.365-1.63-.49-1.759l-5.085-.768a1.25 1.25 0 0 1-.895-.608z"/></svg>
                                <h5>Рейт-бот в Telegram</h5>
                            </span>
                        </div>
                    </div>
                    <div class="tarrif-price-button">
                        <h5 class="tarrif-price-button-title">Скоро</h5>
                    </div>
                </div> -->
            </div>
        </section>

        <footer class="footer-container">
            <section class="footer-column">
                <span class="footer-logo-content">
                    <img src="resources/images/main/cloud.png" draggable="false" style="width: 2.75vh">
                    <h3 class="__header-logo-label">GDPS Cloud</h3>
                </span>
                <h4 class="service-disclaimer">Хостинг приватных серверов по Geometry Dash.</h4>
                <div class="footer-links">
                    <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link-button" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974c0 4.406 2.857 8.145 6.821 9.465c.499.09.679-.217.679-.481c0-.237-.008-.865-.011-1.696c-2.775.602-3.361-1.338-3.361-1.338c-.452-1.152-1.107-1.459-1.107-1.459c-.905-.619.069-.605.069-.605c1.002.07 1.527 1.028 1.527 1.028c.89 1.524 2.336 1.084 2.902.829c.091-.645.351-1.085.635-1.334c-2.214-.251-4.542-1.107-4.542-4.93c0-1.087.389-1.979 1.024-2.675c-.101-.253-.446-1.268.099-2.64c0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336a9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021c.545 1.372.203 2.387.099 2.64c.64.696 1.024 1.587 1.024 2.675c0 3.833-2.33 4.675-4.552 4.922c.355.308.675.916.675 1.846c0 1.334-.012 2.41-.012 2.737c0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974C22 6.465 17.535 2 12.026 2" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="https://t.me/gdpscloud" class="footer-link-button" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.665 3.717l-17.73 6.837c-1.21.486-1.203 1.161-.222 1.462l4.552 1.42l10.532-6.645c.498-.303.953-.14.579.192l-8.533 7.701h-.002l.002.001l-.314 4.692c.46 0 .663-.211.921-.46l2.211-2.15l4.599 3.397c.848.467 1.457.227 1.668-.785l3.019-14.228c.309-1.239-.473-1.8-1.282-1.434z" fill="currentColor"/></svg>
                    </a>
                    <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link-button" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20.317 4.492c-1.53-.69-3.17-1.2-4.885-1.49a.075.075 0 0 0-.079.036c-.21.369-.444.85-.608 1.23a18.566 18.566 0 0 0-5.487 0a12.36 12.36 0 0 0-.617-1.23A.077.077 0 0 0 8.562 3c-1.714.29-3.354.8-4.885 1.491a.07.07 0 0 0-.032.027C.533 9.093-.32 13.555.099 17.961a.08.08 0 0 0 .031.055a20.03 20.03 0 0 0 5.993 2.98a.078.078 0 0 0 .084-.026a13.83 13.83 0 0 0 1.226-1.963a.074.074 0 0 0-.041-.104a13.201 13.201 0 0 1-1.872-.878a.075.075 0 0 1-.008-.125c.126-.093.252-.19.372-.287a.075.075 0 0 1 .078-.01c3.927 1.764 8.18 1.764 12.061 0a.075.075 0 0 1 .079.009c.12.098.245.195.372.288a.075.075 0 0 1-.006.125c-.598.344-1.22.635-1.873.877a.075.075 0 0 0-.041.105c.36.687.772 1.341 1.225 1.962a.077.077 0 0 0 .084.028a19.963 19.963 0 0 0 6.002-2.981a.076.076 0 0 0 .032-.054c.5-5.094-.838-9.52-3.549-13.442a.06.06 0 0 0-.031-.028M8.02 15.278c-1.182 0-2.157-1.069-2.157-2.38c0-1.312.956-2.38 2.157-2.38c1.21 0 2.176 1.077 2.157 2.38c0 1.312-.956 2.38-2.157 2.38m7.975 0c-1.183 0-2.157-1.069-2.157-2.38c0-1.312.955-2.38 2.157-2.38c1.21 0 2.176 1.077 2.157 2.38c0 1.312-.946 2.38-2.157 2.38"/></svg>
                    </a>
                </div>
            </section>

            <section class="footer-column">
                <h3 class="footer-column-title">Помощь</h3>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Тех. поддержка</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Документация</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">FAQ</a>
            </section>

             <section class="footer-column">
                <h3 class="footer-column-title">GDPS CLOUD</h3>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">О нас</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Правила использования</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Политика кондефициальности</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Контакты</a>
                <a href="https://github.com/EclipseMenu/EclipseMenu" class="footer-link" target="_blank">Наш блог</a>
            </section>
          
        </footer>
    </main>
    
    </script>
    
    <script type="module">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <script src="src/javascript/checkSession.js"></script>
</body>
</html>