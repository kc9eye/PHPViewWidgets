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
namespace UData\Widgets\Elements {
    use \UData;
    use \UData\Widgets;

    class WidgetContainer implements WebElement, UData\Options {
        private $data;
        private $pointer;

        public function __construct (Array $objects = null) {
            $this->data = array();
            $this->pointer = 0;
            if (!is_null($objects)) {
                foreach($objects as $o) {
                    $this->Add($o);
                }
            }
        }

        public function Add ($object) {
            if (!\is_object($object)) throw new \Exception("Adding non-objects to containers is not supported");
            elseif (! $object instanceof Widgets\Widget) 
                throw new \Exception("WidgetContainer excepts only widgets, try a generic IContainer instead.");
            array_push($this->data,$object);
        }

        public function Insert (Widgets\Widget $object, $position) {
            if ($position >= count($this->data)) throw new \Exception("Position can not be greater than container size. Containers are zero based.");
            $insert = array($object);
            \array_splice($this->data,$position,0,$insert);
        }

        public function Remove ($position) {
            if ($position >= count($this->data)) throw new \Exception("Position can not be greater than container size. Containers are zero based.");
            unset($this->data[$position]);
        }

        public function Count () {
            return count($this->data);
        }

        public function SetOptions (Widgets\WidgetOptions $opts) {
            trigger_error("Widget container does not currently implement any options, options should be set on the widget themselves.",E_USER_NOTICE);
        }

        public function Display () {
            echo $this->ToString();
        }

        public function ToString () {
            $out = "";
            foreach($this as $w) {
                $out .= $w->ToString();
            }
            return $out;
        }

        public function seek ($p) {
            if ($p >= count($this->data)) throw new \Exception("Key out of bounds");
            $this->pointer = $p;
        }

        public function current () {
            return $this->data[$this->pointer];
        }

        public function next () {
            $this->pointer++;
        }

        public function rewind () {
            $this->pointer = 0;
        }

        public function key () {
            return $this->pointer;
        }

        public function valid () {
            return isset($this->data[$this->pointer]);
        }
    }
}