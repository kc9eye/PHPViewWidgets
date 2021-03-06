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
 * kc9eye\PHPViewWidgets\Widgets\Forms
 */
namespace kc9eye\PHPViewWidgets\Widgets\Forms {

    use kc9eye\PHPViewWidgets\Widgets\Options;
    use kc9eye\PHPViewWidgets\Widgets\UIContainer;

    /**
     * Creates a form element widget container
     */
    class UIForm extends UIContainer {
        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts an optional Options class containing the opions for the widget.
         * This widget accepts the following options: action,method,enctype,class,style,id,other
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget[] an optional array of widgets to place in the container of this widget
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            parent::__construct($opts,$widgets);
        }

        /**
         * Returns the widget and container contents as a string
         * 
         * @return String
         */
        public function ToString() {
            $this->out .= "<form";
            $this->out .= isset($this->opts->action) ? " action='{$this->opts->action}'" : "";
            $this->out .= isset($this->opts->method) ? " method='{$this->opts->method}'" : "";
            $this->out .= isset($this->opts->enctype) ? " enctype='{$this->opts->enctype}'" : "";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= ">";
            $this->unspoolContainer();
            $this->out .= "</form>";
            return $this->out;
        }
    }
}