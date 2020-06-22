<?php
/**
 * file: webelement.int.php
 * 
 * topic: License
 * 
 * Copyright (C) 2020  Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * 
 * it under the terms of the GNU General Public License as published by
 * 
 * the Free Software Foundation; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * 
 * with this program; if not, write to the Free Software Foundation, Inc.
 * 
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 * 
 * namespace: UData\Widgets\Elements
 */
namespace UData\Widgets\Elements {
    use \UData;
    use \UData\Widgets;
    /**
     * interface: UData\Widgets\Elements\WebElement
     * 
     * Web Element interface. 
     * 
     * Web elements are HTML elements (widgets) that also contain other 
     * elements (widgets).
     * 
     * About: Extends
     * 
     * <UData\Widgets\Widget>, <UData\Container>
     */
    interface WebElement extends Widgets\Widget, UData\Container {
        /**
         * function: Insert
         * 
         * This method should insert a new <UData\Widgets\Widget> class object
         * into the elements container. Only <UData\Widgets\Widget> objects should be allowed.
         * 
         * Parameters:
         * 
         * <UData\Widgets\Widget> $widget - A widget to add to the elements container.
         * integers $position - An zero based integer of where to add the widget in the stack, if the 
         * stack already contains widgets.
         */
        public function Insert(Widgets\Widget $widget, $position);

        /**
         * function: Remove
         * 
         * Remove a widget from the elements container stack.
         * 
         * Parameters:
         * 
         * integer $position - The zero based position of the widget to remove in the stack.
         */
        public function Remove($position);
    }
}