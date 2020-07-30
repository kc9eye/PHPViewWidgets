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
    //<PHPViewWidgets\Templates\GridData> $data - an optional GridData object containing the data for the grid
    //
    //Topic: Options
    //This widget accepts the following options:
    //None
    class DataGrid extends UIWidget {
        private $griddata;

        public function __construct(GridData $data = null) {
            parent::__construct();
            if (!is_null($data)) $this->SetData($data);
        }

        //method: SetData
        //Sets the data for the grid
        //
        //Parameters:
        //<PHPViewWidgets\Templates\GriData> $data - a GridData object that contains the data for the grid
        //
        //Returns:
        //Void
        public function SetData(GridData $data) {
            $this->griddata = $data;
        }

        public function ToString() {
            $div = new UIDiv(new Options(['class'=>'table-responsive']));
            $table = new UITable(new Options(['class'=>'table']));
            $tbody = new UITbody();
            if (!empty($this->griddata->Headings)) {
                $headings = new UIThead(new Options(['class'=>'thead-dark']));
                foreach($this->griddata->Headings() as $head) {
                    $headings->Add(new UITh(new Options(['other'=>"scope='col'",'string'=>$head])));
                }
                $table->Add($headings);
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