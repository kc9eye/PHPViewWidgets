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
    class Url implements Options {
        private $rawUrl;
        private $data;
        private $keys;
        private $pointer;

        public function __construct ($url = null) {
            if (is_null($url)) 
                $this->rawUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            else 
                $this->rawUrl = $url;
            $this->data = \parse_url($this->rawUrl);
            $this->keys = array_keys($this->data);
            $this->pointer = 0;
        }

        public function Scheme () {
            return $this->data['scheme'];
        }

        public function Host () {
            return $this->data['host'];
        }

        public function Port () {
            return $this->data['port'];
        }

        public function User () {
            return $this->data['user'];
        }

        public function Pass () {
            return $this->data['pass'];
        }

        public function Path () {
            return $this->data['path'];
        }

        public function Query () {
            return $this->data['query'];
        }

        public function Fragment () {
            return $this->data['fragment'];
        }

        public function ToString () {
            return $this->rawUrl;
        }

        public function rewind () {
            $this->pointer = 0;
        }

        public function current () {
            return $this->data[$this->keys[$this->pointer]];
        }

        public function next () {
            $this->pointer++;
        }

        public function valid () {
            if ($this->pointer == count($this->keys)) return false;
            return isset($this->data[$this->keys[$this->pointer]]);
        }

        public function key () {
            return $this->pointer;
        }

        public function seek ($position) {
            if (!isset($this->data[$this->keys[$this->pointer]])) 
                throw new \Exception("Key out of bounds");
            $this->pointer = $posititon;
        }
    }
}