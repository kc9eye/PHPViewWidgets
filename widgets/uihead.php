<?php
//File: uihead.php
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
//namespace: PHPViewWidgets\Widgets
namespace PHPViewWidgets\Widgets {
    //class: PHPViewWidgets\Widgets\UIHead
    //Represents a head widget. This class is a container class.
    //
    //Topic: Extends
    //<PHPViewWidgets\Widgets\UIContainer>
    //
    //Topic: Options
    //This widget accepts the following options:
    //
    //None
    class UIHead extends UIContainer {
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts, $widgets);
        }

        public function ToString() {
            $this->out .= "<head>";
            $this->unspoolContainer();
            $this->out .= "</head>";
            return $this->out;
        }
    }
}