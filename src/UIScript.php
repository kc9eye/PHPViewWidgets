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
    //class: PHPViewWidgets\Widgets\UIScript
    //This class represents a script widget, this class *IS NOT* a container class
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //Topic: Options
    //This class accepts the following options:
    //
    //src - An optional src attribute
    //type - An optional type attribute
    //other - An optional attribute to added verbatium
    //string - An optional string, that represents the any script between the open and close tags
    /**
     * Creates a script element widget
     */
    class UIScript extends UIWidget {
        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the options for the widget.
         * This widget accepts the following options: src,type,other,string
         */
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        /**
         * Returns the widget as a string
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= "<script";
            $this->out .= isset($this->opts->src) ? " src='{$this->opts->src}'" : "";
            $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'": "";
            $this->out .= isset($this->opts->other) ? "{$this->opts->other}" : "";
            $this->out .= ">";
            $this->out .= isset($this->opts->string) ? " {$this->opts->string}" : "";
            $this->out .= "</script>";
            return $this->out;
        }

    }
}