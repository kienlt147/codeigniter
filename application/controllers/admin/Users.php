<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends My_AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        set_title('Users');
        $this->load->view('admin/users/index');
    }

    public function add()
    {
        set_title('Create new User');
        $this->load->view('admin/users/add');
    }

    public function create()
    {
        if ($this->user_model->create()) {
            $this->session->set_flashdata('success', 'User was created successfully...');
        } else {
            $this->session->set_flashdata('error', 'User was created failer...');
        }
        return redirect('admin/users/add', 'refresh');
    }

}
