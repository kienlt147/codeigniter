<?php
class List_model extends CI_Model {

    public $id;
    public $category_id;
    public $name;
    public $position;
    public $status;

    const TABLE = 'lists';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($category_id, $name)
    {
        $data = [
            'category_id' => $category_id,
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert(self::TABLE, $data);
    }

    public function update_position()
    {
        $this->db->where('id', $this->id);
        return $this->db->update(self::TABLE, [
            'position' => $this->position
        ]);
    }

    public function update()
    {
        $this->db->where('id', $this->id);
        return $this->db->update(self::TABLE, [
            'name' => $this->name
        ]);
    }

    public function delete($id)
    {
        return $this->db->delete(self::TABLE, [
            'id' => $id
        ]);
    }

    public function filter_by_id($id)
    {
        return $this->db->get_where(self::TABLE, ['id' => $id])->result();
    }


    public function filter_by_category_id($category_id)
    {
        $this->db->order_by('position', 'acs');
        return $this->db->get_where(self::TABLE, [
            'category_id' => $category_id
        ]);
    }

    public function delete_by_category_id($category_id)
    {
        return $this->db->delete(self::TABLE, [
            'category_id' => $category_id
        ]);
    }

}
?>