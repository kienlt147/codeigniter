<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('title');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('resizeimage');
        $this->load->database();
        $this->load->model('user_model');
        $this->output->set_template('admin/index');
        $this->load->css('public/css/bootstrap.min.css');
        $this->load->css('public/css/admin_style.css');
        $this->load->css('public/css/sessions.css');
        $this->load->css('public/css/nestable.css');
        $this->load->js('public/js/jquery-1.9.1.min.js');
        $this->load->js('public/js/bootstrap.min.js');
        $this->load->js('public/js/bootstrap-filestyle.js');
        $this->load->js('public/js/jquery.nestable.js');
        $this->load->js('public/js/categories.js');
        $this->load->js('public/ckeditor/ckeditor.js');
        $this->load->js('public/ckfinder/ckfinder.js');
        $this->load->js('public/js/load.init.js');
        if (empty($this->session->session_id) && $this->router->fetch_class() !== 'sessions') {
            if (!$this->user_model->checkPermission($this->user_model->decrypt())) {
                return redirect('admin/signin', 'refresh');
            }
        }
    }

}

?>