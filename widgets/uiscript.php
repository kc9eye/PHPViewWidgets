<?php
//File: uiscript.php
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
    //class: PHPViewWidgets\Widgets\UIScript
    //This class represents a script widget, this class *IS NOT* a container class
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //Topic: Options
    //This class accepts the following options:
    //
    //src - An optional src attribute
    //type - An optional type attribute
    //other - An optional attribute to added verbatium
    //string - An optional string, that represents the any script between the open and close tags
    class UIScript extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            $this->out .= "<script";
            $this->out .= isset($this->opts->src) ? " src='{$this->opts->src}'" : "";
            $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'": "";
            $this->out .= isset($this->opts->other) ? "{$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->string) ? " {$this->opts->string}" : "";
            $this->out .= "</script>";
            return $this->out;
        }

    }
}