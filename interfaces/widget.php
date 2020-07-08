<?php
//File: widget.php
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
//namespace: PHPViewWidgets\Interfaces
namespace PHPViewWidgets\Interfaces {
    //interface: PHPViewWidgets\Interfaces\Widget
    interface Widget {
        //method: SetOptions
        //Options should be settable prior to calling any of the other methods.
        public function SetOptions(\PHPViewWidgets\Widgets\Options $opt);
        //method: ToString
        //Returns:
        //The widget in string form.
        public function ToString();
        //method: Display
        //Returns:
        //Void - This method echo's the return of ToString to the stream.
        public function Display();
    }
}