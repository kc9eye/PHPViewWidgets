<?php
/**
 * Copyright (C) 2021 Paul W. Lane <kc9eye@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * 		http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


/**
 * kc9eye/PHPViewWidgets\Widgets
 */
namespace kc9eye\PHPViewWidgets\Widgets {

    use OutOfRangeException;
    use SeekableIterator;

    /**
     * Used to store a retrieve widget options.
     * 
     * All options for widgets must be contained in this class
     */
    class Options implements SeekableIterator {
        private $data;
        private $keys;
        private $pntr;

        /**
         * Class constructor
         * 
         * Options are given as an indexed array
         * @param Array $opts An indexed array of the options fro a widget
         */
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