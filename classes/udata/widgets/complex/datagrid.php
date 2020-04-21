<?php
/*
 * Copyright (C) 2020  Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */
namespace UData\Widgets\Complex {
    use \UData\Data;
    use \UData\Widgets;
    use \UData\Widgets\Elements;

class DataGrid extends Widgets\StdBase {
        public $Grid;
        public $Table;
        public $THead;
        public $TBody;

        public function __construct (Widgets\WidgetOptions $opts = null) {
            parent::__construct($opts);
            $this->Grid = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"table-responsive"]));
            $this->Table = new Elements\UITable(new Widgets\WidgetOptions(['class'=>'table table-hover table-bordered']));
            $this->TBody = new Elements\StdBase(new Widgets\WidgetOptions(['element'=>"tbody"]));
            if (isset($this->opts->dataset) && $this->opts->dataset instanceof Data\DataSet) {
                if (isset($this->opts->headings)) {
                    $this->SetColumnHeadings();
                    $this->Table->Add($this->THead);
                }
                foreach($this->opts->dataset as $row) {
                    $r = new Elements\UITableRow();
                    foreach($row as $td) {
                        $t = new Elements\UITableData();
                        $t->Add(new Widgets\UIString(new Widgets\WidgetOptions(['string'=>$td])));
                        $r->Add($t);
                    }
                    $this->TBody->Add($r);
                }
                $this->Table->Add($this->TBody);
            }
            $this->Grid->Add($this->Table);
        }

        protected function SetColumnHeadings () {
            $this->THead = new Elements\StdBase(new Widgets\WidgetOptions(['element'=>"thead",'class'=>"thead-light"]));
            $head = new Elements\UITableRow();
            if (is_array($this->opts->headings)) {
                foreach($this->opts->headings as $th) {
                    $heading = new Elements\UIColumnHeading();
                    $heading->Add(new Widgets\UIString(new Widgets\WidgetOptions(['string'=>$th])));
                    $head->Add($heading);
                }
            }
            else {
                foreach($this->opts->dataset->Params() as $th) {
                    $heading = new Elements\UIColumnHeading();
                    $heading->Add(new Widgets\UIString(new Widgets\WidgetOptions(['string'=>$th])));
                    $head->Add($heading);
                }
            }
            $this->THead->Add($head);
        }

        public function ToString () {
            return $this->Grid->ToString();
        }
    }
}