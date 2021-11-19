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

use GuzzleHttp\Client;
use OxidEsales\Eshop\Core\Registry;

class Captcha {

    private $data;
    private static $logger;

    public function __construct() {
        self::$logger = ModuleLogger::getLogger('tremendo-hcaptcha.log');

        $this->data = [
            'secret' => Registry::getConfig()->getConfigParam('tremendo_hcaptcha_secret'),
            'response' => Registry::getConfig()->getRequestParameter('h-captcha-response')
        ];  
    }

    public function isValid():bool {
        $client = new Client([
            'base_uri' => 'https://hcaptcha.com',
        ]);
          
        $response = $client->request('POST', '/siteverify', [
           'form_params' => [
                'secret' => $this->data['secret'],
                'response' => $this->data['response']
           ]
        ]);

        if ($response->getBody()) {
            $responseData = json_decode($response->getBody());
            if($responseData->success) {
                return true;
            }
            else if ($responseData->errorCodes) {
                foreach($responseData->errorCodes as $error) {
                    self::$logger->info($error);
                }
            }
        }
        else {
            self::$logger->error("Could not get response from hcaptcha server");
        }

        return false;
    }

}
