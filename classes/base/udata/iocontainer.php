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
namespace UData {
    class IOContainer implements Container, Options {
        private $data;
        private $pointer;

        public function __construct (Array $items = null) {
            $this->data = array();
            $this->keys = array_keys($this->data);
            $this->pointer = 0;
            if (!is_null($items)) 
                foreach($items as $i)
                    $this->Add($i);
        }

        public function Add ($item) {
            if (! \is_object($item)) throw new Exception("IOContainer only support containing objects.");
            array_push($this->data, $item);
        }

        public function ToString () {
            $out = "";
            foreach($this as $i) {
                $out .= var_export($i,true);
            }
            return $out;
        }

        public function seek ($p) {
            if ($p >= count($this->data)) throw new Exception("Key out of bounds");
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
            if ($this->pointer >= count($this->data)) return false;
            else return isset($this->data[$this->pointer]);
        }

    }
}