<?php
/**
* MIT License
* Copyright (c) 2017 Paul W. Lane <kc9eye@outlook.com>
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.
*/
Class Autoloader {
    
    private $dir;
    private $extns;

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
new Autoloader(dirname(__DIR__),['.php','.int.php','.obj.php','.class.php']);