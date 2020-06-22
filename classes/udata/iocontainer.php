<?php
/** 
 * file: iocontainer.php
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
 * namespace: UData
 */
namespace UData {
    /**
     * class: UData\IOContainer
     * 
     * An iteratable generic object container.
     * 
     * about: Implements
     * 
     * <UData\Container>
     * <UData\Options>
     */
    class IOContainer implements Container, Options {
        protected $data;
        protected $pointer;

        /**
         * constructor: __construct
         * 
         * Parameters:
         * 
         * array $items - An optional unindexed array of objects for the container
         * 
         * Returns:
         * 
         * Void
         */
        public function __construct (Array $items = null) {
            $this->data = array();
            $this->keys = array_keys($this->data);
            $this->pointer = 0;
            if (!is_null($items)) 
                foreach($items as $i)
                    $this->Add($i);
        }

        /**
         * method: Add
         * 
         * Adds an object to the containers stack
         * 
         * Parameters:
         * 
         * object $item - Is a required object to add to the container stack
         * 
         * Returns:
         * 
         * Void
         */
        public function Add ($item) {
            if (! \is_object($item)) throw new \Exception("IOContainer only support containing objects.");
            array_push($this->data, $item);
            $this->keys = array_keys($this->data);
        }

        /**
         * method: ToString
         * 
         * Returns:
         * 
         * String - A string representing the export of all objects contained in the stack
         */
        public function ToString () {
            $out = "";
            foreach($this as $i) {
                $out .= var_export($i,true);
            }
            return $out;
        }

        /**
         * method: Count
         * 
         * Returns:
         * 
         * integer - An integer representing the number of object in the container.
         */
        public function Count () {
            return count($this->data);
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
            if ($this->pointer >= count($this->data)) return false;
            else return isset($this->data[$this->pointer]);
        }

    }
}