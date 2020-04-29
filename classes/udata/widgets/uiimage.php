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
namespace UData\Widgets {
    use \UData\HTTP;
    class UIImage extends StdBase {

        public function __construct ($opts = null) {
            if ($opts instanceof WidgetOptions) $this->SetOptions($opts);
            elseif ($opts instanceof HTTP\Url) $this->SetUrlOptions($opts);
            elseif (is_string($opts)) $this->SetLocalUrl($opts);
        }

        private function SetUrlOptions (HTTP\Url $opts) {
            $this->opts = new WidgetOptions(['url'=>$opts]);
        }

        private function SetLocalUrl($opts) {
            $this->opts = new WidgetOptions(['url'=>new HTTP\Url("?c=images&src={$opts}")]);
        }

        public function ToString () {
            $out = "<image src='".$this->opts->url->ToString()."' ";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $out .= "/>";
            return $out;
        }
    }
}