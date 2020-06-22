<?php
/**
 * file: uilink.php
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
     * class: UData\Widgets\UILink
     * 
     * Creates a widget representing an HTML anchor element
     * 
     * about: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * topic: Options
     * 
     * This widget accepts all the standard options.
     * 
     * See Also:
     * 
     * <UData\Widgets\WidgetOptions>
     */
    class UILink extends StdBase {
 
        /**
         * constructor: __construct
         * 
         * Parameters:
         * 
         * <UData\Widgets\WidgetOptions> $opts - An optional options widget.
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
            $this->out .= "<a";
            $this->out .= isset($this->opts->href) ? " href='{$this->opts->href}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->string) ? $this->opts->string : "";
            $this->out .= "</a>";
            return $this->out;
        }
    }
}