<?php
/*
 * Copyright (C) 2020  Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */
namespace UData {
    session_name('UDID');
    session_start();
    ob_start(null,0,PHP_OUTPUT_HANDLER_STDFLAGS^PHP_OUTPUT_HANDLER_REMOVABLE);

    include('classes/autoloader.php');
    new \Autoloader(__DIR__,['.php','.int.php','.obj.php']);
    new \Errorhandler('error_log.xml','https://github.com/kc9eye/udata4.5.git/issues');

    class Application {
        public static $AppConfig;

        public function __construct () {
            self::$AppConfig = new Configuration(['AppDir'=>__DIR__]);

            try {
                if (!isset($_REQUEST['i'])) 
                    new StartUI();
                else
                    new $_REQUEST['i']();
            }
            catch (Exception $e) {
                new FourOFour();
            }
        }
    }

    new Application();
}