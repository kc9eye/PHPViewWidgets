<?php
//File: bs4row.php
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
//
//namespace: PHPViewWidgets\Templates
namespace PHPViewWidgets\Templates {

    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIDiv;

//class: PHPViewWidgets\Templates\BS4Row
    //If not used within a BS4Body then a regular division is displayed with given options
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIDiv>
    //
    //See Also:
    //<PHPViewWidgets\Widgets\UIDiv> for available options
    class BS4Row extends UIDiv {
        public function __construct(Options $opts = null, Array $widgets = []) {
            if (!is_null($opts)) {
                $opts->class = isset($opts->class) ? "row {$opts->class}" : "row";
            }
            else {
                $opts = new Options(['class'=>'row']);
            }
            parent::__construct($opts,$widgets);
        }
    }
}