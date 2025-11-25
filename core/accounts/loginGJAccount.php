<?php
    require __DIR__ . '/../src/main/errorManager.php';
    include __DIR__ . '/../src/main/DBConnect.php';
    include __DIR__ . '/../src/classes/CAccount.php';
    include __DIR__ . '/../src/classes/CUtils.php';
    
    // POST-запросы из Geometry Dash
    $uname = $_POST["userName"];
    $password = $_POST["gjp2"];
    $key = $_POST["secret"];
 
    if($key == 'Wmfv3899gc9')
    {
        $fetch = $db->prepare("SELECT * FROM accounts WHERE uname LIKE :uname LIMIT 1");
        $fetch->execute([':uname' => $uname]);
        $response = $fetch->fetch();
        if($fetch->rowCount() == 0) exit('-1');
        else {
            if(CAccount::verifyPassword($response['accountID'], $password) == true)
            {
                CUtils::refreshServer();
                if($response['isActive'] == 0 && $response['isBanned'] == 0) exit('-12');
                elseif($response['isActive'] == 0 || $response['isActive'] == 1 && $response['isBanned'] == 1) exit('-13');
                else exit(printf("%d,%d", $response['accountID'], $response['userID']));
            } else exit('-1');
        }
    } else echo errorManager::accessDenied();