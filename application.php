<?php
/**
 * Main soruce point for the application
 * 
 * This file is the only file directly called by the web server.
 * All other elements are directly instantiated by this file.
 * UData4.5 is copyrighted under the GPL version 2 of the license.
 * None of this application is under warranty, expressed or derived
 * for any purpose.
*/
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
    session_name('UDATA');
    session_start();
    ob_start(null,0,PHP_OUTPUT_HANDLER_STDFLAGS^PHP_OUTPUT_HANDLER_REMOVABLE);

    include('classes/autoloader.php');
    new \Autoloader(__DIR__,['.php','.int.php','.obj.php']);
    new \Errorhandler('error_log.xml','https://github.com/kc9eye/udata4.5.git/issues');

    /**
     * The application class instantiated at run time.
     * 
     * All other elements are instantiated by this class
     * @version 1.0
     * @author Paul W. Lane
     */
    class Application {
        /**@var Configuration object - All Cofiguration class methods available */
        public static $AppConfig;

        public function __construct () {
            self::$AppConfig = new Configuration([
                'AppDir'=>__DIR__,
                'Version'=>4.5
                ]);

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