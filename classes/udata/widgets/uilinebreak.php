<?php
/**
 * file: uilinebreak.php
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
     * class: UData\Widgets\UILineBreak
     * 
     * Creates a widget representing an HTML linebreak
     * 
     * About: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * Topic: Options
     * 
     * This widget accepts the following non-standard option:
     * intger count - Is an optional integer indicating how many line breaks required.
     * All other options are disregarded.
     */
    class UILineBreak extends StdBase {
 
        /**
         * constructor: __conatruct
         * 
         * Parameters:
         * 
         * <UData\Widgets\WidgetOptions> $opts - An optional options object
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
         * -------------------
         */
        public function Display () {
            parent::Display();
        }

        /**
         * method: ToString
         * 
         * Returns:
         * 
         * string - Representing the widget.
         */
        public function ToString () {
            if (isset($this->opts->count)) {
                for($cnt = 0; $cnt <= $this->opts->count; $cnt++) {
                    $this->out .= "<br />";
                }
            }
            else 
                $this->out .= "<br />";
            return $this->out;
        }
    }
}