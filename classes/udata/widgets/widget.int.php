<?php
/** 
 * file: widget.int.php
 * 
 * topic: License
 * 
 * Copyright (C) 2020  Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * 
 * it under the terms of the GNU General Public License as published by
 * 
 * the Free Software Foundation; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * 
 * with this program; if not, write to the Free Software Foundation, Inc.
 * 
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 * 
 * namespace: UData\Widgets
 */
namespace UData\Widgets {
    /**
     * interface: UData\Widgets\Widget
     * 
     * Widget interface.
     */
    interface Widget {
        /**
         * method: SetOptions
         * 
         * Used to set options for the widget after initialization
         * 
         * parameters:
         * 
         * <UData\Widgets\WidgetOptions> $opts - A required options object defining the options for the widget.
         */
        public function SetOptions(WidgetOptions $opts);
        /**
         * method: Display
         * 
         * Calling this should produce output to the stream representing the widget
         */
        public function Display();
        /**
         * method: ToString
         * 
         * This method should return a string instead of sending it to the stream, representing the widget.
         * 
         * returns:
         * 
         * string
         */
        public function ToString();
    }
}