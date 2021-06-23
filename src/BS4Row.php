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
     * Creates a Boostrap 4 row widget
     */
    class BS4Row extends UIDiv {
        /**
         * Class construtor
         * 
         * @param kc9eye\PHPWiewWidgets\Widgets\Options $opts An optional Options class containing the options for the widget.
         * This widget excepts the same options as it's parent.
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget[] $widgets An optional array of widgets to include inside this widget
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            if (!is_null($opts)) {
                $opts->class = isset($opts->class) ? "row {$opts->class}" : "row";
            }
            else {
                $opts = new Options(['class'=>'row']);
            }
            parent::__construct($opts,$widgets);
        }
    }
}