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

    use kc9eye\PHPViewWidgets\Interfaces\Widget;

    /**
     * Creates a generic base widget element
     * 
     * This widget class is the parent of most all widgets
     */
    class UIWidget implements Widget {
        protected $out;
        protected $opts;

        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the options for this and child widgets.
         * This widget accepts any options. See SetOptions below...
         */ 
        public function __construct(Options $opts = null) {
            if (!is_null($opts)) $this->SetOptions($opts);
            $this->out = "";
        }

        /**
         * Sets the options for the widget
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an Options class containing all the options for the widget.
         * This widget only excepts one option when it is created with out being a parent of another class, the string option.
         * This option is based verbatim as the widget itself when called with either ToString, or Display. When acting as parent
         * all options are base to the child.
         */
        public function SetOptions(Options $opts) {
            $this->opts = $opts;
        }

        /**
         * Returns the Options class given for this and/or child widgets
         * 
         * @return kc9eye\PHPViewWidgets\Widgets\Options
         */
        public function GetOptions()
        {
            return $this->opts;
        }

        /**
         * Outputs this and/or child widgets to the buffer as a string
         * 
         * @return Void
         */
        public function Display() {
            echo $this->ToString();
        }

        /**
         * Returns this widget and/or child widgets as a string
         * 
         * This method is commonly overwritten by any child widgets.
         * Calling this method as the generic form of this widget, will simply
         * return the option of string given in the kc9eye\PHPViewWidgets\Widgets\Options class
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= isset($this->opts->string) ? $this->opts->string : "";
            return $this->out;
        }

        /**
         * Magic method to return widget as string if called
         * 
         * @return String
         */
        public function __toString() {
            return $this->ToString();
        }
    }
}