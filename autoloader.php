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

spl_autoload_register(function($obj){
    set_include_path(get_include_path().PATH_SEPARATOR.dirname(dirname(__FILE__)));
    spl_autoload(strtolower($obj));
});
