<?php class CAccount
{
    public static function verifyPassword($accountID, $password)
	{
        include __DIR__ . '/../main/DBConnect.php';
        $fetch = $db->prepare("SELECT hash FROM accounts WHERE accountID = :accountID");
        $fetch->execute([':accountID' => $accountID]);
        $response = $fetch->fetch();
        
        /* If the password hash from the database matches the player's password,
         * return 'true', otherwise return 'false'. */
        if(password_verify($password, $response['hash'])) return true;
        else return false;
	}
}