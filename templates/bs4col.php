<?php
//File: bs4col.php
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

//class: PHPViewWidgets\Templates\BS4Col
    //Represents a bootstrap 4 basic layout column. All columns in a row will be distrubuted 
    //evenly accross the row viewport.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIDiv>
    //
    //See Also:
    //<PHPViewWidgets\Widgets\UIDiv> for available options
    class BS4Col extends UIDiv {
        public function __construct(Options $opts = null, Array $widgets = []) {
            if (!is_null($opts)) {
                $opts->class = isset($opts->class) ? "col {$opts->class}" : "col";
            }
            else {
                $opts = new Options(['class'=>"col"]);
            }
            parent::__construct($opts,$widgets);
        }
    }
}