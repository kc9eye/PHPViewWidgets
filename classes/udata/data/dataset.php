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
namespace UData\Data {
    use \UData;
    class DataSet extends UData\IOContainer implements DataMeta {
        public function __construct (Array $items = null) {
            parent::__construct($items);
        }

        public function Add ($item) {
            if (! $item instanceof RowSet) throw new \Exception("DataSet only supports containing RowSet's.");
            elseif (! empty($this->data)) {
                if ($this->data[0]->Count() != $item->Count()) throw new \Exception("RowSet's must contain equal parameters.");
                elseif ($this->data[0]->Params() != $item->Params()) throw new \Exception("DataSet RowSet's must have matching parameters");
            }
            array_push($this->data, $item);
            $this->keys = array_keys($this->data);
        }

        public function Params () {
            return $this->data[0]->Params();
        }

        public function Values () {
            return $this->data;
        }

        public function Count () {
            return count($this->data);
        }
    }
}