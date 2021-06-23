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
namespace PHPViewWidgets\Interfaces {
    /**
     * The base Widget interface
     */
    interface Widget {
        /**
         * Sets the options for the widget through a kc9eye\PHPViewWidgets\Widgets\Options class
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opt the Options class containing the options for the widget
         */
        public function SetOptions(\kc9eye\PHPViewWidgets\Widgets\Options $opt);

        /**
         * Returns the widget as a string
         * 
         * @return String
         */
        public function ToString();

        /**
         * Echos the widget to the output buffer
         * 
         * @return Void
         */
        public function Display();
    }
}