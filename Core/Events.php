<?php
/*
 *  File: /Core/Events.php                                                     *
 *  Project: hcaptcha                                                          *
 *  File Created: 27-10-2021 17:53:38                                          *
 *  Author: Jan Loeper <info@tremendo.de>                                      *
 *  -----                                                                      *
 *  Last Modified: 31-10-2021 10:00:32                                         *
 *  Modified By: Jan Loeper <info@tremendo.de>                                 *
 *  -----                                                                      *
 *  Copyright (c) 2021 Jan Loeper                                              *
 *  Licensed under the MIT License.                                            *
 *  See http://www.opensource.org/licenses/MIT for details.                    *
 */

namespace Tremendo\Hcaptcha\Core;

use OxidEsales\Eshop\Core\Registry;

class Events {

    public static function onActivate() {
        self::clearCache();
    }

    public static function onDeactivate() {
        self::clearCache();
    }

    private static function clearCache() {
        $utilsView = Registry::get('oxUtilsView');
        $smartyDir = $utilsView->getSmartyDir();

        if ($smartyDir && is_readable($smartyDir)) {
            foreach (glob($smartyDir . '*') as $file) {
                if (!is_dir($file)) {
                    @unlink($file);
                }
            }
        }

        $oUtilsView->getSmarty(true);
    }
}
