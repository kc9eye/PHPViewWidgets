<?php
/**
 * file: stdbase.php
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
 * namespace: UData\Widgets\Elements
 */
namespace UData\Widgets\Elements {
    use \UData\Widgets;
    /**
     * class: UData\Widgets\Elements\StdBase
     * 
     * About: Implements
     * 
     * <UData\Widgets\Elements\WebElement>
     */
    class StdBase implements WebElement {
        protected $data;
        protected $out;
        protected $opts;

        public function __construct (Widgets\WidgetOptions $opts = null) {
            if (!is_null($opts)) $this->SetOptions($opts);
            $this->out = "";
            $this->data = new WidgetContainer();
        }

        public function SetOptions (Widgets\WidgetOptions $opts) {
            $this->opts = $opts;
        }

        public function Display () {
            echo $this->ToString();
        }

        public function Add ($object) {
            $this->data->Add($object);
        }

        public function Remove ($position) {
            $this->data->Remove($position);
        }

        public function Insert (Widgets\Widget $object, $position) {
            $this->data->Insert($object,$position);
        }

        public function Count () {
            return $this->data->Count();
        }

        public function ToString () {
            $this->out .= "<{$this->opts->element}";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= $this->data->ToString();
            $this->out .= "</{$this->opts->element}>";
            return $this->out;
        }
    }
}