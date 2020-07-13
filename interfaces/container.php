<?php
//File: container.php
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
    //class: PHPViewWidgets\Interfaces\Container
    interface Container {
        //method: Add
        //Used for adding an item onto the stack of items in the container
        //
        //Parameters:
        //$item - The item to add to the container stack.
        //
        //Returns:
        //Void
        public function Add(Widget $widget);

        //method: Remove
        //Removes the item on the stack at the given position.
        //
        //Paraemters:
        //$position - An integer representing the items position in the stack.
        //Stack items are numbered starting with zero (the first item will be item 0);
        //
        //Returns:
        //Void
        public function Remove($position);

        //method: Insert
        //Inserts the item into the stack at the given position.
        //
        //Parameter:
        //$item - The item to insert to the stack.
        //$position - An integer (zero based) on where to add the item in the stack.
        //
        //Returns:
        //Void
        public function Insert(Widget $widget, $postition);
    }
}