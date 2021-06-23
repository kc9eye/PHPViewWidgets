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
 * kc9eye\PHPViewWidgets\Templates
 */
namespace kc9eye\PHPViewWidgets\Templates {

    use OutOfBoundsException;
    use kc9eye\PHPViewWidgets\Interfaces\Data;

    /**
     * Used to store the data given to a kc9eye\PHPViewWidgets\Templates\DataGrid
     */
    class GridData implements Data {
        protected $data;
        private $pntr;
        private $keys;

        /**
         * Class construtor
         * 
         * @param Array $data An optional array containing the rows of data for the widget
         */
        public function __construct(Array $data = null) {
            $this->data = [];
            $this->pntr = 0;
            $this->keys = [];
            if (!is_null($data)) {
                foreach($data as $row) $this->AddRow($row);
            }
        }

        /**
         * Adds the given indexed data array to the griddata
         * 
         * @param Array $row An INDEXED array of data to add. It must contain the keys already contained in any previous data rows.
         * @return Void
         */
        public function AddRow(Array $row) {
            if (empty($this->keys)) $this->keys = array_keys($row);
            else {
                foreach($this->keys as $key) {
                    if (!array_key_exists($key,$row)) {
                        throw new OutOfBoundsException("{$key} not found in given data row, data row consistenency not congruent.");
                    }
                }
            }
            array_push($this->data, $row);
        }

        /**
         * Deletes the row of data given by the position of the row in the stack of data rows
         * 
         * @param int $position A zero based integer of the data row to remove
         * @return Void
         */
        public function DeleteRow($position) {
            array_splice($this->data,$position,1);
        }

        /**
         * Returns a array of the common array keys for the datagrid.
         * 
         * @return String[]
         */
        public function Headings():Array {
            return $this->keys;
        }

        public function next() {
            $this->pntr++;
        }

        public function rewind() {
            $this->pntr = 0;
        }

        public function key() {
            return $this->pntr;
        }

        public function current() {
            return $this->data[$this->pntr];
        }

        public function valid() {
            return isset($this->data[$this->pntr]);
        }

        public function seek($position) {
            if (!isset($this->data[$position]))
                throw new OutOfBoundsException("Invalid seek position: {$position}");
            $this->pntr = $position;
        }
    }
}