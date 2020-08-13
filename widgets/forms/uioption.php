<?php
//File: uioption.php
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
//namespace: PHPViewWidgets\Widgets\Forms
namespace PHPViewWidgets\Widgets\Forms {

    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIWidget;

//class: PHPViewWidgets\Widgets\Forms\UIOption
    //Represents an option form object
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //option - the displayed option
    //value - an optional value attribute
    //id - an optional id attribute
    //selected - an optional index, indicating the option is selected when displayed
    //other - an optional attribute to add verbatium
    class UIOption extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            $this->out .= "<option";
            $this->out .= isset($this->opts->value) ? " value='{$this->opts->value}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= isset($this->opts->selected) ? " selected" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->option) ? "{$this->opts->option}" : "";
            $this->out .= "</option>";
            return $this->out;
        }
    }
}