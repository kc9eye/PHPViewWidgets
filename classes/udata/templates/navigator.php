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
    class Navigator extends NavBarTemplate {
        public function __construct () {
            parent::__construct();
            $brand = new Widgets\UINavBrand(new Widgets\WidgetOptions(['href'=>'/','string'=>"Safety"]));

            $pdrop = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"dropdown-menu"]));
            $pdrop->Add(new Widgets\UILink(new Widgets\WidgetOptions(['href'=>"?i=\udata\products&a=search",'string'=>"Products",'class'=>"dropdown-item"])));
            $pdrop->Add(new Widgets\UILink(new Widgets\WidgetOptions(['href'=>"?i=\udata\products&a=bom",'string'=>"Bill of Materials",'class'=>"dropdown-item"])));

            $products = new Elements\UIListItem(new Widgets\WidgetOptions(['class'=>'nav-item dropdown']));
            $products->Add(new Widgets\UILink(new Widgets\WidgetOptions([
                'class'=>'nav-link dropdown-toggle','id'=>"navbardrop",'href'=>"#",'other'=>"data-toggle='dropdown'",'string'=>"Products"
            ])));
            $products->Add($pdrop);

            $wdrop = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"dropdown-menu"]));
            $wdrop->Add(new Widgets\UILink(new Widgets\WidgetOptions(['href'=>"?i=\udata\cells&a=search",'string'=>"Search",'class'=>"dropdown-item"])));
            $wdrop->Add(new Widgets\UILink(new Widgets\WidgetOptions(['href'=>"?i=\udata\cells&a=material",'string'=>"Cell Material",'class'=>"dropdown-item"])));
            $cells = new Elements\UIListItem(new Widgets\WidgetOptions(['class'=>"nav-item dropdown"]));
            $cells->Add(new Widgets\UILink(new Widgets\WidgetOptions([
                'class'=>'nav-link dropdown-toggle','id'=>"navbardrop",'href'=>"#",'other'=>"data-toggle='dropdown'",'string'=>"Work Cells"
            ])));
            $cells->Add($wdrop);

            $this->Navigator->Insert($brand,0);
            $this->Toolbar->Add($products);
            $this->Toolbar->Add($cells);
        }
    }
}