<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sendgrid_php {

    public function __construct() {
        require_once(APPPATH . 'third_party/sendgrid-php/sendgrid-php.php');

    }

}
