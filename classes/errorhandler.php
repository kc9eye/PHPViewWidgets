<?php
/**
 * file: errorhandler.php
 * 
 * topic: License
 * 
 * Copyright (C) 2018 Paul W. Lane <kc9eye@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * 
 * it under the terms of the GNU General Public License as published by
 * 
 * the Free Software Foundation; version 2 of the License.
 *
 * This program is distributed in the hope that it will be useful,
 * 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * 
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

/**
 * class: Errorhandler
 * 
 * The application Error/Exception handler
 * 
 * ---------php----------
 * new Errorhandler($log_file,$support_link);
 * ----------------------
 */
Class Errorhandler {

    /**
     * about: Properties
     * 
     * string $LogFile - Is the URL of the file that receives the XML error information. See <$log_file>
     * string $ErrorXML - Is the raw error xml data string, prior to writing.
     * string $ErrorID - Is the string error ID number.
     * string $SupportLink - Is the link given in <$support_link>
     */
    public $LogFile;
    public $ErrorXML;
    public $ErrorID;
    public $SupportLink;

    /**
     * function: __construct
     * 
     * Parameters:
     * 
     * string $log_file - Is a string file URL of where to write the log. Default: *./error_log.xml*
     * string $support_link - Is a string, usually a URL to an inteface were bug information can be left 
     */
    public function __construct ($log_file='error_log.xml',$support_link = null) {
        $this->LogFile = $log_file;
        $this->SupportLink = $support_link;
        set_error_handler([$this, 'ErrorHandler']);
        set_exception_handler([$this, 'ExceptionHandler']);
    }

    /**
     * function: Errorhandler
     * 
     * Is the main error handling method
     * 
     * parameters:
     * 
     * string $code - The system error code string.
     * string $msg - The system error message string.
     * string $file - The file URL string the error occurred in.
     * string $line - The line of the file the error occurred on.
     * array $trace - An array containing system trace information
     */
    public function ErrorHandler ($code,$msg,$file,$line,$trace) {
        if (isset($_SESSION['bg_process'])) {
            $_SESSION['bg_process']['status'] = 'error';
        }
        if (!is_null($trace) && is_array($trace)) {
            $trace = htmlentities(print_r($trace,true));
        }
        else {
            $trace = htmlentities($trace);
        }
        $this->PrepareXML($code,$msg,$file,$line,$trace);
        $this->WriteLog ();
        if (($code === E_USER_NOTICE) || ($code === E_USER_WARNING)) {
            return true;
        }
        elseif(isset($_SESSION['bg_process']) && $_SESSION['bg_process']['status'] == 'error') {
            #deferr the blue screen of death and let processingDialog() handle it
            return true;
        }
        else {
            $this->DisplayErrorScreen();
            die();
        }
    }

    /**
     * function: ExceptionHandler
     * 
     * This method calls ErrorHandler
     * 
     * See also:
     * 
     * <ErrorHandler>
     */
    public function ExceptionHandler ($e) {
        $this->ErrorHandler(
            $e->getCode(),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString()
        );
    }

    protected function PrepareXML ($code, $msg, $file, $line, $trace = null) {
        $this->ErrorID = uniqid('ERR_');
        $xml = '<error><id>'.$this->ErrorID.'</id>';
        $xml .= '<date>'.date('c').'</date>';
        $xml .= '<number>'.$code.'</number>';
        $xml .= '<message><![CDATA['.$msg.']]></message>';
        $xml .= '<file><![CDATA['.$file.']]></file>';
        $xml .= '<line>'.$line.'</line>';
        if (!is_null($trace)) {
            $xml .= '<trace><![CDATA['.$trace.']]></trace>';
        }
        $xml .= '</error>';
        $this->ErrorXML = $xml;
    }

    protected function WriteLog () {
        if (file_exists($this->LogFile)) {
            $this->AppendLog();
        }
        else {
            $this->CreateLog();
        }
    }

    protected function AppendLog () {
        $fh = fopen($this->LogFile, 'c');
        flock($fh,LOCK_EX);
        fseek($fh,-13,SEEK_END);
        fwrite($fh,$this->ErrorXML);
        fwrite($fh,"\n</error_log>\n");
        flock($fh,LOCK_UN);
        fclose($fh);
    }


    protected function CreateLog () {
        $fh = fopen($this->LogFile, 'w');
        flock($fh,LOCK_EX);
        fwrite($fh,"<?xml version='1.0' ?>\n");
        fwrite($fh,"<error_log>\n");
        fwrite($fh,$this->ErrorXML);
        fwrite($fh,"\n</error_log>\n");
        flock($fh,LOCK_UN);
        fclose($fh);
    }


    public function DisplayErrorScreen () {
        unset($_SESSION);
        $oldbuff = ob_get_contents();
        ob_clean();
        
        if (is_null($this->SupportLink) || $this->SupportLink == '') {
            $this->SupportLink = 'mailto:webadmin@'.$_SERVER['SERVER_NAME'].'?Subject:'.$this->ErrorID;
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fatal Exception</title>
        <style>
            html, body, .container {
                background-color:blue;
                color:white;
                font-size:22px;
                height:100%;
            }
            .container {
                position: relative;
            }
            .centered {
                position:absolute;
                top:33%;
                margin-left:33%;
                margin-right:33%;
            }
            a {
                color:white;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='centered'>
                <h1>Fatal Exception</h1>
                <b>ID:</b>&nbsp;<?php echo $this->ErrorID;?><br />
                <p>
                    A fatal exception has occurred at: 0x<?php echo dechex(time());?> 
                    and the application can not continue.
                    Please use the above ID number when contacting the 
                    administrator about the error. <br />
                    <b>END OF LINE</b>
                </p>
                <a href='<?php echo $this->SupportLink;?>'>Contact Support</a>
            </div>
        </div>
    </body>
</html>
<?php
    }
}