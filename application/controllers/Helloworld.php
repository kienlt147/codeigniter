<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helloworld extends CI_Controller {

    public function index()
    {
        $data = [
            'helloworld' => 'Xin chao'
        ];
        $this->load->view('helloworld/index', $data);
    }

}
