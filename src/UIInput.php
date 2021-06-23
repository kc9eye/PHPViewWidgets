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
use kc9eye\PHPViewWidgets\Widgets\UIWidget;

    /**
     * Creates a form input element widget
     */
    class UIInput extends UIWidget {

        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewwidgets\Widgets\Options $opts an optional Options class containing the options for this widget.
         * This widget accepts the following options: type,name,class,style,id,size,value,placeholder,form,other
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
            $this->out .= "<input";
            $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'" : " type='text'";
            $this->out .= isset($this->opts->name) ? " name='{$this->opts->name}'" : " name='userinput'";
            $this->out .= isset($this->opts->class) ? " class='{$this->opts->class}'" : "";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->size) ? " size='{$this->opts->size}'" : "";
            $this->out .= isset($this->opts->value) ? " value='{$this->opts->value}'" : "";
            $this->out .= isset($this->opts->placeholder) ? " placeholder='{$this->opts->placeholder}'" : "";
            $this->out .= isset($this->opts->form) ? " form='{$this->opts->form}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= " />";
            return $this->out;
        }
    }
}