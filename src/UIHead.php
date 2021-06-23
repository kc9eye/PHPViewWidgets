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
 * kc9eye\PHPViewWidgets\Widgets
 */
namespace kc9eye\PHPViewWidgets\Widgets {

    /**
     * Creates a head element widget container
     */
    class UIHead extends UIContainer {
        /**
         * Class construtor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the options for the widget.
         * This widget accepts the follwoing options: none
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget[] an optional array of widgets to place in this widgets container.
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts, $widgets);
        }

        /**
         * Returns the widget and it's container as a string
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= "<head>";
            $this->unspoolContainer();
            $this->out .= "</head>";
            return $this->out;
        }
    }
}