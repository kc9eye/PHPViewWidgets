<?php
//File: bs4button.php
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
//namespace: PHPViewWidgets\Templates
namespace PHPViewWidgets\Templates {

    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIWidget;

//class: PHPViewWidgets\Templates\BS4Button
    //This class represents a Boostrap 4 Button widget
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the following options:
    //
    //id - an optional id attribute
    //class - an optional class attribute
    //style - an optional style attribute
    //other - an optional string to use verbatium as attribute
    //toggle - an optional data-toggle attribute
    //target - an optional data-target attribute
    //type - an optional type attribute, if the href option is empty then the default type of 'button' is used
    //href - an optional href attribute, if not empty then an anchor with the role of 'button'
    //role - an optional role attribute, if the href option is not empty the default role of 'button' is used
    //color - an optional BS4 color for the button, the default of 'btn-light' is used
    //string - the string for the button
    class BS4Button extends UIWidget {
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        public function ToString() {
            if (isset($this->opts->href)) {
                $this->out .= "<a";
                $this->out .= " href='{$this->opts->href}'";             
                $this->out .= isset($this->opts->role) ? " role='{$this->opts->role}'" : " role='button'";                
                $this->setCommon();                
                $this->out .= "</a>";
            }
            else {
                $this->out .= "<button";
                $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'" : " type='button'";
                $this->setCommon();
                $this->out .= "</button>";
            }
            return $this->out;
        }

        private function setCommon() {
            $this->out .= " class='btn";
            $this->out .= isset($this->opts->color) ? " {$this->opts->color}" : " btn-light";
            $this->out .= isset($this->opts->class) ? " {$this->opts->class}'" : "'";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= isset($this->opts->target) ? " data-target='{$this->opts->target}'" : "";
            $this->out .= isset($this->opts->toggle) ? " data-toggle='{$this->opts->toggle}'" : "";
            $this->out .= isset($this->opts->string) ? ">{$this->opts->string}" : "";
        }
    }
}