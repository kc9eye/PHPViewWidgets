<?php
/**
 * file: uiheading.php
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
     * class: UData\Widgets\UIHeading
     * 
     * Creates a heading element.
     * 
     * about: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * topic: Options
     * 
     * This widget accepts the following non-stanadrd options:
     * 
     * size - An integer representing the size of the heading element,
     * the absence of which will default to size 1.
     */
    class UIHeading extends StdBase {

        /**
         * constructor: __cosntruct
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
         * String representation of the widget.
         */
        public function ToString () {
            $this->out .= isset($this->opts->size) ? "<h{$this->opts->size}" : "<h1";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">{$this->opts->string}</h";
            $this->out .= isset($this->opts->size) ? "{$this->opts->size}>" : "1>";
            return $this->out;
        }
    }
}