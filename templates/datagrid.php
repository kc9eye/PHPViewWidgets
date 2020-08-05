<?php
//File: datagrid.php
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

    use OutOfRangeException;
    use PHPViewWidgets\Widgets\Options;
    use PHPViewWidgets\Widgets\UIDiv;
    use PHPViewWidgets\Widgets\UITable;
    use PHPViewWidgets\Widgets\UITbody;
    use PHPViewWidgets\Widgets\UITd;
    use PHPViewWidgets\Widgets\UIThead;
    use PHPViewWidgets\Widgets\UITh;
    use PHPViewWidgets\Widgets\UITr;
    use PHPViewWidgets\Widgets\UIWidget;

//class: PHPViewWidgets\Templates\DataGrid
    //This class represents a data grid widget formated with bootstrap4. If
    //not using the <PHPViewWidgets\Templates\BS4head> the grid will be displayed as 
    //a standard table.
    //
    //topic: Extends
    //<PHPViewWidgets\Widgets\UIWidget>
    //
    //Parameters:
    //Array $opts - an optional indexed array of the following form, containing options for the various structural elements:
    //'['div'=>new Options(),'table'=>new Options(),'thead'=>new Options(),'tbody'=>new Options()]'
    //<PHPViewWidgets\Templates\GridData> $data - an optional GridData object containing the data for the grid
    //Array $headings - an optional unindexed array of column headings to use
    //
    //Topic: Options
    //This widget accepts the following options:
    //
    class DataGrid extends UIWidget {
        private $griddata;
        protected $columnheadings;
        protected $newcolumn;
        protected $sectionOpts;

        public function __construct(Array $opts = null, GridData $data = null, $headings = null) {
            parent::__construct();
            $this->sectionOpts = is_null($opts) ? null : $opts;
            if (!is_null($data)) $this->SetData($data);
            if (!is_null($headings)) $this->SetColumnHeadings($headings);
        }

        //method: SetData
        //Sets the data for the grid
        //
        //Parameters:
        //<PHPViewWidgets\Templates\GridData> $data - a GridData object that contains the data for the grid
        //
        //Returns:
        //Void
        public function SetData(GridData $data) {
            $this->griddata = $data;
        }

        //method:SetColumnHeadings
        //Use to set column headings
        //
        //Parmeters:
        //Array $headings - an unindexed array of headings for the grid columns,
        //if not given the column headings are taken from the <PHPViewWidgets\Templates\GridData\Headings> method.
        public function SetColumnHeadings(Array $headings) {
            $this->columnheadings = $headings;
        }

        public function ToString() {
            if (!is_null($this->sectionOpts)) {
                if (array_key_exists('div',$this->sectionOpts)) {
                    $this->sectionOpts['div']->class = isset($this->sectionOpts['div']->class) ? 
                        "table-responsive {$this->sectionOpts['div']->class}" :
                        "table-responsive";
                    $div = new UIDiv($this->sectionOpts['div']); 
                }
                else {
                    $div = new UIDiv(new Options(['class'=>"table-responsive"]));
                }

                if (array_key_exists('table',$this->sectionOpts)) {
                    $this->sectionOpts['table']->class = issset($this->sectionOpts['table']->class) ?
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
                if (!empty($this->columnheadings)) {
                    if (array_key_exists('thead',$this->sectionOpts)) {
                        $headings = new UIThead($this->sectionOpts['thead']);
                    }
                    else {
                        $headings = new UIThead(new Options(['class'=>'thead-dark']));
                    }
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