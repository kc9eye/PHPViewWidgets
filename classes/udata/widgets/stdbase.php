<?php
/**
 * file: stdbase.php
 * 
 * Topic: License
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
    use \UData;

    /**
     * class: UData\Widgets\StdBase
     * 
     * The standard class that all widgets inherit. Can be used to create
     * any widget required. By using the `string` option.
     * 
     * about: Implements
     * 
     * <UData\Widgets\Widget>
     */
    class StdBase implements Widget {
        protected $out;
        protected $opts;

        /**
         * constructor: __construct
         * 
         * Parameters:
         * 
         * <UData\Widgets\WidgetOptions> $opts - An optional options object to intiailize the widget with.
         */
        public function __construct (WidgetOptions $opts = null) {
            if (!is_null($opts)) $this->SetOptions($opts);
            $this->out = "";
        }

        /**
         * function: SetOptions
         * 
         * Sets the widget options to the given options object
         * 
         * Parameters:
         * 
         * <UData\Widgets\WidgetOptions> $opts - A widget options object
         * 
         * Returns:
         * 
         * Void
         */
        public function SetOptions (WidgetOptions $opts) {
            $this->opts = $opts;
        }

        /**
         * function: Display
         * 
         * Outputs the widget representation string to the stream.
         * 
         * Returns:
         * 
         * Void
         */
        public function Display () {
            echo $this->ToString();
        }

        /**
         * function: ToString
         * 
         * Returns the widget representation string.
         * 
         * > This widget will output the option `string` verbatium.
         * > Therefore, it can be used to create any needed widget string.
         * 
         * Returns:
         * 
         * String
         */
        public function ToString () {
            return $this->opts->string;
        }
    }
}