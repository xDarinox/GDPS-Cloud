<?php class CUtils
{
    public static function refreshServer($userID = '')
    {
        self::updateLastPlay($userID, self::getIP());
        self::updateCreatorPoints();
        self::updateMusiclibraryArtists();
        self::updateNewGroundsSongs();
        self::updateMusiclibrarySongs();
    }
        
    public static function updateLastPlay($userID, $IP)
    {
        include __DIR__ . '/../main/DBConnect.php';
        $query = $db->prepare("SELECT registerTime FROM accounts WHERE userID = :userID");
        $query->execute([':userID' => $userID]);
        $registerTime = $query->fetchColumn();
        $totalDays = floor((time() - $registerTime) / 86400);
            
        $i8 = json_encode(array("total-in-game" => "$totalDays days", "last-played" => (int)time()));
        $query = $db->prepare("UPDATE accounts SET lastSession = :lastSession, lastIP = :IP WHERE userID = :userID");
        $query->execute([':lastSession' => $i8, ':userID' => $userID, ':IP' => $IP]);
    }
        
    public static function getIP()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
        
        
    public static function updateCreatorPoints()
    {
        include __DIR__ . '/../main/DBConnect.php';
        $query = $db->prepare(
            "UPDATE users LEFT JOIN
            (SELECT usersTable.userID, (IFNULL(starredTable.starred, 0) + IFNULL(featuredTable.featured, 0) + (IFNULL(epicTable.epic,0)*1)) as CP FROM
            (SELECT userID FROM users) AS usersTable LEFT JOIN
            (SELECT count(*) as starred, userID FROM levels WHERE starStars != 0 GROUP BY(userID)) AS starredTable ON usersTable.userID = starredTable.userID LEFT JOIN
	        (SELECT count(*) as featured, userID FROM levels WHERE starFeatured != 0 GROUP BY(userID)) AS featuredTable ON usersTable.userID = featuredTable.userID LEFT JOIN
	        (SELECT SUM(starEpic) as epic, userID FROM levels WHERE starEpic != 0 GROUP BY(userID)) AS epicTable ON usersTable.userID = epicTable.userID)
	        calculated ON users.userID = calculated.userID SET users.creatorPoints = IFNULL(calculated.CP, 0)"
        );
        $query->execute();
    }
        
    public static function getMaxValues($type)
    {
        include __DIR__ . '/../main/DBConnect.php';
        switch($type)
        {
            case 'stars':
                $mainStars = 202; // Main levels stars 
                
                // Total stars on online levels
                $query = $db->prepare("SELECT SUM(starStars) FROM levels WHERE starStars != 0");
                $query->execute();
                $levelStars = $query->fetchColumn();
            
                // Total stars on daily levels
                $dailyQuery = $db->prepare("SELECT * FROM dailylevels WHERE timestamp < :time");
                $dailyQuery->execute([':time' => time()]);
                $dailyData = $dailyQuery->fetchAll();
                if($dailyQuery->rowCount() == 0) $dailyStars = 0;
                else { 
                    foreach($dailyData as $daily) $dailyIDs[] = $daily['levelID'];
                    $dailyLevels = implode(',', $dailyIDs);
                    $dailyQuery = $db->prepare("SELECT SUM(starStars) FROM levels WHERE levelID IN ($dailyLevels) AND starStars != 0");
                    $dailyQuery->execute();
                    $dailyStars = $dailyQuery->fetchColumn();
                }
            
                // Total stars on weekly levels
                $weeklyQuery = $db->prepare("SELECT * FROM weeklylevels WHERE timestamp < :time");
                $weeklyQuery->execute([':time' => time()]);
                $weeklyData = $weeklyQuery->fetchAll();
                if($weeklyQuery->rowCount() == 0) $weeklyStars = 0;
                else { 
                    foreach($weeklyData as $weekly) $weeklyIDs[] = $weekly['levelID'];
                    $weeklyLevels = implode(',', $weeklyIDs);
                    $weeklyQuery = $db->prepare("SELECT SUM(starStars) FROM levels WHERE levelID IN ($weeklyLevels) AND starStars != 0");
                    $weeklyQuery->execute();
                    $weeklyStars = $weeklyQuery->fetchColumn();
                }
            
                // Total stars on event levels
                $eventQuery = $db->prepare("SELECT * FROM eventlevels");
                $eventQuery->execute();
                $eventData = $eventQuery->fetchAll();
                if($eventQuery->rowCount() == 0) $eventStars = 0;
                else { 
                    foreach($eventData as $event) $eventIDs[] = $event['levelID'];
                    $eventLevels = implode(',', $eventIDs);
                    $eventQuery = $db->prepare("SELECT SUM(starStars) FROM levels WHERE levelID IN ($eventLevels) AND starStars != 0");
                    $eventQuery->execute();
                    $eventStars = $eventQuery->fetchColumn();
                }
            
                // Total stars on map packs levels
                $packsQuery = $db->prepare("SELECT SUM(stars) FROM mappacks");
                $packsQuery->execute();
                $packsStars = $packsQuery->fetchColumn();
                if($packsQuery->rowCount() == 0) $packsStars = 0;
            
                // Total stars on gauntlet levels
                $gauntletQuery = $db->prepare("SELECT * FROM gauntlets ORDER BY ID ASC");
                $gauntletQuery->execute();
                $gauntletData = $gauntletQuery->fetchAll();
                if($gauntletQuery->rowCount() == 0) $gauntletStars = 0;
                else { 
                    foreach($gauntletData as $gauntlet)  $gauntletIDs[] = "{$gauntlet['level1']},{$gauntlet['level2']},{$gauntlet['level3']},{$gauntlet['level4']},{$gauntlet['level5']}";
                    $gauntletLevels = implode(',', $gauntletIDs);
                    $gauntletQuery = $db->prepare("SELECT SUM(starStars) FROM levels WHERE levelID IN ($gauntletLevels) AND starStars != 0");
                    $gauntletQuery->execute();
                    $gauntletStars = $gauntletQuery->fetchColumn();
                }
            
            // Counting total stars
            $maxStars = $mainStars + $levelStars + $dailyStars + $weeklyStars + $eventStars + $packsStars + $gauntletStars;
            return $maxStars;
        }
            
        }
        
        function getCountLevelMoons()
        {
            include __DIR__ . '/../main/DBConnect.php';
            $query = $db->prepare("SELECT sum(starStars) FROM levels WHERE NOT starStars = 0 AND levelLength = 5");
            $query->execute();
            $result = $query->fetchColumn();
            return $result;
        }
    
        function automaticBan()
        {
            include __DIR__ . '/../main/DBConnect.php';
            $stars = self::getCountLevelStars() + 212;
            $moons = self::getCountLevelMoons() + 25;
            
        
            $query = $db->prepare("UPDATE users SET isBanned = 1 WHERE stars > :stars OR stars < 0 OR moons > :moons OR moons < 0");
            $query->execute([':stars' => $stars, ':moons' => $moons]);
        }
        
        function automaticUnBan()
        {
            include __DIR__ . '/../main/DBConnect.php';
            $stars = self::getCountLevelStars() + 212;
            $moons = self::getCountLevelMoons() + 25;
            
        
            $query = $db->prepare("UPDATE users SET isBanned = 0 WHERE stars < :stars OR stars > 0 OR moons < :moons OR moons > 0");
            $query->execute([':stars' => $stars, ':moons' => $moons]);
        }
        
        function updateMusiclibraryArtists()
        {
            $music = new PDO("mysql:host=localhost;port=3306;dbname=darinonlin_music", 'darinonlin_music', '64@NrUW18NLJZVT3');
            $artists = [];
            $query = $music->prepare("SELECT * FROM artists");
            $query->execute();
            while($result = $query->fetch())
            {
                $artists['artists'][$result['artistID']] = 
		        [
			        'name' => $result['artistName'],
			        'youtubeID' => !empty($result['youtubeID']) ? $result['youtubeID'] : ' ',
			        'website' => !empty($result['website']) ? $result['website'] : ' '
		        ];
            }
            file_put_contents('/home/d/darinonlin/content_darinoxgdps_ru/public_html/library/music/files/artists.json', json_encode($artists, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE));
        }
        
        function updateNewGroundsSongs()
        {
            $music = new PDO("mysql:host=localhost;port=3306;dbname=darinonlin_music", 'darinonlin_music', '64@NrUW18NLJZVT3');
            $artists = [];
            $query = $music->prepare("SELECT * FROM newgrounds");
            $query->execute();
            while($result = $query->fetch())
            {
                $artists['songs'][$result['ID']] = 
		        [
		            'ID' => (int)$result['ID'],
			        'name' => $result['name'],
			        'artistID' => (int)$result['artistID'],
			        'artistName' =>  $result['artistName'],
			        'yt' => $result['youtubeID'],
			        'downloadURL' => $result['url'],
			        'songSize' => $result['size'],
			        'isNewgrounds' => ($result['ID'] < 5000000) ? 'true' : 'false',
			        'isUserUpload' => ($result['ID'] >= 5000000) ? 'true' : 'false',
		];
            }
            file_put_contents('/home/d/darinonlin/content_darinoxgdps_ru/public_html/library/music/files/newgrounds.json', json_encode($artists, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE));
        }
        
        function updateMusiclibrarySongs()
        {
            $music = new PDO("mysql:host=localhost;port=3306;dbname=darinonlin_music", 'darinonlin_music', '64@NrUW18NLJZVT3');
            $version = file_get_contents('https://content.darinoxgdps.ru/library/music/files/version.txt');
            $artists = [];
            $query = $music->prepare("SELECT * FROM musiclibrary");
            $query->execute();
            while($customSongs = $query->fetch())
            {
                $artists['songs'][$customSongs['musicID']] = 
		        [
		            'ID' => (int)$customSongs['musicID'],
				    'name' => !empty($customSongs['name']) ? $customSongs['name'] : 'N/A',
				    'artistID' => (int)$customSongs['artistID'],
				    'size' => $customSongs['size'] * 1024 * 1024,
				    'duration' => (int)$customSongs['duration'],
				    'tagIDs' => $customSongs['tagIDs'],
				    'ncs' => (int)$customSongs['isNCS'],
				    'artistIDs' => $customSongs['artistIDs'],
				    'externalLink' => ($customSongs['isNCS'] == 1) ? $customSongs['ncsLink'].'?utm_source=darinox&utm_medium=referral&utm_campaign=gdps' : '',
				    'new' => (int)($customSongs['version'] == $version) ? 1 : 0,
				    'priorityOrder' => (int)($customSongs['isPriority'] != 0) ? 1 : 0
		        ];
            }
            file_put_contents('/home/d/darinonlin/content_darinoxgdps_ru/public_html/library/music/files/musiclibrary.json', json_encode($artists, JSON_PRETTY_PRINT | JSON_INVALID_UTF8_IGNORE));
        }
        
        // Function: Getting userID or udid string from accountID
	    public static function getUserID($extID, $uname = '')
	    {
		    include __DIR__ . '/../main/DBConnect.php';
		    if(is_numeric($extID)) $register = 1;
		    else $register = 0;
		    if($register == 1)
		    {
		        $query = $db->prepare("SELECT userID FROM accounts WHERE isActive = 1 AND accountID = :accountID");
		        $query->execute([':accountID' => $extID]);
		        if($query->rowCount() > 0) $userID = $query->fetchColumn();
		    } else {
		        $query = $db->prepare("SELECT userID FROM users WHERE isRegistered = 0 AND udid = :udid");
		        $query->execute([':udid' => $extID]);
		        if($query->rowCount() > 0) $userID = $query->fetchColumn();
		        else {
			        $query = $db->prepare("INSERT INTO users (isRegistered, udid, uname) VALUES (0, :udid, 'Player')");
		            $query->execute([':udid' => $extID]);
	                $userID = $db->lastInsertId();
		        }
		    }
		    return $userID;
	    }
	    
	    public function getIDFromPost()
	    {
		    require __DIR__ . "/../incl/lib/exploitPatch.php";
		    if(!empty($_POST["udid"])) $id = ExploitPatch::remove($_POST["udid"]);
		    elseif($_POST["accountID"] != 0) $id = $_POST["accountID"];
		    else return -1;
		    return $id;
	    }
	    
	    public static function convertTime($timestamp)
	    {
	        $time = time() - $timestamp;
			$time = ($time < 1) ? 1 : $time;
			$tokens = [31536000 => 'year', 2592000 => 'month', 604800 => 'week', 86400 => 'day', 3600 => 'hour', 60 => 'minute', 1 => 'second'];
			foreach($tokens as $unit => $text)
			{
				if($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				$endLetter = $numberOfUnits > 1 ? 's' : '';
				return "$numberOfUnits $text$endLetter";
			}
	    }
	    
	    public static function getQuests($questID, $type)
	    {
	        switch($type)
            {
                case 1:
                    return "$questID,1,250,10,Orbs Getter:".($questID + 1).",2,6,20,Coins Grinder:".($questID + 2).",3,15,30,Stars Maniac";
                    break;
                case 2:
                    return "$questID,2,3,10,Coins Getter:".($questID + 1).",3,10,20,Stars Grinder:".($questID + 2).",1,1000,30,Orbs Maniac";
                    break;
                case 3:
                    return "$questID,3,5,10,Stars Getter:".($questID + 1).",1,500,20,Orbs Grinder:".($questID + 2).",2,9,30,Coins Maniac";
                    break;
            }
	    }
	    
	    public static function getAllDemons($demonIDs)
	    {
	        include __DIR__ . '/../main/DBConnect.php';
	        $demonsCount = $db->prepare("SELECT IFNULL(easyNormal, 0) as easyNormal,
	        IFNULL(mediumNormal, 0) as mediumNormal,
	        IFNULL(hardNormal, 0) as hardNormal,
	        IFNULL(insaneNormal, 0) as insaneNormal,
	        IFNULL(extremeNormal, 0) as extremeNormal,
	        IFNULL(easyPlatformer, 0) as easyPlatformer,
	        IFNULL(mediumPlatformer, 0) as mediumPlatformer,
	        IFNULL(hardPlatformer, 0) as hardPlatformer,
	        IFNULL(insanePlatformer, 0) as insanePlatformer,
	        IFNULL(extremePlatformer, 0) as extremePlatformer
	        FROM (
		        (SELECT count(*) AS easyNormal FROM levels WHERE starDemonDiff = 3 AND levelLength != 5 AND levelID IN ($demonIDs) AND starDemon != 0) easyNormal
		        JOIN (SELECT count(*) AS mediumNormal FROM levels WHERE starDemonDiff = 4 AND levelLength != 5 AND levelID IN ($demonIDs) AND starDemon != 0) mediumNormal
		        JOIN (SELECT count(*) AS hardNormal FROM levels WHERE starDemonDiff = 0 AND levelLength != 5 AND levelID IN ($demonIDs) AND starDemon != 0) hardNormal
		        JOIN (SELECT count(*) AS insaneNormal FROM levels WHERE starDemonDiff = 5 AND levelLength != 5 AND levelID IN ($demonIDs) AND starDemon != 0) insaneNormal
		        JOIN (SELECT count(*) AS extremeNormal FROM levels WHERE starDemonDiff = 6 AND levelLength != 5 AND levelID IN ($demonIDs) AND starDemon != 0) extremeNormal
		
		        JOIN (SELECT count(*) AS easyPlatformer FROM levels WHERE starDemonDiff = 3 AND levelLength = 5 AND levelID IN ($demonIDs) AND starDemon != 0) easyPlatformer
		        JOIN (SELECT count(*) AS mediumPlatformer FROM levels WHERE starDemonDiff = 4 AND levelLength = 5 AND levelID IN ($demonIDs) AND starDemon != 0) mediumPlatformer
	        	JOIN (SELECT count(*) AS hardPlatformer FROM levels WHERE starDemonDiff = 0 AND levelLength = 5 AND levelID IN ($demonIDs) AND starDemon != 0) hardPlatformer
		        JOIN (SELECT count(*) AS insanePlatformer FROM levels WHERE starDemonDiff = 5 AND levelLength = 5 AND levelID IN ($demonIDs) AND starDemon != 0) insanePlatformer
		        JOIN (SELECT count(*) AS extremePlatformer FROM levels WHERE starDemonDiff = 6 AND levelLength = 5 AND levelID IN ($demonIDs) AND starDemon != 0) extremePlatformer
	        )");
    	    $demonsCount->execute();
	        return $demonsCount->fetch();
	    }
    }