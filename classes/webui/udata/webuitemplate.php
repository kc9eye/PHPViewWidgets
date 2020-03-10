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
namespace UData {
    class WebUITemplate implements Widget {
        public $View;
        public $Head;
        public $Body;
        public $Container;
        public $Top;
        public $Middle;
        public $Left;
        public $Center;
        public $Right;
        public $Foot;

        public function __construct () {
            $this->Head = new HTMLHead();
            $this->Head->Add(new WidgetContainer([
                new UIString(new WidgetOptions(['string'=>"<meta charset='utf-8' />"])),
                new UIString(new WidgetOptions(['string'=>"<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>"])),
                new UIString(new WidgetOptions(['string'=>"<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>"])),
                new UIString(New WidgetOptions(['string'=>"<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>"])),
                new UIString(new WidgetOptions(['string'=>"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>"])),
                new UIString(new WidgetOptions(['string'=>"<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>"]))
            ]));
            $this->Top = new UIDivision(new WidgetOptions(['class'=>"row"]));
            
            $this->Left = new UIDivision(new WidgetOptions(['class'=>"col"]));
            $this->Center = new UIDivision(new WidgetOptions(['class'=>"col"]));
            $this->Right = new UIDivision(new WidgetOptions(['class'=>"col"]));

            $this->Middle = new UIDivision(new WidgetOptions(['class'=>"row"]));
            $this->Middle->Add(new WidgetContainer([
                $this->Left,
                $this->Center,
                $this->Right
            ]));

            $this->Foot = new UIDivision(new WidgetOptions(['class'=>"row"]));

            $this->Container = new UIDivision(new WidgetOptions(['class'=>"container-fluid"]));
            $this->Container->Add(new WidgetContainer([
                $this->Top,
                $this->Middle,
                $this->Foot
            ]));

            $this->Body = new UIBody(new WidgetOptions(['id'=>uniqid()]));
            $this->Body->Add($this->Container);

            $this->View = new WidgetContainer([$this->Head,$this->Body]);
        }

        public function SetOptions (WidgetOptions $opts) {
            trigger_error("WebUITemplate does not implement any options at this time.",E_USER_NOTICE);
        }

        public function Display () {
            echo $this->ToString();
        }

        public function ToString () {
            return $this->View->ToString();
        }
    }
}