<?php
//File: uicontainer.php
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
namespace PHPViewWidgets\Widgets;

use PHPViewWidgets\Interfaces\Container;
use PHPViewWidgets\Interfaces\Widget;

//class: PHPViewWidgets\Widgets\UIContainer
//This class is the parent for all widget containers.
//A widget container is a widget which also contains other widgets
//
//Topic: Extends
//<PHPViewWidgets\Widgets\UIWidget>
//
//Topic: Implements
//<PHPViewWidgets\Interfaces\Container>
class UIContainer extends UIWidget implements Container{
    protected $data;

    //method: __construct
    //Class constructor
    //
    //Parameters:
    //<PHPViewWidgets\Widgets\Options> $opts - Is an optional Options class containing options for the main widget.
    //Array $widgets - Is an optional Array containing <PHPViewWidgets\Interfaces\Widget> objects.
    public function __construct(Options $opts = null, Array $widgets = []) {
        parent::__construct($opts);
        $this->data = [];
        if (!empty($widgets)) {
            foreach($widgets as $obj) {
                $this->Add($obj);
            }
        }
    }

    //method: Add
    //This method is used to add <PHPViewWidgets\Interfaces\Widget> objects to the container
    //
    //Parmeters:
    //<PHPViewWidgets\Interfaces\Widget> $widget - Object conforming to the <Widget> interface.
    //
    //Returns:
    //Void
    public function Add(Widget $widget) {
        array_push($this->data, $widget);
    }

    //method: Insert
    //This method is used to insert a <PHPViewWidgets\Interfaces\Widget> object to the stack at the given position.
    //
    //Parameters:
    //<PHPViewWidgets\Interface\Widget> $widget - The <Widget> object to insert.
    //*Integer* $postition - The zero based numeric position of where to insert the widget in the container.
    //
    //Returns:
    //Void
    public function Insert(Widget $widget, $position) {
        array_splice($this->data, $position, 0, [$widget]);
    }

    //method: Remove
    //Removes the widget for the container at the location given
    //
    //Parameters:
    //*Interger* $position - The zero based position of the widget to remove from the container.
    //
    //Returns:
    //Void
    public function Remove($position) {
        array_splice($this->data, $position, 1);
     }

    //method: ToString
    //
    //Topic: Overrides
    //<PHPViewWidgets\Widgets\UIWidget> :: ToString()
    public function ToString() {
        $this->unspoolContainer();
        return $this->out;
    }

    protected function unspoolContainer() {
        if (empty($this->data)) return;
        foreach($this->data as $widget) {
            $this->out .= $widget->ToString();
        }
    }
}