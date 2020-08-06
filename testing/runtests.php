<?php
//File: run.php
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
require_once(dirname(dirname(__FILE__))."/PHPViewWidgets/autoloader.php");
use PHPViewWidgets\Widgets\Options;
use PHPViewWidgets\Widgets\UIBody;
use PHPViewWidgets\Widgets\UIHead;
use PHPViewWidgets\Widgets\UIHeading;
use PHPViewWidgets\Widgets\UIHtml;
use PHPViewWidgets\Widgets\UITitle;

$html = new UIHtml();
$head = new UIHead();
$head->Add(new UITitle(new Options(['title'=>"Docker Yeah!"])));
$body = new UIBody();
$body->Add(new UIHeading(new Options(['heading'=>"Widgets Working"])));
$html->Add($head);
$html->Add($body);
$html->Display();