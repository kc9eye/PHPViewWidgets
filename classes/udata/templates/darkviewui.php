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
    class DarkViewUI extends WebUITemplate {
        public function __construct () {
            parent::__construct();
            $style = new Widgets\WidgetOptions([
                'string'=>
                "#center{
                    min-height:81.7vmin;
                }
                #top,#foot{
                    background-color:#3d3b3b;
                    color:#f5f5f5;
                }"
            ]);
            $fonts = new Widgets\WidgetOptions([
                'string'=>
                "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous' />"
            ]);
            $this->Head->Add(new Widgets\UIHeadString($fonts));
            $this->Head->Add(new Widgets\UIHeadStyle($style));


            $top = new Widgets\WidgetOptions([
                'class'=>"row border border-white p-1",
                'id'=>"top"
            ]);
            $this->Top->SetOptions($top);
            $this->Top->Add(new Widgets\UIHeading(new Widgets\WidgetOptions(['string'=>"UData4.5"])));
            $this->Top->Add(new Widgets\UILineBreak());

            $nav = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"row"]));
            $nav->Add(new Navigator());
            $this->Container->Insert($nav,1);


            $footer = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"mx-auto"]));
            $footer->Add(new Widgets\UIString(new Widgets\WidgetOptions(['string'=>"This text is centered."])));
            $this->Foot->Add($footer);
        }
    }
}