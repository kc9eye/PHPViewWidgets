<?php
//File: uilabel.php
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
namespace PHPViewWidgets\Widgets\Forms
{
    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIWidget;

    //class: PHPViewWidgets\Widgets\Forms\UILabel
    //Represents a form input object
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the follwoing options:
    //
    //label - the label output
    //for - the input type (default: text)
    //class - an optional class attribute
    //style - an optional style attribute
    //id - an optional id attribute
     //other - an optional attribute to add verbatium

    class UILabel extends UIWidget
    {
        public function __construct(Options $opts = null)
        {
            parent::__construct($opts);
        }

        public function ToString()
        {
            $this->out .= "<label";
            $this->out .= isset($this->opts->for) ? " for='{$this->opts->for}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->label) ? "{$this->opts->label}" : "";
            $this->out .= "</label>";
            return $this->out;
        }
    }
}