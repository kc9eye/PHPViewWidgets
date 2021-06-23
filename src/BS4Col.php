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
    use kc9eye\PHPViewWidgets\Widgets\UIDiv;

    /**
     * Creates a Boostrap 4 Column widget
     */
    class BS4Col extends UIDiv {
        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts An optional Options class of options for the widget, it 
         * accepts the same options as it's parent class.
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            if (!is_null($opts)) {
                $opts->class = isset($opts->class) ? "col {$opts->class}" : "col";
            }
            else {
                $opts = new Options(['class'=>"col"]);
            }
            parent::__construct($opts,$widgets);
        }
    }
}