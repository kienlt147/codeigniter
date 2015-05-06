<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends My_AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('list_model');
        $this->load->model('product_model');
    }

    public function index()
    {
        set_title('Products');
        $products = $this->product_model->find_all();
        $data = [
            'products' => $products->result_array()
        ];
        $this->parser->parse('admin/products/index', $data);
    }

    public function add()
    {
        set_title('Create new Product');
        $categories = [
            'categories' => $this->category_model->find()->result_array()
        ];
        $this->parser->parse('admin/products/add', $categories);
    }

    public function create()
    {
        $request = $this->input->post();
        if (empty($request)) {
            return redirect('admin', 'refresh');
        }
        if (getimagesize($request['hidden_image'])) {
            $this->product_model->image = $this->resizeimage->url . time() . '.' . $request['type_image'];
            $this->resizeimage->load($request['hidden_image']);
            $this->resizeimage->resizeToWidth(250);
            $this->resizeimage->save($this->product_model->image);
        }
        $request['image'] = $this->product_model->image;
        $this->product_model->create($request)
            ? $this->session->set_flashdata('success', 'Product was created successfully...')
            : $this->session->set_flashdata('error', 'Product was created failer...');
        return redirect('admin/products/add', 'refresh');
    }

    public function edit($id)
    {
        if (empty($id)) {
            return redirect('admin', 'refresh');
        }
        set_title('Edit Product');
        $product = $this->db->get_where('products', ['id' => $id])->row();
        $data = [
            'product' => [(array)$product],
            'categories' => $this->category_model->find()->result_array()
        ];
        $this->parser->parse('admin/products/edit', $data);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
