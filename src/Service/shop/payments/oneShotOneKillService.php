<?php
/**
 * Created by PhpStorm.
 * User: Dawid Pierzak
 * Date: 04.01.2019
 * Time: 01:51
 */

namespace App\Service\shop\payments;
use App\Service\responsesService;

class oneShotOneKillService
{
    private $response;

    /**
     * constructor.
     * @param responsesService $responsesService
     */
    public function __construct(responsesService $responsesService){
        $this->response = $responsesService;
    }

    /**
     * Check if sms is valid in 1shoot1kill api
     * @param string $key
     * @param string $code
     * @param string $comment
     * @return mixed
     */
    function checkSms(string $key, string $code, string $comment){
        if($key == NULL || $key == '' || $code == NULL || $code == '') return $this->response->getResponse(100);
        $response = json_decode(file_get_contents(sprintf('http://www.1shot1kill.pl/api?type=sms&key=%d&sms_code=%d&comment=%d', $key, $code, $comment)));
        if(!is_array($response)) return $this->response->getResponse(100);
        if($response['status'] == 'ok') return $this->response->getResponse(200);
        else if(
            $response['desc'] == 'internal api error' ||
            $response['desc'] == 'wrong api key' ||
            $response['desc'] == 'wrong api type'
        ) return $this->response->getResponse(500);
        else if($response['desc'] == 'empty sms code') return $this->response->getResponse(903);
        else if($response['desc'] == 'wrong sms code') return $this->response->getResponse(902);
        else if($response['desc'] == 'sms code already used') return $this->response->getResponse(901);
        else if($response['desc'] == 'sms code expired') return $this->response->getResponse(904);
        else return $this->response->getResponse(500);

    }

}