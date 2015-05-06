<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('title');
        $this->load->library('parser');
        $this->load->database();
        $this->output->set_template('index');
        $this->load->css('public/css/style.css');
        $this->load->css('public/css/ddsmenu.css');
        $this->load->js('public/js/jquery-1.9.1.min.js');
        $this->load->js('public/js/ddsmoothmenu.js');
    }

}

?>