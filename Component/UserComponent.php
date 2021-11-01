<?php
/*
 *  File: /Component/UserComponent.php                                         *
 *  Project: hcaptcha                                                          *
 *  File Created: 25-10-2021 20:49:11                                          *
 *  Author: Jan Loeper <info@tremendo.de>                                      *
 *  -----                                                                      *
 *  Last Modified: 31-10-2021 10:01:19                                         *
 *  Modified By: Jan Loeper <info@tremendo.de>                                 *
 *  -----                                                                      *
 *  Copyright (c) 2021 Jan Loeper                                              *
 *  Licensed under the MIT License.                                            *
 *  See http://www.opensource.org/licenses/MIT for details.                    *
 */

namespace Tremendo\Hcaptcha\Component;

use OxidEsales\Eshop\Core\Registry;
use Tremendo\Hcaptcha\Core\Captcha;

class UserComponent extends UserComponent_parent {

    public function registerUser() {
        $captcha = new Captcha();
        if ($captcha->isValid()) {
            parent::registerUser();
        }
        else {
            Registry::getUtilsView()->addErrorToDisplay('TREMENDO_HCAPTCHA_CAPTCHA_ERROR');
            return false;
        }    
    }

}
