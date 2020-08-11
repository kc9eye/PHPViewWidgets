<?php
//File: uiform.php
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

//class: PHPViewWidgets\Widgets\Forms\UIForm
    //Represents a form widget
    //
    //About: Extends
    //<PHPViewWidgets\Widgets\UIContainer>
    //
    //About: Options
    //This widget accepts the following options:
    //
    //action - optional action url
    //method - an optional method attribute, one of post, or get
    //enctype - optional enctype, one of text/plain, multipart/form-data, application/x-www-form-encoded
    //class - optional class attributes
    //style - optional style attributes
    //id - optional id attribute
    //other - optional attribute to add verbatium
    class UIForm extends UIContainer {
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts,$widgets);
        }

        public function ToString() {
            $this->out .= "<form";
            $this->out .= isset($this->opts->action) ? " action='{$this->opts->action}'" : "";
            $this->out .= isset($this->opts->enctype) ? " enctype='{$this->opts->enctype}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->unspoolContainer();
            $this->out .= "</form>";
            return $this->out;
        }
    }
}