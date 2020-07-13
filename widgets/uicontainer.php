<?php
//File: uicontainer.php
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
//namespace: PHPViewWdigets\Widgets
namespace PHPViewWidgets\Widgets;

use PHPViewWidgets\Interfaces\Container;
use PHPViewWidgets\Interfaces\Widget;

class UIContainer extends UIWidget implements Container{
    protected $data;

    public function __construct(Options $opts = null, Array $widgets = []) {
        parent::__construct($opts);
        $this->data = [];
        if (!empty($widgets)) {
            foreach($widgets as $obj) {
                $this->Add($obj);
            }
        }
    }

    public function Add(Widget $widget) {
        array_push($this->data, $widget);
    }

    public function Insert(Widget $widget, $position) {
        array_splice($this->data, $position, 0, [$widget]);
    }

    public function Remove($position) {
        array_splice($this->data, $position, 1);
     }

    public function ToString() {
        foreach($this->data as $widget) {
            $this->out .= $widget->ToString();
        }
        return $this->out;
    }
}