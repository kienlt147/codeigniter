<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function index() {
        set_title('Users');
        $this->load->view('users/index');
    }

}
