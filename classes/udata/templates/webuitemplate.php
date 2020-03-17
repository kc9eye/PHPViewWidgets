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
    use \UData\Widgets as Widgets;
    use \UData\Elements as Elements;
    class WebUITemplate implements Widgets\Widget {
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
            $this->Head = new Elements\HTMLHead();
                $this->Head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<meta charset='utf-8' />"])));
                $this->Head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>"])));
                $this->Head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>"])));
                $this->Head->Add(new Widgets\UIScript(New Widgets\WidgetOptions(['src'=>"https://code.jquery.com/jquery-3.4.1.slim.min.js",'other'=>"integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'"])));
                $this->Head->Add(new Widgets\UIScript(new Widgets\WidgetOptions(['src'=>"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",'other'=>"integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'"])));
                $this->Head->Add(new Widgets\UIScript(new Widgets\WidgetOptions(['src'=>"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",'other'=>"integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'"])));
        
            $this->Top = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"row",'id'=>"top"]));
            
            $this->Left = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"col",'id'=>"left"]));
            $this->Center = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"col",'id'=>"center"]));
            $this->Right = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"col",'id'=>"right"]));

            $this->Middle = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"row",'id'=>'middle']));
                $this->Middle->Add($this->Left);
                $this->Middle->Add($this->Center);
                $this->Middle->Add($this->Right);

            $this->Foot = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"row",'id'=>"foot"]));

            $this->Container = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"container-fluid",'id'=>"container"]));
                $this->Container->Add($this->Top);
                $this->Container->Add($this->Middle);
                $this->Container->Add($this->Foot);


            $this->Body = new Elements\UIBody(new Widgets\WidgetOptions(['id'=>uniqid()]));
            $this->Body->Add($this->Container);

            $this->View = new Elements\WidgetContainer([$this->Head,$this->Body]);
        }

        public function SetOptions (Widgets\WidgetOptions $opts) {
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