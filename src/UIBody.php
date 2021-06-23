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
    //class: PHPViewWidgets\Widgets\UIBody
    //This class represents a body widget, and is a container widget.
    //
    //Topic: Extends
    //<PHPViewWidgets\Widgets\UIContainer>
    //
    //Topic: Options
    //This widget accepts the following options:
    //
    //id - An optional string for an id attribute.
    //style - An optional string for a style attribute.
    //class - An optional class attribute.
    //other - An optional string that will be added verbatium as attribute.
    /**
     * Creates a body widget
     */
    class UIBody extends UIContainer {
        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing options for the widget.
         * This widget excepts the following options: id,style,class,other
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget[] an optional array of widgets to spool into this widget
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts, $widgets);
        }

        /**
         * Returns the widget as string
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= "<body";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->unspoolContainer();
            $this->out .= "</body>";
            return $this->out;
        }
    }
}