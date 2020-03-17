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
    class UINavBrand extends StdBase {

        public function __construct (WidgetOptions $opts = null) {
            parent::__construct($opts);
        }

        public function ToString () {
            $class = isset($this->opts->class) ? $this->opts->class." navbar-brand" : "navbar-brand";
            $this->opts->class = $class;
            $this->out = new UILink($this->opts);
            return $this->out->ToString();
        }
    }
}