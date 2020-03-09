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
    class StartUI implements Controller {
        public function __construct () {
            $a = new WidgetContainer([
                new StringUI(new WidgetOptions(['string'=>"This string is red.",'style'=>"color:red"])),
                new LineBreak(new WidgetOptions(['count'=>4])),
                new StringUI(new WidgetOptions(['string'=>"This is the second string"])),
                new LineBreak(),
                new StringUI(new WidgetOptions(['string'=>"Yet another string"]))
            ]);
            $b = new WidgetContainer([
                new LineBreak(),
                new StringUI(new WidgetOptions(['string'=>"This string is in the second container"])),
                new LineBreak(),
                new StringUI(new WidgetOptions(['string'=>"Second container string with red background",'style'=>"background-color:red"])),
                new Image(new WidgetOptions(['url'=>new Url('?i=udata\images&src=/img/apex.jpg')]))
            ]);

            $i = new IOContainer([$a,$b]);
            foreach($i as $o)
                $o->Display();
            
        }
    }
}