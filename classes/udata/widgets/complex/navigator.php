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
    use \UData\Widgets;
    use \UData\Views;
    use \UData\Widgets\Elements;

    class Navigator extends Widgets\StdBase implements Views\NavBar {
        protected $nav;
        protected $toolbar;

        public function __construct () {
            $navigator = new TopNavBar();
            $this->nav = $navigator->Navigator;
            $this->toolbar = $navigator->Toolbar;
            $this->AddNavigation();
        }

        protected function AddNavigation () 
        {
            //NAvbar Brand
            $this->Nav()->Insert(
                new UINavBrand(new Widgets\WidgetOptions([
                    'href'=>"/",
                    'string'=>"UData4.5"
                ])),0
            );

            //Dropdown menus
            $menu = [
                "Products"=>[
                    "Add New"=>"/?c=products&m=addnew",
                    "Edit Product"=>"/?c=products&m=editproduct",
                    "Product BOM"=>"/?c=products&m=viewbom",
                    "Production Log"=>"/?c=products&m=productionlog",
                    "Current Products"=>"/?c=products&m=currentproducts",
                    "Past Products"=>"/?c=products&m=pastproducts"
                ],
                "Work Cells"=>[
                    "Add New"=>"/?c=workcells&m=addnewcell",
                    "View Work Cells"=>"/?c=workcells&m=searchworkcells",
                    "Transfer Workcell Data"=>"/?c=workcells&m=transferworkcell"
                ],
                "Materials"=>[
                    "Search Material"=>"/?c=materials&m=searchmaterials",
                    "Search Discrepancies"=>"/?c=materials&m=searchdiscrepancies",
                    "Material Receiving"=>"/?c=materials&m=receivematerial",
                    "Material On Hand"=>"/?c=materials&m=onhandinventory"
                ],
                "Maintenance"=>[
                    "View Tooling"=>"/?c=maintenance&m=viewtools",
                    "Add New Tooling"=>"/?c=maintenace&m=addnewtool",
                    "Inspect Equipment"=>"/?c=maintenance&m=inspectequipment",
                    "View Equipment Inspections"=>"/?c=maintenance&m=viewinspections"
                ],
                "Human Resources"=>[
                    "Person Search"=>"/?c=humanresources&m=personsearch",
                    "Add New Person"=>"/?c=humanresources&m=addnew",
                    "View All Active"=>"/c=humanresources&m=listallactive",
                    "View Open Reviews"=>"/c=humanresources&m=openreviewslist",
                    "Available Training"=>"/c=humanresources&m=listtraining",
                    "Add New Available Training"=>"/?c=humanresources&m=addnewtraining",
                    "View Injuries"=>"/?c=humanresources&m=injurylist",
                    "New Injury Report"=>"/?c=humanresources&m=newinjury",
                    "Time Data Access"=>"/?c=humanresources&m=timedata"
                ]
            ];

            foreach($menu as $name=>$array) {
                $dropdown = new Elements\UIListItem(new Widgets\WidgetOptions(['class'=>"nav-item dropdown"]));
                $dropdownmenu = new Elements\UIDivision(new Widgets\WidgetOptions(['class'=>"dropdown-menu"]));
                $dropdown->Add(
                    new Widgets\UILink(
                        new Widgets\WidgetOptions([
                            'class'=>'nav-link dropdown-toggle',
                            'href'=>"#",
                            'id'=>"navbardrop",
                            'other'=>"data-toggle='dropdown'",
                            'string'=>$name
                        ])
                    )
                );
                foreach($array as $string=>$address) {
                    $dropdownmenu->Add(
                        new Widgets\UILink(
                            new Widgets\WidgetOptions([
                                'class'=>"dropdown-item",
                                'href'=>$address,
                                'string'=>$string
                            ])
                        )
                    );
                }
                $dropdown->Add($dropdownmenu);
                $this->Toolbar()->Add($dropdown);
            }
        }

        public function Nav(): \UData\Widgets\Elements\UINav
        {
            return $this->nav;
        }

        public function Toolbar(): \UData\Widgets\Elements\UIList
        {
            return $this->toolbar;
        }

        public function ToString () {
            return $this->Nav()->ToString();
        }
    }
}