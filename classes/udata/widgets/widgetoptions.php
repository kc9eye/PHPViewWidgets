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
namespace UData\Widgets {
    /**
     * WidgetOptions
     * 
     * Standard widget options are 
     * `'string','class','id','style','other'`
     * Other options depend on the widget and what 
     * it may or may not accept as options.
     * @param Array $opts An indexed array option `'name' => 'value'` pairs.
     */
    class WidgetOptions implements \UData\Options {
        private $data;
        private $keys;
        private $pointer;

        public function __construct (Array $opts = null) {
            $this->data = !is_null($opts) ? $opts : array();
            $this->keys = array_keys($this->data);
            $this->pointer = 0;
        }

        public function ToString () {
            $out = "";
            for($cnt=0;$cnt<count($this->data);$cnt++) {
                $out .= "'{$this->keys[$cnt]}'=>\"{$this->data[$this->keys[$cnt]]}\"";
                if (!($cnt < (count($this->data)-1))) $out .= ",";
            }
            return $out;
        }

        public function __set ($i, $v) {
            $this->data[$i] = $v;
            $this->keys = array_keys($this->data);
        }

        public function __unset ($i) {
            unset($this->data[$i]);
            $this->keys = array_keys($this->data);
        }

        public function __get ($i) {
            if (isset($this->data[$i])) return $this->data[$i];
            else return null;
        }

        public function __isset ($i) {
            return isset($this->data[$i]);
        }

        public function seek ($p) {
            if ($p >= count($this->keys)) throw new Exception("Key out of bounds");
            $this->pointer = $p;
        }

        public function current () {
            return $this->data[$this->keys[$this->pointer]];
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
            if ($this->pointer >= count($this->keys)) return false;
            else return isset($this->data[$this->keys[$this->pointer]]);
        }
    }
}