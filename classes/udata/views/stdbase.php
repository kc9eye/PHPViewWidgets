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
namespace UData\Views {
    use \UData\Widgets;
    use \UData\Widgets\Elements;

    class StdBase extends Widgets\StdBase implements View {
        protected $view;
        protected $head;
        protected $body;
        protected $container;

        public function __construct (Widgets\WidgetOptions $opts = null) {
            parent::__construct($opts);
            $this->head = new Elements\HTMLhead();
            $this->head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<meta charset='utf-8' />"])));
            $this->head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>"])));
            $this->head->Add(new Widgets\UIHeadString(new Widgets\WidgetOptions(['string'=>"<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>"])));
            $this->head->Add(new Widgets\UIScript(New Widgets\WidgetOptions(['src'=>"https://code.jquery.com/jquery-3.4.1.slim.min.js",'other'=>"integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'"])));
            $this->head->Add(new Widgets\UIScript(new Widgets\WidgetOptions(['src'=>"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",'other'=>"integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'"])));
            $this->head->Add(new Widgets\UIScript(new Widgets\WidgetOptions(['src'=>"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",'other'=>"integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'"])));

            $this->body = new Elements\UIBody(new Widgets\WidgetOptions(['id'=>uniqid()]));
            $this->container = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"container-fluid",'id'=>"container"]));
            $this->body->Add($this->container);

            $this->view = new Elements\WidgetContainer([$this->head,$this->body]);
        }

        public function View () {
            return $this->view;
        }
        
        public function Head () {
            return $this->head;
        }

        public function Body () {
            return $this->body;
        }

        public function Container () {
            return $this->container;
        }

        public function ToString() {
            return $this->view->ToString();
        }
    }
}