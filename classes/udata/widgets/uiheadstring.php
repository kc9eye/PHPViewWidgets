<?php
/**
 * file: uiheadstring.php
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
 * 
 */
namespace UData\Widgets {
    /**
     * class: UData\Widgets\UIHeadString
     * 
     * about: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * topic: Options
     * 
     * This widget accepts no other options than the following:
     * 
     * string - Is a string that will be output verbatium.
     * 
     * All other options given will be disregarded.
     */
    class UIHeadString extends StdBase {

        /**
         * constructor: __construct
         * 
         * Parameters: 
         * 
         * <UData\Widgets\WidgetOptions> $opts - An optional options object.
         */
        public function __construct (WidgetOptions $opts = null) {
            parent::__construct($opts);
        }

                /**
         * method: SetOptions
         * 
         * See Also:
         * 
         * <UData\Widgets\StdBase>
         */
        public function SetOptions (WidgetOptions $opts) {
            parent::SetOptions($opts);
        }

        /**
         * method: Display
         * 
         * See Also:
         * 
         * <UData\Widgets\StdBase>
         */
        public function Display () {
            parent::Display();
        }

        /**
         * method: ToString
         * 
         * Returns:
         * 
         * string - That represents the widget.
         */
        public function ToString () {
            $this->out .= $this->opts->string;
            return $this->out;
        }
    }
}