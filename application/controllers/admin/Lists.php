<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends My_AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('list_model');
    }

    public function index()
    {
        set_title('Lists');
        $this->load->view('admin/lists/index');
    }

    public function add()
    {
        set_title('Create new List');
        $categories = [
            'categories' => $this->category_model->find()->result()
        ];
        $this->load->view('admin/lists/add', $categories);
    }

    public function create()
    {
        $request = $this->input->post();
        if (!empty($request)) {
            $this->list_model->create($request)
                ? $this->session->set_flashdata('success', 'List was created successfully...')
                : $this->session->set_flashdata('error', 'List was created failer...');
        }
        return redirect('admin/lists/add', 'refresh');
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return redirect('admin', 'refresh');
        }
        $this->list_model->delete($id)
            ? $this->session->set_flashdata('success', 'List was deleted successfully...')
            : $this->session->set_flashdata('success', 'List was deleted failer...');
        return redirect('admin/categories', 'refresh');
    }

}
