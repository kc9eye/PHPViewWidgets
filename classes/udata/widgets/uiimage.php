<?php
/**
 * file: uiimage.php
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
    use \UData\HTTP;

    /**
     * class: UData\Widgets\UIImage
     * 
     * Creates a widget that represents the HTML image element
     * 
     * topic: Extends
     * 
     * <UData\Widgets\StdBase>
     * 
     * about: Options
     * 
     * This widget accepts standard options, as well as the following non-standard options:
     * 
     * <UData\HTTP\Url> url - Is a url object.
     */
    class UIImage extends StdBase {

        /**
         * constructor: __construct
         * 
         * Parameters:
         * 
         * mixed $opts - Is optional or one of:
         *    <UData\HTTP\Url> - A Url object, url's given in this form are taken verbatium from the object.
         *    <UData\Widgets\WidgetOptions> - An options object containing the options for the widget.
         *    string - A string representing a server root source url
         */
        public function __construct ($opts = null) {
            if ($opts instanceof WidgetOptions) $this->SetOptions($opts);
            elseif ($opts instanceof HTTP\Url) $this->SetUrlOptions($opts);
            elseif (is_string($opts)) $this->SetLocalUrl($opts);
        }

        private function SetUrlOptions (HTTP\Url $opts) {
            $this->opts = new WidgetOptions(['url'=>$opts]);
        }

        private function SetLocalUrl($opts) {
            $this->opts = new WidgetOptions(['url'=>new HTTP\Url("?c=images&src={$opts}")]);
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
            $out = "<image src='".$this->opts->url->ToString()."' ";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $out .= "/>";
            return $out;
        }
    }
}