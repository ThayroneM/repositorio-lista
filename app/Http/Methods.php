<?php 

namespace App\Http;

class Methods{

    protected static $site = 'https://api.github.com';
    protected static $token = 'token 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';

    public static function get($uri, $params = ''){
        $ch = curl_init();
        
        $site = self::$site;
        $token = self::$token;
        
        ///users/ThayroneM/repos
        curl_setopt($ch, CURLOPT_URL,$site.$uri);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User-Agent: Awesome-Octocat-App',
            'Content-type: application/json',
            'Authorization: '.$token,
        ));
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $retorno = curl_exec($ch);
        curl_close($ch);

        return $retorno;

    }

}
?>