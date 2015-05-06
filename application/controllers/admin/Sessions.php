<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends My_AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        set_title('Signin');
        $this->load->view('admin/sessions/index');
    }

    public function create()
    {
        if ($user = $this->user_model->filter_by_username_password()->row()) {
            $this->session->set_userdata('session_id', $this->user_model->encrypt($user));
            $this->session->set_userdata('current_user', $user);
            return redirect('admin', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Email or password incorrect...');
            return redirect('admin/signin', 'refresh');
        }
    }

    public function destroy()
    {
        $this->session->sess_destroy();
        return redirect('admin/signin', 'refresh');
    }

}
