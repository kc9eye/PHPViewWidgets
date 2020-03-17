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
    use \UData;
    use \UData\Widgets;
    use \UData\Elements;
    use \UData\Templates;
    use \UData\Data;
    class StartUI implements UData\Controller {
        public function __construct () {
            $view = new Templates\DarkViewUI();
            $view->Head->Add(new Widgets\UITitle(new Widgets\WidgetOptions(['string'=>"UData4.5 Dark UI"])));

            $data = new Data\RowSet();
            $data->This = "That";
            $data->That = "This";
            $data->Those = "These";
            $data->These = "Those";

            $d = new Elements\UIPre(new Widgets\WidgetOptions(['class'=>"pre-scrollable"]));

            foreach($data->Params() as $p) {
                $d->Add(new Widgets\UIString(
                    new Widgets\WidgetOptions(['string'=>"{$p} =>{$data->{$p}}\n"])
                ));
            }

            $view->Center->Add($d);
            
            $view->Display();
        }
    }
}