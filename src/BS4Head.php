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
    use kc9eye\PHPViewWidgets\Widgets\UIHead;
    use kc9eye\PHPViewWidgets\Widgets\UILink;
    use kc9eye\PHPViewWidgets\Widgets\UIMeta;
    use kc9eye\PHPViewWidgets\Widgets\UIScript;

    /**
     * Creates a Bootstrap 4 Header Element
     */
    class BS4Head extends UIHead {
        /**
         * The current version of Bootstrap this header represents
         */
        public $Version = 4.5;

        /**
         * Class constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options $opts An optional Options class containing the options for the widget.
         * This widget excepts the same options as it's parent.
         * @param kc9eye\PHPViewWidgets\Interfaces\Widget[] $widgets An array of widgets to include in side the header element
         */
        public function __construct(Options $opts = null, Array $widgets = []) {
            $bs4Widgets = [
                new UIMeta(new Options([
                    'charset'=>"utf-8"
                ])),
                new UIMeta(new Options([
                    'name'=>"viewport",
                    'content'=>"width=device-width, initial-scale=1, shrink-to-fit=no"
                ])),
                new UILink(new Options([
                    'rel'=>"stylesheet",
                    'href'=>"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",
                    'other'=>"integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'"
                ]))                
            ];
            if (!empty($widgets)) {
                foreach($widgets as $w) {
                    array_push($bs4Widgets, $w);
                }
            }
            parent::__construct($opts,$bs4Widgets);
        }
    }
}