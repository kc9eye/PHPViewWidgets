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
 * kc9eye\PHPViewWidgets\Templates
 */
namespace kc9eye\PHPViewWidgets\Templates {

    use kc9eye\PHPViewWidgets\Widgets\Options;
    use kc9eye\PHPViewWidgets\Widgets\UIWidget;

    /**
     * Creates a Bootstrap 4 Button
     */
    class BS4Button extends UIWidget {
        /**
         * Class Construtor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts An optional Options class containing the options for the widget.
         * This widget excepts the following options: href,role,type,color,class,style,id,target,toggle,string,other.
         * If the href option is defined then the widget turns into an anchor with the bs4 btn class, otherwise it return 
         * a button element.
         * 
         * @author Paul W. Lane
         */
        public function __construct(Options $opts = null) {
            parent::__construct($opts);
        }

        /**
         * Returns the widget as a string
         * @return String
         */
        public function ToString() {
            if (isset($this->opts->href)) {
                $this->out .= "<a";
                $this->out .= " href='{$this->opts->href}'";             
                $this->out .= isset($this->opts->role) ? " role='{$this->opts->role}'" : " role='button'";                
                $this->setCommon();                
                $this->out .= "</a>";
            }
            else {
                $this->out .= "<button";
                $this->out .= isset($this->opts->type) ? " type='{$this->opts->type}'" : " type='button'";
                $this->setCommon();
                $this->out .= "</button>";
            }
            return $this->out;
        }

        private function setCommon() {
            $this->out .= " class='btn";
            $this->out .= isset($this->opts->color) ? " {$this->opts->color}" : " btn-light";
            $this->out .= isset($this->opts->class) ? " {$this->opts->class}'" : "'";
            $this->out .= isset($this->opts->style) ? " style='{$this->opts->style}'" : "";
            $this->out .= isset($this->opts->id) ? " id='{$this->opts->id}'" : "";
            $this->out .= isset($this->opts->other) ? " {$this->opts->other}" : "";
            $this->out .= isset($this->opts->target) ? " data-target='{$this->opts->target}'" : "";
            $this->out .= isset($this->opts->toggle) ? " data-toggle='{$this->opts->toggle}'" : "";
            $this->out .= isset($this->opts->string) ? ">{$this->opts->string}" : "";
        }
    }
}