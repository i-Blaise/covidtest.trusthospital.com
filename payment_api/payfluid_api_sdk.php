<?php

namespace payfluid;

// include the configuration file
include_once dirname(__FILE__) . "/payfluid_config.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
include('Crypt/RSA.php');
include('Math/BigInteger.php');
include('Crypt/Hash.php');
include('Crypt/Random.php');
include('Crypt/Base.php');
include('Crypt/Rijndael.php');
include('Crypt/AES.php');
class MerchantAPI
{


    /**
     *
     * @param string $reference
     *            reference number against which payment is made against
     * @param string $currency
     *            transaction currency
     * @param double $amount
     *            amount of invoice
     * @param string $otherInfo
     *            extra information for payment
     * @param string $descr
     *            description to be shown on the invoice
     * @param string $name
     *            name of the customers account
     * @param string $mobile
     *            customers contact phone number to which sms should be sent
     * @param string $email
     *            customers email where invoice will be sent
     * @param string $redirectUrl
     *            url that will handle customer payment process
     * @param string $callbackUrl
     *            url that will handle instant payment notification
     * @param string $lang
     *            language to use
     */

    public static function createPayLink($currency, $amount, $reference, $descr, $redirectUrl, $callbackUrl, $name, $otherInfo, $lang, $mobile, $email)
    {
        $amount = number_format($amount,1);
        $RSA_publicKey = PAYFLUID_API_KEY;
        $date = new \DateTime();
        $dateTime = $date->format('YmdHisv');

        $rsa = new \phpseclib\Crypt\RSA();
        $rsa->loadKey(PAYFLUID_API_KEY);
        $rsa->setEncryptionMode(2);
        $data = PAYFLUID_LOGIN_PARAMETER. "." . $dateTime;
        $output = $rsa->encrypt($data);
        $apiKey = base64_encode($output);
        $kek = '';
        $session = '';

        //Create Secure Credentials
        $url = PAYFLUID_BASE_URL. '/secureCredentials';
        $postdata = array(
            'cmd' => 'getSecureParams',
            'datetime' => $dateTime,
        );
        $headers = [
            'apiKey: ' . $apiKey,
            'id: ' . base64_encode(PAYFLUID_API_ID),
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // this function is called by curl for each header received
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$headers) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) // ignore invalid headers
                {
                    return $len;
                }

                $headers[strtolower(trim($header[0]))][] = trim($header[1]);
                return $len;
            }
        );
        $data = curl_exec($ch);

        $response = json_decode($data);

        if ($response->resultCode == "00") {

            $kek = $headers['kek'][0]; // set kek
            $session = $response->session; // set session

            // proceed to get link for the payment

            // get the rsa public key and salt from kek by exploding kek public var.

            $kek = explode(".", $kek);
            $RSA_publicKey = $kek[0];
            $sha256_salt = $kek[1];

            if(PAYFLUID_AUTO_VERIFY){
                //JUST HELPING YOU OUT IF YOU HAVE NO MEANS OF STORING SESSION DATA
                $hash_key = md5(hash_hmac('sha256', PAYFLUID_API_KEY, md5(PAYFLUID_API_KEY)));
                $aes = new \phpseclib\Crypt\AES();
                $aes->setKey($hash_key);
                $token = bin2hex($aes->encrypt($session));
                $redirectUrl = MerchantAPI::addTokenToUrl($redirectUrl, 'token', $token);
            }

            $date = new \DateTime();
            $dateTime = $date->format('Y-m-d\TH:i:s.v\Z');
            
            // payment information
            $postdata = array(
                'amount' => floatval($amount),
                'currency' => $currency,
                'datetime' => $dateTime,
                'descr' => $descr,
                'email' => $email,
                'lang' => $lang,
                'mobile' => $mobile,
                'name' => $name,
                'otherInfo' => $otherInfo,
                'reference' => $reference,
                'responseRedirectURL' => $redirectUrl,
                'session' => $session,
                'trxStatusCallbackURL' => $callbackUrl,
            );

            ksort($postdata);

            $strtohash ='';
            foreach($postdata as $x => $p_value) {
               $strtohash .= $p_value;
            }

            //$strtohash = $amount . $currency . $dateTime . $descr . $email . $lang . $mobile . $name . $otherInfo . $reference . $redirectUrl . $session . $callbackUrl;

            
            $hashed_postdata = hash_hmac('sha256', $strtohash, $sha256_salt);
            //encrypt the hashed postdata in rsa format to produce signature that will be set as header
            //echo 'hashed: '.$hashed_postdata.'->';//
            $rsa = new \phpseclib\Crypt\RSA();
            $rsa->loadKey($RSA_publicKey);
            $rsa->setEncryptionMode(2);
            $output = $rsa->encrypt($hashed_postdata);
            $signature = base64_encode($output);
            $url = PAYFLUID_BASE_URL.'/getPayLink';
            $headers = [
                'signature : ' . $signature,
                'Content-Type: application/json',
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata,JSON_PRESERVE_ZERO_FRACTION)); //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $data = curl_exec($ch);

            //$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            //echo 'httpcode:'.$http_code.'->';
           //print_r($data);
            //$response = json_decode($data); // decode the json response

            echo $data;

        } else {
            echo json_encode($response);
        }
    }

    public static function verifyPayment($uri, $token){
        $data ='';
        $session ='';
       if(PAYFLUID_AUTO_VERIFY){
            //$info = explode('&qs=', $uri,2);
	//var_dump($info);
            //if(array_key_exists(0, $info)){
               // $token = $info[0];
                $hash_key = md5(hash_hmac('sha256', PAYFLUID_API_KEY, md5(PAYFLUID_API_KEY)));
                $aes = new \phpseclib\Crypt\AES();           
                $aes->setKey($hash_key);
                $session = $aes->decrypt(hex2bin($token));
            //}
			
            //if(array_key_exists(1, $info)){
                $data = urldecode(urldecode($uri));
            //}
           
            
            
       } else {
            $data = $uri;
            //YOU HAVE TO MANUALY FETCH YOUR SESSION ID YOU RECEIVED IN GETSECUREPARAMS; 
            $session ='';
       }
	   
	   //echo $data;

       if(empty($session)){
           return 'NO SESSION ID FOUND';
       } else {

            $json = json_decode($data, true, 512, JSON_BIGINT_AS_STRING);
            if(is_array($json) || is_object($json)){
                if(array_key_exists('aapf_txn_signature', $json)){
                    $values = '';
                    $signature = '';
                    foreach ($json as $key => $value) {
                        if($key !=='aapf_txn_signature'){
                            $values .= $value;
                        } else {
                            $signature = str_ireplace('" method', '',$value);
                        }
                    }
                    
                    $trx_signature = hash_hmac('sha256', $values, md5($session));

                    if(strcasecmp($signature, $trx_signature) == 0){
                        return json_encode($json);
                    } else {
                        return 'REDIRECT IS INVALID';
                    }
                } else {
                    return 'REDIRECT IS INVALID';
                }
            } else {
                return 'REDIRECT IS INVALID';
            }
        }
    }

    public function addTokenToUrl($url, $key, $value) {
	
        $url = preg_replace('/(.*)(?|&)'. $key .'=[^&]+?(&)(.*)/i', '$1$2$4', $url .'&');
        $url = substr($url, 0, -1);
        
         if (strpos($url, '?') === false) {
            return ($url .'?'. $key .'='. $value );
        } else {
            return ($url .'&'. $key .'='. $value);
        } 

        //return ($url .'/'. $key .'-'. $value. '/');
    }
}
