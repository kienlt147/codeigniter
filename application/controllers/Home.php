<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

  // public function __construct() {
  //   parent::__construct();
  //   $this->load->helper('url');
  //   $this->load->library('parser');
  //   $this->load->database();
  //   $this->output->set_template('index');
  //   $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
  //   $this->load->js('assets/themes/default/js/bootstrap.min.js');
  // }

  public function index()
  {
    $query = $this->db->query('SELECT * FROM users');
    $data = array(
      'blog_title'   => 'My Blog Title',
      'blog_heading' => 'My Blog Heading',
      'blog_entries' => $query->result_array()
    );
    $this->parser->parse('tester/index', $data);
  }

  public function show() {
    $query = $this->db->query('SELECT * FROM users');
    // var_dump($data->result_array());die;
    $data = array(
      'blog_title'   => 'My Blog Title',
      'blog_heading' => 'My Blog Heading',
      'blog_entries' => $query->result_array()
    );
    $this->parser->parse('layouts/index', $data);
  }

  public function abc()
  {
    $this->load->view('');
  }

  public function _remap($method, $params = '')
  {
    // $method = 'process_'.$method;
    // var_dump($method);die;
    if (method_exists($this, $method))
    {
      return call_user_func_array(array($this, $method), $params);
    }
    show_404();
  }

  public function _output($output)
  {
    echo $output;
  }
}
