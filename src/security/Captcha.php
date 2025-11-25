<?php class Captcha {
	public static function displayCaptcha()
	{
		return "<script src='https://js.hCaptcha.com/1/api.js' id='captchascript' async defer></script>
				<div class=\"h-captcha\" id=\"coolcaptcha\" data-sitekey=\"0bde4456-df64-4faa-863c-7ebab7785598\" data-theme='dark' style='border-width: 0px !important;border-radius: 20px !important;'></div>";
	}

	public static function validateCaptcha()
	{
		
		if(isset($_GET['h-captcha-response'])) $_POST['h-captcha-response'] = $_GET['h-captcha-response'];
		$url = "https://hcaptcha.com/siteverify";
		$req = isset($_POST['h-captcha-response']) ? $_POST['h-captcha-response'] : null;
			
		$data = array(
			'secret' => '',
			'response' => $req
		);
		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, $url);
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($verify, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
		$response = curl_exec($verify);
		$responseData = json_decode($response);
		return $responseData->success;
	}
}