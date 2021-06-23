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
 * kc9eye\PHPViewWidgets\Template
 */
namespace kc9eye\PHPViewWidgets\Templates {

    use OutOfRangeException;
    use kc9eye\PHPViewWidgets\Widgets\Options;
    use kc9eye\PHPViewWidgets\Widgets\UIDiv;
    use kc9eye\PHPViewWidgets\Widgets\UITable;
    use kc9eye\PHPViewWidgets\Widgets\UITbody;
    use kc9eye\PHPViewWidgets\Widgets\UITd;
    use kc9eye\PHPViewWidgets\Widgets\UIThead;
    use kc9eye\PHPViewWidgets\Widgets\UITh;
    use kc9eye\PHPViewWidgets\Widgets\UITr;
    use kc9eye\PHPViewWidgets\Widgets\UIWidget;

    /**
     * Creates a datagrid widget.
     * 
     * If this widget is not used in conjunction with the kc9eye\PHPViewWidgets\Templates\BS4Head widget, 
     * then a normal HTML5 table is returned when called.
     */
    class DataGrid extends UIWidget {
        private $griddata;
        protected $columnheadings;
        protected $newcolumn;
        protected $sectionOpts;

        /**
         * Class Constructor
         * 
         * @param kc9eye\PHPViewWidgets\Widgets\Options[] $opts This is an optional indexed array of Options class
         * containing the options for the various widgets that make up this template widget, eg. div=>Options,table=>Options,thead=>Options,tbody=>Options...
         * @param kc9eye\PHPViewWidgets\Templates\GridData $data An optional GridData class containing the data for the grid.
         * @param String[] $heading An optional array containing the heading for the datagrid columns
         */
        public function __construct(Array $opts = null, GridData $data = null, $headings = null) {
            parent::__construct();
            $this->sectionOpts = is_null($opts) ? null : $opts;
            if (!is_null($data)) $this->SetData($data);
            if (!is_null($headings)) $this->SetColumnHeadings($headings);
        }

        /**
         * Sets the datagrid data with the data from the given GridData class
         * 
         * @param \kc9eye\PHPViewWidgets\Templates\GridData $data The class containing the data for the grid
         * @return Void
         */
        public function SetData(GridData $data) {
            $this->griddata = $data;
        }

        /**
         * Sets the column headings of the data grid
         * 
         * @param String[] $headings An array containing the the column headings
         * @return Void
         */
        public function SetColumnHeadings(Array $headings) {
            $this->columnheadings = $headings;
        }

        /**
         * Return the widget as a string
         * 
         * @return String
         */
        public function ToString() {
            if (!is_null($this->sectionOpts)) {
                if (array_key_exists('div',$this->sectionOpts)) {
                    if ($this->sectionOpts['div']->class )
                    // $this->sectionOpts['div']->class = isset($this->sectionOpts['div']->class) ? 
                    //     "table-responsive {$this->sectionOpts['div']->class}" :
                    //     "table-responsive";
                    $div = new UIDiv($this->sectionOpts['div']); 
                }
                else {
                    $div = new UIDiv(new Options(['class'=>"table-responsive"]));
                }

                if (array_key_exists('table',$this->sectionOpts)) {
                    $this->sectionOpts['table']->class = isset($this->sectionOpts['table']->class) ?
                        "table {$this->sectionOpts['table']->class}" :
                        "table";
                    $table = new UITable($this->sectionOpts['table']);
                }
                else {
                    $table = new UITable(new Options(['class'=>"table"]));
            }

                if (array_key_exists('tbody',$this->sectionOpts)) {
                    $tbody = new UITbody($this->sectionOpts['tbody']);
                }
                else {
                    $tbody = new UITbody();
                }
    
                if (array_key_exists('thead',$this->sectionOpts)) {
                    $headings = new UIThead($this->sectionOpts['thead']);
                }
                else {
                    $headings = new UIThead(new Options(['class'=>'thead-dark']));
                }

            }
            else {
                $div = new UIDiv(new Options(['class'=>'table-responsive']));
                $table = new UITable(new Options(['class'=>'table']));
                $headings = new UIThead(new Options(['class'=>'thead-dark']));
                $tbody = new UITbody();
                if (!empty($this->columnheadings)) {                    
                    foreach($this->columnheadings as $head) {
                        $headings->Add(new UITh(new Options(['other'=>"scope='col'",'string'=>$head])));
                    }
                    $table->Add($headings);
                }
                elseif (!empty($this->griddata->Headings())) {
                    foreach($this->griddata->Headings() as $head) {
                        $headings->Add(new UITh(new Options(['other'=>"scope='col'",'string'=>$head])));
                    }
                    $table->Add($headings);
                }
            }
            foreach($this->griddata as $row) {
                $tr = new UITr();
                foreach($row as $i=>$v) {
                    $tr->Add(new UITd(new Options(['string'=>$v])));
                }
                $tbody->Add($tr);
            }
            $table->Add($tbody);
            $div->Add($table);
            return $div->ToString();
        }
    }
}