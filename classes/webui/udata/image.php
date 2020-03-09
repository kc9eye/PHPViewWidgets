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
    class Image implements Widget {
        private $out;
        private $opts;

        public function __construct ($opts = null) {
            if ($opts instanceof WidgetOptions) $this->SetOptions($opts);
            elseif ($opts instanceof Url) $this->SetUrlOptions($opts);
            elseif (is_string($opts)) $this->SetLocalUrl($opts);
        }

        private function SetUrlOptions (Url $opts) {
            $this->opts = new WidgetOptions(['url'=>$opts]);
        }

        private function SetLocalUrl($opts) {
            $this->opts = new WidgetOptions(['url'=>new Url("?i=udata\images&src={$opts}")]);
        }

        public function SetOptions (WidgetOptions $opts) {
            $this->opts = $opts;
        }

        public function Display () {
            echo $this->ToString();
        }

        public function ToString () {
            $out = "<image src='".$this->opts->url->ToString()."' ";
            if (isset($this->opts->style)) $out .= "style='{$this->opts->style}' ";
            if (isset($this->opts->other)) $out .= "{$this->opts->other} ";
            $out .= "/>";
            return $out;
        }
    }
}