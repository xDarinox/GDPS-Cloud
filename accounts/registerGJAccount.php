<?php
    global $forbiddenWords;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    include __DIR__ . '/../src/main/errorManager.php';
    include __DIR__ . '/../src/main/DBConnect.php';
    include __DIR__ . '/../src/lib/Exploit.php';
    include __DIR__ . '/../src/classes/CAccount.php';
    include __DIR__ . '/../src/classes/CUtils.php';
    include __DIR__ . '/../src/security/filter/forbiddenWords.php';
    include __DIR__ . '/../src/api/PHPMailer/src/Exception.php';
    include __DIR__ . '/../src/api/PHPMailer/src/PHPMailer.php';
    include __DIR__ . '/../src/api/PHPMailer/src/SMTP.php';
    
	/* -- Инициализация переменных -- / -- Initializing variables -- */
	$uname = str_replace(' ', '', Exploit::charclean($_POST["userName"]));
	$password = CUtils::hashPassword($_POST["password"]);
	$email = Exploit::rucharclean($_POST["email"]);
	$key = $_POST["secret"];
	
    if($key == 'Wmfv3899gc9')
    {
	    foreach(array_map('strtolower', $forbiddenWords) as $filterUname) if(!empty($filterUname) && mb_strpos(strtolower($uname), $filterUname) !== false) exit('-4');
        if(strlen($uname) > 20) return -4; // Ошибка "Username is invalid"
        if(is_numeric($password)) return -5; // Ошибка "Password is invalid"
        if(strstr($email, '@') != "@gmail.com" && strstr($email, '@') != "@mail.ru" && strstr($email, '@') != "@yandex.ru" && strstr($email, '@') != "@bk.ru") return -6; // Ошибка "Email is invalid"
	            
        /* -- Initializing variables -- */
        $ip = CUtils::getIP();
        $tokenMeta = json_encode(array("token" => bin2hex(random_bytes(8)), "expires" => (int)time() + 86400));
	   
        // Проверка почты на существование в базе данных
        $fetch = $db->prepare("SELECT count(*) FROM accounts WHERE email LIKE :mail");
        $fetch->execute([':mail' => $email]);
        $emailCount = $fetch->fetchColumn();
        if($emailCount > 0) exit('-3');
	
        // Проверка имени пользователя на существование в базе данных	
        $fetch = $db->prepare("SELECT count(*) FROM accounts WHERE uname LIKE :userName");
        $fetch->execute([':userName' => $uname]);
        $unameCount = $fetch->fetchColumn();
        if($unameCount > 0) exit('-2');
        else {
            $query = $db->prepare("INSERT INTO users (isRegistered, uname) VALUES (1, :uname)");
            $query->execute([':uname' => $uname]);
            $userID = $db->lastInsertId();
		        
	        // Регистрирование аккаунта
            $fetch = $db->prepare("INSERT INTO accounts (uname, userID, email, registerTime, hash, tokenMetadata, lastIP) VALUES (:uname, :userID, :email, :time, :hash, :token, :ip)");
            $fetch->execute([':uname' => $uname, ':userID' => $userID, ':email' => $email, ':token' => $tokenMeta,  ':time' => time(), ':hash' => $password, ':ip' => $ip]);
		        
            /* -- Отправка письма на почту -- */
            $link = "https://$_SERVER[HTTP_HOST]/manage/account/activateAccount.php";
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->CharSet = Exploit::remove("utf-8");
            $mail->Host = Exploit::remove('');
            $mail->SMTPAuth = true;
            $mail->Username = Exploit::remove('');
            $mail->Password = Exploit::remove('');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom("", "");
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = "Активация аккаунта на Darinox GDPS";
            $mail->Body = "<h2 align=center>Привет, $uname!</h2><br>
                       <h4 align=left>Спасибо, что зарегистрировался на <b>Darinox GDPS</b>!<br><br>Если это были вы, то перейдите по кнопке снизу, чтобы активировать аккаунт, а если не вы, то просто проигнорируйте это письмо!</h4><br>
                       <a href='$link'><h3 align=center>Активировать аккаунт</h3></a><br><hr><br>
                       <h4 align=left>❤️ С заботой, основатель <b>Darinox GDPS</b> ❤️<br>
                       Дата регистрации: ".date("H:i, d/m/Y", time())."</h4>";
            $mail->send();
            exit('1');
	    }
    } else echo errorManager::accessDenied();