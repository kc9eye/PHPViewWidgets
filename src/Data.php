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
 * kc9eye\PHPViewWidgets\Interfaces
 */
namespace kc9eye\PHPViewWidgets\Interfaces {

    use SeekableIterator;
    /**
     * Represents data pattern
     */
    interface Data extends SeekableIterator {
        /**
         * Should return column headings for a datagrid
         * 
         * @return String[]
         */
        public function Headings():Array;

        /**
         * Adds a row of data to the class
         * 
         * @param Array $row An indexed or non-indexed array of row data for a datagrid
         * @return Void
         */
        public function AddRow(Array $row);

        /**
         * Delete a row of data at the given position
         * 
         * @param int $position The zero based position of the row in the grid to remove
         * @return Void
         */
        public function DeleteRow($position);

    }
}