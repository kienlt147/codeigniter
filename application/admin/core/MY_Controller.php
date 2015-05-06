<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('title');
        $this->load->library('parser');
        // $this->load->library('session');
        $this->load->database();
        $this->output->set_template('index');
        $this->load->css('../public/css/bootstrap.min.css');
        $this->load->css('../public/css/admin_style.css');
        $this->load->css('../public/css/sessions.css');
        $this->load->js('../public/js/jquery-1.9.1.min.js');
        $this->load->js('../public/js/bootstrap.min.js');
    }
}

?>