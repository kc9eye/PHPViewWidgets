<?php
//File: run.php
//
//About: License
//
//Copyright (C)2020 Paul W. Lane <kc9eye@gmail.com>
//
//This program is free software; you can redistribute it and/or modify
//
//it under the terms of the GNU General Public License as published by
//
//the Free Software Foundation; version 2 of the License.
//
//This program is distributed in the hope that it will be useful,
//
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License along
//
//with this program; if not, write to the Free Software Foundation, Inc.
//
//51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.

use PHPViewWidgets\Templates\BS4Body;
use PHPViewWidgets\Templates\BS4Col;
use PHPViewWidgets\Templates\BS4Head;
use PHPViewWidgets\Templates\BS4Row;
use PHPViewWidgets\Templates\DataGrid;
use PHPViewWidgets\Templates\GridData;
use PHPViewWidgets\Widgets\Options;
use PHPViewWidgets\Widgets\UIHeading;
use PHPViewWidgets\Widgets\UIHtml;
use PHPViewWidgets\Widgets\UITitle;

require_once("PHPViewWidgets/autoloader.php");

$data = new GridData([
    ['col1'=>'row1-1','col2'=>'row1-2','col3'=>"row1-3"],
    ['col1'=>'row2-1','col2'=>'row2-2','col3'=>"row2-3"],
    ['col1'=>'row3-1','col2'=>'row3-2','col3'=>'row3-3']
]);

$head = new BS4Head(null, [new UITitle(new Options(['title'=>"Testing Grid"]))]);
$body = new BS4Body(
    new Options(['class'=>"bg-dark text-light"]),
    [
        new UIHeading(new Options(['heading'=>"BS4 Grid Testing"])),
        new BS4Row(
            null,
            [
                new BS4Col(
                    new Options(['class'=>"bg-light text-dark m1"]),
                    [
                        new UIHeading(new Options(['heading'=>"Column 1", 'size'=>3])),
                        new DataGrid(['table'=>new Options(['class'=>"text-light bg-dark"])], $data, ["Column 1","Column 2","Column 3"])
                    ]
                ),
                new BS4Col(
                    new Options(['class'=>"bg-light text-dark m1"]), 
                    [
                        new UIHeading(new Options(['heading'=>"Column 2", 'size'=>3])),
                        new DataGrid(['table'=>new Options(['class'=>"text-light bg-dark"])], $data, ["Column 1","Column 2","Column 3"])
                    ]
                ),
                new BS4Col(
                    new Options(['class'=>"bg-light text-dark m1"]),
                    [
                        new UIHeading(new Options(['heading'=>"Column 3", 'size'=>3])),
                        new DataGrid(['table'=>new Options(['class'=>"text-light bg-dark"])], $data, ["Column 1","Column 2","Column 3"])
                    ]
                )
            ]
        )
    ]
);

$html = new UIHtml(null,[$head,$body]);

$html->Display();