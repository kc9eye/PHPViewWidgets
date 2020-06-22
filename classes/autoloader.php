<?php
/**
 * file: autoloader.php
 * 
 * topic: License
 * 
 * Copyright (C) 2018 Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * 
 * it under the terms of the GNU General Public License as published by
 * 
 * the Free Software Foundation; version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * 
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

/**
 * class: Autoloader
 * 
 * This class handles all class autoloading
 * 
 * -------------php-------------
 * new Autoloader($initial_path,$class_ext);
 * -----------------------------
 */
Class Autoloader {
    private $dir;
    private $extns;

    /**
     * function: __construct
     * 
     * Class constructor
     * 
     * Parameters:
     * 
     * $initial_path - Is a string URL of the base directory to search for object files.
     * $class_ext - Is an unindexed string array of possible file extensions of class object files.
     */
    public function __construct ($initial_path, $class_ext = []) {
        $this->SetIncludePath($initial_path);
        $this->SetLoadableExtensions($class_ext);
        spl_autoload_register([$this,'load']);
    }


    private function load ($obj) {
        spl_autoload(strtolower($obj));
    }

    private function SetIncludePath ($base) {
        foreach(new DirectoryIterator($base) as $fileinfo) {
            if (!$fileinfo->isDot() && $fileinfo->isDir() && $fileinfo->getFilename() != '.git') {
                set_include_path(get_include_path().PATH_SEPARATOR.$fileinfo->getPathname());
                $this->SetIncludePath($fileinfo->getPathname());
            }
        }
    }

    private function SetLoadableExtensions ($exts) {
        foreach($exts as $ext) {
            spl_autoload_extensions(spl_autoload_extensions().','.$ext);
        }
    }

}