<?php
//File: bs4head.php
//
//About: License
//
//Copyright (C)2020 Paul W. Lane <kc9eye@gmail.com>
//
//This program is free software; you can redistribute it and/or modify
//
//it under the terms of the GNU General Public License as published by
//
//the Free Software Foundation; version 2 of the License.
//
//This program is distributed in the hope that it will be useful,
//
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License along
//
//with this program; if not, write to the Free Software Foundation, Inc.
//
//51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
//
//namespace: PHPViewWidgets\Templates
namespace PHPViewWidgets\Templates {

    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIHead;
    use PHPViewWidgets\Widgets\UILink;
    use PHPViewWidgets\Widgets\UIMeta;
    use PHPViewWidgets\Widgets\UIScript;

//class: PHPViewWidgets\Templates\BS4Head
    //This class represents an html head that contains all necessary links to 
    //to Bootstrap
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIHead>
    //
    //topic: Options
    //This widgets accepts the following options:
    //None
    class BS4Head extends UIHead {
        public $Version = 4.5;
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
                ])),
                new UIScript(new Options([
                    'src'=>"https://code.jquery.com/jquery-3.5.1.slim.min.js",
                    'other'=>"integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'"
                ])),
                new UIScript(new Options([
                    'src'=>"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",
                    'other'=>"integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'"
                ])),
                new UIScript(new Options([
                    'src'=>"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js",
                    'other'=>"integrity='sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI' crossorigin='anonymous'"
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