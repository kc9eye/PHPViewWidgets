<?php
//File: option.php
//
//About: License
//
//Copyright (C)2020 Paul W. Lane <kc9eye@gmail.com>
//
//This program is free software; you can redistribute it and/or modify
//
//it under the terms of the GNU General Public License as published by
//
//the Free Software Foundation; version 2 of the License.
//
//This program is distributed in the hope that it will be useful,
//
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License along
//
//with this program; if not, write to the Free Software Foundation, Inc.
//
//51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//
//namespace: PHPViewWidgets\Widgets
namespace PHPViewWidgets\Widgets {

    use OutOfRangeException;
    use SeekableIterator;

//class: PHPViewWidgets\Widgets\Options
    class Options implements SeekableIterator {
        private $data;
        private $keys;
        private $pntr;

        public function __construct(Array $opts = []) {
            $this->pntr = 0;
            $this->data = [];
            $this->keys = [];
            if (!empty($opts)) {
                foreach($opts as $i => $v) {
                    $this->$i = $v;
                }
            }
        }
        
        public function __set ($index,$value) {
            $this->data[$index] = $value;
            $this->keys = array_keys($this->data);
        }

        public function __get ($index) {
            if (!empty($this->data[$index])) return $this->data[$index];
            else return null;
        }

        public function __isset($index) {
            return isset($this->data[$index]);
        }

        public function __unset($index) {
            unset($this->data[$index]);
        }

        public function seek($position) {
            if (!isset($this->keys[$position])){
                throw new OutOfRangeException("{$position} is not valid");
            }
            $this->pntr = $position;
        }

        public function current() {
            return $this->data[$this->keys[$this->pntr]];
        }

        public function key() {
            return $this->pntr;
        }

        public function next() {
            $this->pntr++;
        }

        public function valid() {
            return isset($this->data[$this->keys[$this->pntr]]);
        }

        public function rewind() {
            $this->pntr = 0;
        }

        public function __serialize() : array {
            return $this->data;
        }

        public function __unserialize(array $data): void {
            $this->data = $data;
        }
    }
}