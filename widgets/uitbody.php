<?php
//File: uitbody.php
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
    //class: PHPViewWidgets\Widgets\UITbody
    //This class represents a tbody widget
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIContainer>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //id - an optional id attribute
    //class - an optional class attribute
    //style - an optional style attribute
    //other - an optional string to be added verbatium as an attribute
    class UITbody extends UIContainer {
        public function construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts,$widgets);
        }

        public function ToString() {
            $this->out .= "<tbody";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->class) ? " id='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->unspoolContainer();
            $this->out .= "</tbody>";
            return $this->out;
        }
    }
}