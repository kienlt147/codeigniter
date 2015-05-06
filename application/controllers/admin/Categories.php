<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends My_AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('list_model');
    }

    public function index()
    {
        set_title('View all category');
        $categories = [
            'categories' => $this->category_model->find()->result_array()
        ];
        $this->load->view('admin/categories/index', $categories);
    }

    public function add()
    {
        set_title('Create new Category');
        $this->load->view('admin/categories/add');
    }

    public function create()
    {
        $request = $this->input->post();
        if (empty($request)) {
            return redirect('admin', 'refresh');
        }
        $flag = false;
        if (!empty($request)) {
            if ($this->category_model->create($request)) {
                $id = $this->db->insert_id();
                foreach ($request['category_list_name'] as $list_name) {
                    $flag = $this->list_model->create($id, $list_name) ? true : false;
                }
                if ($flag) {
                    $this->session->set_flashdata('success', 'Categories was created successfully...');
                } else {
                    $this->category_model->delete($id);
                    $this->list_model->delete_by_category_id($id);
                    $this->session->set_flashdata('error', 'Categories was created failer...');
                }
            } else {
                $this->session->set_flashdata('error', 'Categories was created failer...');
            }
        }
        return redirect('admin/categories/add', 'refresh');
    }

    public function show()
    {
        set_title('Create new Category');
        $categories = [
            'categories' => $this->category_model->find()->result_array()
        ];
        $this->load->view('admin/categories/show', $categories);
    }

    public function edit($id)
    {
        if (empty($id)) {
            return redirect('admin', 'refresh');
        }
        set_title('Edit Category');
        $category = $this->db->get_where('categories', ['id' => $id])->row();
        $lists = $this->db->get_where('lists', ['category_id' => $category->id]);
        $data = [
            'category_id' => $category->id,
            'category_name' => $category->name,
            'lists' => $lists->result_array()
        ];
        $this->parser->parse('admin/categories/edit', $data);
    }

    public function testUpdate()
    {
        // $data = array(
        //     array(
        //       'id' => 1,
        //       'name' => 'Hello1',
        //     ),
        //     array(
        //       'id' => 3,
        //       'name' => 'World1',
        //     ),
        //     array(
        //       'id' => 13,
        //       'name' => 'World',
        //     )
        // );
        // var_dump($this->db->update_batch('lists', $data, 'id'));die;
        $arr_lists = [
            'category_list_name' => [
                4 => 'test_t_1',
                6 => 'test_t_3',
                1431914019203 => '1234'
            ]
        ];
        $lists = $this->db->get_where('lists', ['category_id' => 6]);

        var_dump($arr_lists);
        var_dump($lists->result_array());
        // var_dump($this
        die;
    }

    public function update()
    {
        $request = $this->input->post();
        if (empty($request)) {
            return redirect('admin', 'refresh');
        }
        $flag = true;
        $this->category_model->id = $request['id'];
        $this->category_model->name = $request['name'];
        $category = $this->category_model->update();
        if ($category) {
            $lists = $this->list_model->filter_by_category_id($request['id']);
            foreach ($lists->result() as $list) {
                if (array_key_exists($list->id, $request['category_list_name'])) continue;
                if (!$this->list_model->delete($list->id)) $flag = flase;
            }
            foreach ($request['category_list_name'] as $id => $list_name) {
                if (!empty($this->list_model->filter_by_id($id))) {
                    $this->list_model->id = $id;
                    $this->list_model->name = $list_name;
                    if (!$this->list_model->update()) $flag = true;
                } else {
                    if (!$this->list_model->create($request['id'], $list_name)) $flag = flase;
                }
            }
        } else {
            $flag = flase;
        }
        $flag ? $this->session->set_flashdata('success', 'Category was updated successfully...')
            : $this->session->set_flashdata('error', 'Category was updated failer...');
        return redirect('admin/categories', 'refresh');
    }

    public function update_position()
    {
        $request = $this->input->post();
        if (empty($request)) {
            return redirect('admin', 'refresh');
        }
        $category_lists = json_decode($request["category_list_output"]);
        $flag = true;
        foreach ($category_lists as $position_category => $category) {
            $this->category_model->id = $category->id;
            $this->category_model->position = $position_category;
            if ($this->category_model->update_position()) {
                if (!empty($category->children)) {
                    foreach ($category->children as $position_list => $list) {
                        $this->list_model->id = $list->id;
                        $this->list_model->position = $position_list;
                        if (!$this->list_model->update_position()) {
                            $flag = false;
                            break;
                        }
                    }
                }
            } else {
                $flag = flase;
                break;
            }
        }
        $flag ? $this->session->set_flashdata('success', 'Categories was updated position successfully...')
            : $this->session->set_flashdata('error', 'Categories was updated position failer...');
        return redirect('admin/categories', 'refresh');
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return redirect('admin', 'refresh');
        }
        $this->category_model->delete($id)
            ? $this->session->set_flashdata('success', 'Categories was deleted successfully...')
            : $this->session->set_flashdata('success', 'Categories was deleted failer...');
        return redirect('admin/categories', 'refresh');
    }

}
