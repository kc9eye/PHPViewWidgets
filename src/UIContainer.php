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
 * \kc9eye\PHPViewWidgets\Widgets
 */
namespace kc9eye\PHPViewWidgets\Widgets;

use kc9eye\PHPViewWidgets\Interfaces\Container;
use kc9eye\PHPViewWidgets\Interfaces\Widget;

/**
 * Creates a container class that can contain other widgets
 * 
 * This class is mainly used to extend to other widgets that act as primary widgets.
 * 
 */
class UIContainer extends UIWidget implements Container{
    protected $data;

    /**
     * Class constructor
     * 
     * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing options for the base widget.
     * These options are consumed directly by this class, but are transferred to the class extending this class.
     * @param \kc9eye\PHPViewWidgets\Interfaces\Widget[] $widgets an optional array of widgets to be contained 
     */
    public function __construct(Options $opts = null, Array $widgets = []) {
        parent::__construct($opts);
        $this->data = [];
        if (!empty($widgets)) {
            foreach($widgets as $obj) {
                $this->Add($obj);
            }
        }
    }

    /**
     * Adds the given widget to container
     * 
     * @param kc9eye\PHPViewWidgets\Interfaces\Widget $widget The widget to add the container stack
     */
    public function Add(Widget $widget) {
        array_push($this->data, $widget);
    }

    /**
     * Inserts the given widget in the stack at the given postion.
     * 
     * @param kc9eye\PHPViewWidgets\Interfaces\Widget $widget the widget to insert
     * @param int $position a zero based integer position at which the widget will be inserted
     */
    public function Insert(Widget $widget, $position) {
        array_splice($this->data, $position, 0, [$widget]);
    }

    /**
     * Removes the widget in the stack at the given position
     * 
     * @param int $position the zero based integer position of the widget to remove
     */
    public function Remove($position) {
        array_splice($this->data, $position, 1);
     }

    /**
     * Returns the widget as a string
     * 
     * @return String
     */
    public function ToString() {
        $this->unspoolContainer();
        return $this->out;
    }

    protected function unspoolContainer() {
        if (empty($this->data)) return;
        foreach($this->data as $widget) {
            $this->out .= $widget->ToString();
        }
    }
}