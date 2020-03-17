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
    class UIHeadStyle extends StdBase {

        public function __construct (WidgetOptions $opts = null) {
            parent::__construct($opts);
        }

        public function ToString () {
            $this->out .= "<style>";
            $this->out .= isset($this->opts->string) ? "{$this->opts->string}" : "";
            $this->out .= "</style>";
            return $this->out;
        }
    }
}