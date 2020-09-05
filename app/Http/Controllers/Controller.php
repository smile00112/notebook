<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use GuzzleHttp\Client as GuzzleClient;
use Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $url = 'https://pironet.ru/index.php?route=api/';
    private $cache = 1800;
    
    private $token = 'zxL38cPHtEjprBydbnTcRRX703jlLSuJzOt1RIGZ3cztpicKc2udFCQoHIgS0LmMoOZRPQb8jFw2WDTuZqljiNimM6dmp8QKdvJkB2vdCK6soC5pEfGsEEzPhiln7zpfglu7sL1MGVN1VDpq1Nk61GICYyFDAAl8zGaectEovUTjMxhtKfErXPqW2oUNIJJg1cmShKyt1tZ5cVVzO1cxKyPMq8PBGEsoeM5WXqRfeF2WBB7YPNbhL0NhWDihsunM';

    private function pironetLogin(){

        //смотрим была ли авторизация ранее
        if (Cache::has('loginToken')) {
            echo '-1--';
            echo $token =  Cache::get('loginToken');
            echo '---';
            if( $this->pironetCheckLogin($token) ) 
                return $token;

        }
            /*
            //если авторизации не было или просрочилась
            try {
                $client = new GuzzleClient([
                    'headers' => [
                    ],
                ]);

                $response = $client->request('POST', 'https://pironet.ru/index.php?route=api/login',
                    [
                        'key'=>$this->token,
                        'query' => ['key'=>$this->token],
                        'form_params' => [
                            'grant_type' => 'authorization_code',
                            'client_id' => 'client-id',
                            'client_secret' => 'client-secret',
                            'redirect_uri' => 'http://example.com/callback',
                            
                        ]
                    ]);
                echo $this->url.'login';
                print_r($response->getBody());
                $result = json_decode($response->getBody(), true);

            } catch (ClientException $e) {

                Log::error('Yandex Metrika: '.$e->getMessage());
                echo 'Yandex Metrika: '.$e->getMessage();

                $result = null;
            }
            */
            //print_r( $result );

            // $http = new GuzzleClient;
            // $response = $http->post('https://pironet.ru/index.php?route=api/login', [
            //     'form_params' => [
            //         'key' => $this->token,
            //     ],

            // ]);


            // $result = json_decode((string) $response->getBody(), true);

            // if(isset($result['error'])){
            //     $this->showError( $result['error'] );
            //     return false;
            // }
            // print_r($result);
            // if(isset($result['success'])){    
            //     Cache::put('loginToken', $result['token'], $this->cache);
            //     return $result['token'];
            // }
            // Cache::get('loginToken')

        return false;
    }
    
    public function showError($error){
        echo $error;
        exit;
    }

    private function pironetCheckLogin($token, $route = 'login/check_login'){

        // try {
        //     $client = new GuzzleClient([
        //         'headers' => [
        //             'token' => $token,
        //         ],
        //     ]);
 
        //     $response = $client->request('GET', $this->url.$route,
        //         ['query' => ['token'=>$token]]);
 
        //     $result = json_decode($response->getBody(), true);
 
        // } catch (ClientException $e) {
        //     Log::error('Yandex Metrika: '.$e->getMessage());
 
        //     $result = null;
        // }

        // $http = new GuzzleClient;
        // $response = $http->post($this->url.$route.'&token='.$token, [
     
        //     // 'form_params' => [
        //     //     'key' => $this->token,
        //     // ],
    
        // ]);
        // $result = json_decode($response->getBody(), true);


        echo 'pironetCheckLogin';
        print_R($result);
       // exit;
        return false;
    }

    public function pironetRequest($route, $method){

        //Получаем токен
        //$token = $this->pironetLogin();
       // $token = 'U2Mpis6pYVsVRbvi85NaP5y1zSnIRuyt';

        //$cacheName = $this->counter_id.'_'.$name;
        $cacheName = $route.'_name';
        if (Cache::has($cacheName))
             return Cache::get($cacheName);
        // }
                //     $ch = curl_init();
                //     curl_setopt($ch, CURLOPT_URL,$this->url.$route.'&token='.$token);
                //     curl_setopt($ch, CURLOPT_POST, 1);
                //    // curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
                //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                //     $headers = [
                //         'X-Apple-Tz: 0',
                //         'X-Apple-Store-Front: 143444,12',
                //         'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                //         'Accept-Encoding: gzip, deflate',
                //         'Accept-Language: en-US,en;q=0.5',
                //         'Cache-Control: no-cache',
                //         'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
                //         'Host: www.pironet.ru',
                //         'Referer: https://pironet.ru', //Your referrer address
                //         'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
                //         'X-MicrosoftAjax: Delta=true'
                //     ];
                    
                //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    
                //     $server_output = curl_exec ($ch);
                    
                //     curl_close ($ch);
                    
                //     print  $server_output ;

                //     exit;
        try {
            // $client = new GuzzleClient([
            //     'headers' => [
            //         'Content-Type'  => 'application/x-yametrika+json',
            //         'token' => $token,
            //     ],
            // ]);
 
            // $response = $client->request('GET', $this->url,
            //     ['query' => $urlParams]);
           // echo $this->url.$route.'&token='.$this->$token;
            $client = new GuzzleClient;
            $response = $client->get($this->url.$route.'&token='.$this->token, [
                // 'headers' => [
                //     'Content-Type'  => 'application/x-yametrika+json',
                //     'token' => 'VWGvEElvTiMeWU4pYTGUvgjwyCpWyIv9',
                // ],
                // 'form_params' => [
                //     'token' => 'VWGvEElvTiMeWU4pYTGUvgjwyCpWyIv9',
                //     'key' => $this->token,
                // ],
        
            ]);
            $result = json_decode($response->getBody(), true);

            if(isset($result['error'])){
                $this->showError( $result['error'] );
                return false;
            }

        } catch (ClientException $e) {
            Log::error('Pironet Request Error: '.$e->getMessage());
 
            $result = null;
        }
 
        if ($result) {
            Cache::put($cacheName, $result);
        }
        
        return $result;

    }
}
