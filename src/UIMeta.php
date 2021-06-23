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
    //class: PHPViewWidgets\Widgets\UIMeta
    //This class represents a meta widget, it *IS NOT* a container widget.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //topic: Options
    //This widget accepts the follwoing options:
    //
    //name - The name attribute.
    //content - The content attribute.
    //http_equiv - An optional http-equiv attribute
    //charset - An optional charset attribute
    //other - An attribute to added verbatium
    /**
     * Creates a meta element widget
     */
    class UIMeta extends UIWidget {
        /**
         * Class construtor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the options for this widget.
         * This widget accepts the follwing options: name,content,http_equiv,charset,other
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
            $this->out .= "<meta";
            $this->out .= isset($this->opts->name) ? " name='{$this->opts->name}'" : "";
            $this->out .= isset($this->opts->content) ? " content='{$this->opts->content}'" : "";
            $this->out .= isset($this->opts->http_equiv) ? " http-equiv='{$this->opts->http_equiv}'" : "";
            $this->out .= isset($this->opts->charset) ? " charset='{$this->opts->charset}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= " />";
            return $this->out;
        }
    }
}