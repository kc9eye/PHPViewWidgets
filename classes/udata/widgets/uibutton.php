<?php
/**
 * file: uibutton.php
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
     * class: UData\Widgets\UIButton
     * 
     * Creates a UIButton element.
     * 
     * about: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * topic: Options
     * 
     * This widgets output representation depends on the options it is given.
     * 
     * If given the _href_ option this widgets representation will be in the 
     * 
     * form an HTML anchor with the _class_ of 'btn'. More _class_ options can 
     * 
     * be given as well. The absence of the _href_ option will casue the 
     * 
     * representation to be an HTML button element with the default type
     * 
     * of 'button'. This type can be overridden by giving the _type_ option.
     * 
     */
    class UIButton extends StdBase {

        /**
         * constructor: __construct
         * 
         * Parameters:
         * 
         * <Udata\Widgets\WidgetOptions> $opts - An optional options object
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
         * Returns the string represnetation of the widget.
         * 
         * Returns: 
         * 
         * String
         */
        public function ToString () {
            if (isset($this->opts->href)) {
                $this->out .= "<a href='{$this->opts->href}' role='button'";
                $this->setInnerOpts();
                $this->out .= ">";
                $this->out .= isset($this->opts->string) ? "{$this->opts->string}" : "";
                $this->out .= "</a>";
            }
            else {
                $this->out .= "<button";
                $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'" : " type='button'";
                $this->setInnerOpts();
                $this->out .= ">";
                $this->out .= isset($this->opts->string) ? $this->opts->string : "";
                $this->out .= "</button>";
            }            
            return $this->out;
        }

        private function setInnerOpts () {
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
        }
    }
}