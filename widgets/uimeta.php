<?php
//File: uimeta.php
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
    //class: PHPViewWidgets\Widgets\UIMeta
    //This class represents a meta widget, it *IS NOT* a container widget.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the follwoing options:
    //name - The name attribute.
    //content - The content attribute.
    //http_equiv - An optional http-equiv attribute
    //charset - An optional charset attribute
    //other - An attribute to added verbatium
    class UIMeta extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            $this->out .= "<meta";
            $this->out .= isset($this->opts->name) ? " name='{$this->opts->name}'" : "";
            $this->out .= isset($this->opts->content) ? " content='{$this->opts->content}'" : "";
            $this->out .= isset($this->opts->http_equiv) ? " http-equiv='{$this->opts->http_equiv}'" : "";
            $this->out .= isset($this->opts->charset) ? " charset='{$this->opts->charset}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= " />";
            return $this->out;
        }
    }
}