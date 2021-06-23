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
 * kc9eye\PHPViewWidgets\Interfaces
 */
namespace kc9eye\PHPViewWidgets\Interfaces {
    /**
     * Container widget is an elemental widget that can contain other widgets or containers
     */
    interface Container {
        /**
         * Used to add an item to the stack of items in the container
         * 
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget $widget
         * @return Void
         */
        public function Add(Widget $widget);

        /**
         * Removes the item on the stack at the given position
         * 
         * @param int $position The integer position of the item to remove, zero based positional arguments used.
         * The first item is at postiion 0.
         * @return Void
         */
        public function Remove($position);

        /**
         * Insert an item on to the stack
         * 
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget $widget The widget to insert to the stack.
         * @param int $position The integer position, of where the item should be inserted, if any.
         */
        public function Insert(Widget $widget, $postition);
    }
}