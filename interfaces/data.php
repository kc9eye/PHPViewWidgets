<?php
//File: data.php
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

use SeekableIterator;

//interface: PHPViewWidgets\Interfaces\Data
    //This interface describes a class used to generate a <PHPViewWidgets\Templates\BS4DataGrid>
    interface Data extends SeekableIterator {
        //method: Headings
        //This method should return an Array containing column headings for the datagrid
        public function Headings():Array;

        //method: AddRow
        //This method should be used to add a data row to the class
        //
        //Parameters:
        //$row - an array indexed or unindexed representing the data
        public function AddRow(Array $row);

        //method: DeleteRow
        //This method should be used to remove a row from the data grid at the given position.
        //
        //Parameters:
        //$position - a zero based integer representing the row postition in the data grid
        public function DeleteRow($position);

    }
}