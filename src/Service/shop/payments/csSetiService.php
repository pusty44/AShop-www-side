<?php
/**
 * Created by PhpStorm.
 * User: Dawid Pierzak
 * Date: 04.01.2019
 * Time: 02:15
 */

namespace App\Service\shop\payments;


use App\Service\responsesService;

class csSetiService
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
     * Check if sms is valid in csSeti api
     * @param string $key
     * @param string $code
     * @param string $comment
     * @return mixed
     */
    function checkSms(string $key, string $code, string $comment){
        if($key == NULL || $key == '' || $code == NULL || $code == '' || !ctype_alnum($code)) return $this->response->getResponse(100);
        $response = json_decode(file_get_contents(sprintf('https://cssetti.pl/Api/SmsApiV2CheckCode.php?UserId=%d&Code=%d', $key, $code)));
        $value = intval($response);
        if($value > 0) return $this->response->getResponse(200);
        /** key or code was not declared */
        else if($value == -3) return $this->response->getResponse(500);
        /** key or code has invalid characters */
        else if($value == -2) return $this->response->getResponse(500);
        else if($value == 0) return $this->response->getResponse(902);
        else return $this->response->getResponse(500);
    }

}