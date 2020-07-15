<?php
//File: uianchor.php
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
    //class: PHPViewWidgets\Widgets\UIAnchor
    //This class represents a paragraph widget
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //string - The inner paragraph string.
    //id - An optional id attribute.
    //class - An optional class attribute.
    //style - An optional style attribute.
    //other - An optional string to be used verbatium as an attribute.
    //href - the href attribute
    //string - the anchor string
    class UIAnchor extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            $this->out .= "<a";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->string) ? "{$this->opts->string}" : "";
            $this->out .= "</a>";
            return $this->out;
        }
    }