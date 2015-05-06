<?php
class Category_model extends CI_Model {

    public $id;
    public $name;
    public $position;
    public $status;

    const TABLE = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function create($request)
    {
        $data = [
            'name' => $request['name'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert(self::TABLE, $data);
    }

    public function find()
    {
        $this->db->order_by('position', 'acs');
        return $this->db->get(self::TABLE);
    }

    public function update_position()
    {
        $this->db->where('id', $this->id);
        return $this->db->update(self::TABLE, ['position' => $this->position]);
    }

    public function delete($id)
    {
        return $this->db->delete(self::TABLE, ['id' => $id]);
    }

    public function update(){
        $this->db->where('id', $this->id);
        return $this->db->update(self::TABLE, [
            'name' => $this->name
        ]);
    }

}
?>