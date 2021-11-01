<?php
/*
 *  File: /Core/ModuleLogger.php                                               *
 *  Project: hcaptcha                                                          *
 *  File Created: 12-03-2021 10:45:46                                          *
 *  Author: Jan Loeper <info@tremendo.de>                                      *
 *  -----                                                                      *
 *  Last Modified: 31-10-2021 10:00:59                                         *
 *  Modified By: Jan Loeper <info@tremendo.de>                                 *
 *  -----                                                                      *
 *  Copyright (c) 2021 Jan Loeper                                              *
 *  Licensed under the MIT License.                                            *
 *  See http://www.opensource.org/licenses/MIT for details.                    *
 */

namespace Tremendo\Hcaptcha\Core;

use \OxidEsales\Eshop\Core\Registry;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Psr\Log\LogLevel;

/**
 * Class ModuleLogger
 *
 * @package Tremendo\Hcaptcha\Core
 */
class ModuleLogger {

    protected static $logger;
    
    /**
     * getLogger
     *
     * @param  string $path
     * @return Logger
     */
    public static function getLogger(string $filename = ''): Logger {
        $filename = ((!empty($filename)) ? $filename : 'oxideshop.log');
        $path = Registry::getConfig()->getLogsDir() . $filename;
        self::$logger = new Logger('tremendo-hcaptcha');
        self::$logger->pushHandler(
            new StreamHandler($path, LogLevel::INFO)
        );
        return self::$logger;
    }
}