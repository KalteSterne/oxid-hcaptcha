<?php
/*
 *  File: /Controller/SuggestController.php                                    *
 *  Project: hcaptcha                                                          *
 *  File Created: 27-10-2021 17:31:18                                          *
 *  Author: Jan Loeper <info@tremendo.de>                                      *
 *  -----                                                                      *
 *  Last Modified: 31-10-2021 09:54:30                                         *
 *  Modified By: Jan Loeper <info@tremendo.de>                                 *
 *  -----                                                                      *
 *  Copyright (c) 2021 Jan Loeper                                              *
 *  Licensed under the MIT License.                                            *
 *  See http://www.opensource.org/licenses/MIT for details.                    *
 */

namespace Tremendo\Hcaptcha\Controller;


use OxidEsales\Eshop\Core\Registry;
use Tremendo\Hcaptcha\Core\Captcha;

class SuggestController extends SuggestController_parent {

    public function send() {
       
        $captcha = new Captcha();
        if ($captcha->isValid()) {
            parent::send();
        }
        else {
            Registry::getUtilsView()->addErrorToDisplay('TREMENDO_HCAPTCHA_CAPTCHA_ERROR');
            return false;
        }
    }

}
