<?php
//File: uiselect.php
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
    use PHPViewWidgets\Widgets\UIContainer;

//class: PHPViewWidgets\Widgets\Forms\UISelect
    //Represents a select form object
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIContainer>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //class - an optional class attribute
    //name - an optional name attribute
    //id - an optional id attribute
    //multiple - an optional boolean, if true then the attribut 'multiple' is added
    //other - an optional item to add verbatium as option
    class UISelect extends UIContainer {
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts,$widgets);
        }

        public function ToString() {
            $this->out .= "<select";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->name) ? " name='{$this->opts->name}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->multiple) ? " mutiple" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->unspoolContainer();
            $this->out .= "</select>";
            return $this->out;
        }
    }
}