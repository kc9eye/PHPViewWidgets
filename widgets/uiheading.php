<?php
//File: uiheading.php
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
    //class: PHPViewWidgets\Widgets\UIHeading
    //This class represents a heading widget.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //heading - The string heading.
    //size - The optional integer denoting the heading size (default is 1, the largest)
    //id - The optional id attribute.
    //style - The optional style attribute.
    //other - An optional attribute to add verbatium
    class UIHeading extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            $size = isset($this->opts->size) ? "{$this->opts->size}" : "1";
            
            $this->out .= "<h{$size}";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->heading) ? "{$this->opts->heading}" : "";
            $this->out .= "</h{$size}";
            return $this->out;
        }
    }
}