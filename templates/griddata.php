<?php
//File: griddata
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
//namespace: PHPViewWidgets\Templates
namespace PHPViewWidgets\Templates {

    use OutOfBoundsException;
    use PHPViewWidgets\Interfaces\Data;

//class: PHPViewWidgets\Templates\GridData
    //This class represents data for a <PHPViewWidgets\Templates\DataGrid> widget.
    class GridData implements Data {
        protected $data;
        private $pntr;
        private $keys;

        public function __construct(Array $data = null) {
            $this->data = [];
            $this->pntr = 0;
            $this->keys = [];
            if (!is_null($data)) {
                foreach($data as $row) $this->AddRow($row);
            }
        }

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

        public function DeleteRow($position) {
            array_splice($this->data,$position,1);
        }

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