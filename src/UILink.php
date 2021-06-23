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
    //class: PHPViewWidgets\Widgets\UILink
    //This class represents a link widget, it *IS NOT* a container widget.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This class accepts the following options:
    //
    //rel - The rel attribute.
    //href - The href attribute.
    //type - An optional type attribute.
    //other - An optional attribute to placed verbatium.
    /**
     * Creates an anchor element widget
     */
    class UILink extends UIWidget {
        /**
         * Class conctrutor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the options for this widget.
         * This widget accepts the following options: rel,href,type,other
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
            $this->out .= "<link";
            $this->out .= isset($this->opts->rel) ? " rel='{$this->opts->rel}'" : "";
            $this->out .= isset($this->opts->href) ? " href='{$this->opts->href}'" : "";
            $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= " />";
            return $this->out;
        }
    }
}