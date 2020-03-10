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
    class HTMLHead implements WebElement {
        private $data;
        private $out;
        private $opts;

        public function __construct (WidgetOptions $opts = null) {
            if (!is_null($opts)) $this->SetOptions($opts);
            $this->out = "";
            $this->data = new WidgetContainer();
        }

        public function SetOptions (WidgetOptions $opts) {
            $this->opts = $opts;
        }

        public function Display () {
            echo $this->ToString();
        }

        public function Add ($object) {
            $this->data->Add($object);
        }

        public function Insert (Widget $object, $position) {
            if ($position >= count($this->data)) throw new Exception("Position can not be greater than container size.");
            $front = array();
            $back = array();
            for($cnt=0;$cnt<$position;$cnt++) array_push($front,$this->data[$cnt]);
            for($cnt=$position;$cnt<count($this->data);$cnt++) array_push($back,$this->data[$cnt]);
            $this->data = array();
            foreach($front as $w) $this->Add($w);
            $this->Add($object);
            foreach($back as $w) $this->Add($w);
        }

        public function Count () {
            return $this->data->Count();
        }

        public function ToString () {
            $this->out .= "<!DOCTYPE html><html><head>";
            $this->out .= $this->data->ToString();
            $this->out .= "</head>";
            return $this->out;
        }
    }
}