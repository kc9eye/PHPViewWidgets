<?php
//File: uititle.php
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
    //class: PHPViewWidgets\Widgets\UITitle
    //This class represents a title widget, it *IS NOT* a container widget
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //title - The page title.
    class UITitle extends UIWidget {
        public function __construct(Options $opts) {
            parent::__construct($opts);
        }

        public function ToString() {
            $this->out .= "<title>";
            $this->out .= isset($this->opts->title) ? "{$this->opts->title}" : "";
            $this->out .= "</title>";
            return $this->out;
        }
    }
}