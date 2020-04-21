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
    use \UData\Widgets\Complex;
    use \UData\Widgets\Elements;

    class DefaultView extends StdBase implements Scheme,NavBar {
        protected $content;
        protected $nav;
        protected $toolbar;

        public function __construct (Widgets\WidgetOptions $opts = null) {
            parent::__construct($opts);

            //Header construction
            $header = new Elements\UIDivision(
                new Widgets\WidgetOptions([
                    'class'=>'row bg-dark text-light border-bottom border-light px-2',
                    'id'=>'header'
                    ]
                )
            );
            $header->Add(
                new Widgets\UIHeading(
                    new Widgets\WidgetOptions(['string'=>'UData4.5'])
                )
            );

            //Navbar construction
            $nav = new Complex\Navigator();
            $this->nav = $nav->Nav();
            $this->toolbar = $nav->Toolbar();
            $navigator = new Elements\UIDivision(
                new Widgets\WidgetOptions(['class'=>'row bg-dark text-light border-bottom border-light','id'=>'navigator'])
            );
            $navigator->Add($nav);

            //Content construction
            $this->content = new Elements\UIDivision(
                new Widgets\WidgetOptions([
                    'class'=>'row',
                    'id'=>'content',
                    'style'=>'min-height:82vh'
                ])
            );

            //Footer construction
            $footer = new Elements\UIDivision(
                new WIdgets\WidgetOptions([
                    'class'=>'row bg-dark text-light border-top border-light',
                    'id'=>'footer'
                ])
            );
            $footer->Add(
                new Widgets\UIString(
                    new Widgets\WidgetOptions([
                        'class'=>'font-weight-light small',
                        'string'=>"Copyright 2020 Paul W. Lane"
                    ])
                )
            );

            //Adding to container
            $this->Container()->Add($header);
            $this->Container()->Add($navigator);
            $this->Container()->Add($this->content);
            $this->Container()->Add($footer);
        }

        public function Content () : Elements\UIDivision {
            return $this->content;
        }

        public function Nav () : Elements\UINav {
            return $this->nav;
        }

        public function Toolbar () : ELements\UIList {
            return $this->toolbar;
        }
    }


}