<?php
/*
 * Copyright (C) 2020  Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */
namespace UData\Templates {
    use \UData;
    use \UData\Widgets;
    use \UData\Elements;
    class NavBarTemplate implements Widgets\Widget {
        public $Navigator;
        public $Collapse;
        public $Toggle;
        public $Toolbar;

        public function __construct () {
            $collapseid = \uniqid('collapse_');
            $this->Toolbar = new Elements\UIList(new Widgets\WidgetOptions(['class'=>"navbar-nav"]));

            $this->Collapse = new Elements\UIDivision(new Widgets\WidgetOptions([
                'class'=>"collapse navbar-collapse",'id'=>$collapseid
            ]));

            $btnimg = new Widgets\UIString(new Widgets\WidgetOptions(['class'=>"navbar-toggler-icon",'string'=>" "]));
            $this->Toggle = new Widgets\UIButton(new Widgets\WidgetOptions([
                'class'=>"navbar-toggler",
                'other'=>"data-toggle='collapse' data-target='#{$collapseid}'",
                'string'=>$btnimg->ToString()
            ]));

            $this->Navigator = new Elements\UINav(new Widgets\WidgetOptions(['class'=>"navbar navbar-expand-sm bg-dark navbar-dark w-100"]));
        
            $this->Collapse->Add($this->Toolbar);
            $this->Navigator->Add($this->Toggle);
            $this->Navigator->Add($this->Collapse);
        }

        public function SetOptions (Widgets\WidgetOptions $opts) {
            trigger_error("NavBarTemplate does not currently support WidgetOptions",E_USER_NOTICE);
        }

        public function Display () {
            echo $this->ToString();
        }

        public function ToString () {
            return $this->Navigator->ToString();
        }
    }
}