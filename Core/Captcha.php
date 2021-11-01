<?php
/*
 *  File: /Core/Captcha.php                                                    *
 *  Project: hcaptcha                                                          *
 *  File Created: 21-10-2021 19:56:48                                          *
 *  Author: Jan Loeper <info@tremendo.de>                                      *
 *  -----                                                                      *
 *  Last Modified: 31-10-2021 09:59:57                                         *
 *  Modified By: Jan Loeper <info@tremendo.de>                                 *
 *  -----                                                                      *
 *  Copyright (c) 2021 Jan Loeper                                              *
 *  Licensed under the MIT License.                                            *
 *  See http://www.opensource.org/licenses/MIT for details.                    *
 */

namespace Tremendo\Hcaptcha\Core;

use OxidEsales\Eshop\Core\Registry;

class Captcha {

    private $data;

    private static $logger;

    public function __construct() {
        self::$logger = ModuleLogger::getLogger();

        if(
            Registry::getConfig()->getConfigParam('tremendo_hcaptcha_secret') &&
            Registry::getConfig()->getRequestParameter('h-captcha-response')
        ) {
            $this->data = [
                'secret' => Registry::getConfig()->getConfigParam('tremendo_hcaptcha_secret'),
                'response' => Registry::getConfig()->getRequestParameter('h-captcha-response')
            ];
        }
        else {
            self::$logger->error("Could not load configuration");
        }
            
    }

    public function isValid():bool {

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($this->data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        curl_close($verify);

        if(!$response) {
            self::$logger->error("Could not get response from hcaptcha server");
        }
        else {
            $responseData = json_decode($response);
            if($responseData->success) {
                return true;
            }
        }
        return false;
    }

}
