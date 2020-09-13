<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Phpmailer_library {

    public function __construct() {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load() {
        require_once(APPPATH . 'third_party/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/SMTP.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/Exception.php');

        $objMail = new PHPMailer(true);
        return $objMail;
    }

}

?>