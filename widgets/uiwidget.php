<?php
//File: uiwidget.php
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
//namespace: PHPViewWidgets\Widgets
namespace PHPViewWidgets\Widgets {

use PHPViewWidgets\Interfaces\Widget;

//class: PHPViewWidgets\Widgets\UIWidget
    class UIWidget implements Widget {
        protected $out;
        protected $opts;

        //method: __construct
        //The class constructor
        //
        //Parameters:
        //<PHPViewWidgets\Widgets\Options> $opts - Optional Options class for declaring options at 
        //contruction. The last call to <SetOptions> prior to calling either <Display> or <ToString>
        //take precedence. 
        public function __construct(Options $opts = null) {
            if (!is_null($opts)) $this->SetOptions($opts);
            $this->out = "";
        }

        //method: SetOptions
        //This method sets the options for the widget
        //
        //Parmeters:
        //<PHPViewWidgets\Widgets\Options> $opts - The Options class containing the options for the widget
        //
        //About: Options
        //Most UIWidgets accept the following standard options, other options are available
        //and denoted on the specific widgets documentation.
        //*String* - Contains the string that gets output when <ToString> is called
        public function SetOptions(Options $opts) {
            $this->opts = $opts;
        }

        //method: Display
        //Simply echo's the return of <ToString> to the output buffer
        public function Display() {
            echo $this->ToString();
        }

        //method: ToString
        //Returns the widgets string output, taking into account all options. 
        //Classes extending this class should override this method with their own.
        public function ToString() {
            $this->out .= isset($this->opts->string) ? $this->opts->string : "";
            return $this->out;
        }

        public function __toString() {
            return $this->ToString();
        }
    }
}