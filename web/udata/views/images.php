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
namespace UData\Views {
    ignore_user_abort(true);
    set_time_limit(0);
    
    use \UData;
    use \UData\Widgets;
    use \UData\Elements;
    use \UData\Templates;
    use \UData\Data;

    class Images implements UData\Controller {
        private $image;
        private $mime;
        private $length;
        private $data;
        private $disposition;

        public function __construct () {
            if (!isset($_REQUEST['src'])) {
                \http_response_code('404'); 
                die;
            }
            elseif (!\file_exists(Application::$AppConfig->AppDir.$_REQUEST['src'])) {
                \http_response_code('404'); 
                die;
            }
            else {
                $this->image = UData\Application::$AppConfig->AppDir.$_REQUEST['src'];
                $this->disposition = isset($_REQUEST['disposition']) ? $_REQUEST['disposition']."; filename=\"".basename($this->image)."\"" : 'inline';
                $this->length = filesize($this->image);
                $this->data = \file_get_contents($this->image);
            }
            $this->SendImage();
        }

        private function SendImage () {
            header("Content-type: {$this->mime}");
            header("Content-Disposition: {$this->disposition}");
            echo $this->data;
            die();
        }
    }
}